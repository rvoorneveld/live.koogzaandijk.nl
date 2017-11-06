<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Message;
use Carbon\Carbon;

class FetchFacebook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:facebook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new posts from facebook';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $messages = Message::where('message_type_id',6)->get();
        $foreign_keys = $messages->pluck('message_foreign_key')->unique()->toArray();

        $facebook = json_decode(file_get_contents('https://graph.facebook.com/205769322795305?fields=feed&access_token=927529923938364|nC3PoskgtCMo9MPvQkZwkK8iY6Q'));

        $count = 0;

        if(isset($facebook) && is_object($facebook)) {
            foreach($facebook->feed->data as $post) {

                if(! in_array($post->id,$foreign_keys,true)) {

                    $count++;

                    if(! empty($post->message)) {
                        
                        $link = ((! empty($post->link)) ? $post->link : '');

                        Message::create([
                            'message_foreign_key' => $post->id,
                            'message_type_id' => 6,
                            'message_name' => '',
                            'message_title' => '',
                            'message_content' => $post->message,
                            'message_media' => '',
                            'message_link' => $link,
                            'approved_at' => Carbon::createFromTimestamp(strtotime($post->created_time))->toDateTimeString()
                        ]);

                    }

                }

            }

        }

        echo $count.' facebook post'.(($count == 1) ? '' : 's').' added to message table'.PHP_EOL;

    }

}
