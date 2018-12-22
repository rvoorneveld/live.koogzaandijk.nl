<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Message;
use Carbon\Carbon;
use Vinkla\Instagram\Instagram as Instagram;

class FetchInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:instagram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new posts from instagram';

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
        $messages = Message::where('message_type_id',3)->get();
        $foreign_keys = $messages->pluck('message_foreign_key')->unique()->toArray();

        $instagram = new Instagram();
        $instafeed = $instagram->get('kz_hiltex');

        $count = 0;

        if(! empty($instafeed) && is_array($instafeed)) {
            foreach($instafeed as $insta) {

                if(! in_array($insta['id'],$foreign_keys)) {

                    $count++;

                    $media = ((! empty($insta['images']['standard_resolution']['url'])) ? $insta['images']['standard_resolution']['url'] : '');
                    $url = ((! empty($insta['link'])) ? $insta['link'] : '');

                    Message::create([
                        'message_foreign_key' => $insta['id'],
                        'message_type_id' => 3,
                        'message_name' => $insta['user']['username'],
                        'message_title' => '',
                        'message_content' => $insta['caption']['text'],
                        'message_media' => $media,
                        'message_link' => $url,
                        'approved_at' => Carbon::createFromTimestamp($insta['caption']['created_time'])->toDateTimeString()
                    ]);

                }

            }
        }

        echo $count.' instagram post'.(($count == 1) ? '' : 's').' added to message table'.PHP_EOL;

    }
}
