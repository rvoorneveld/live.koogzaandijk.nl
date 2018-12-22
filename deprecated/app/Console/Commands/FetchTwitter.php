<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Message;
use Carbon\Carbon;
use Thujohn\Twitter\Facades\Twitter as Twitter;

class FetchTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new tweets from twitter';

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
        $messages = Message::where('message_type_id',2)->get();
        $foreign_keys = $messages->pluck('message_foreign_key')->unique()->toArray();

        $tweets = Twitter::getUserTimeline(['screen_name' => 'KZ_Hiltex', 'count' => 20, 'format' => 'array']);

        $count = 0;

        if(! empty($tweets) && is_array($tweets)) {
            foreach($tweets as $tweet) {

                if(! in_array($tweet['id_str'],$foreign_keys)) {

                    $count++;

                    $media = ((! empty($tweet['entities']['media'][0]['media_url'])) ? $tweet['entities']['media'][0]['media_url'] : '');
                    $url = ((! empty($tweet['entities']['urls'][0]['url'])) ? $tweet['entities']['urls'][0]['url'] : '');

                    Message::create([
                        'message_foreign_key' => $tweet['id_str'],
                        'message_type_id' => 2,
                        'message_name' => '@'.$tweet['user']['screen_name'],
                        'message_title' => '',
                        'message_content' => $tweet['text'],
                        'message_media' => $media,
                        'message_link' => $url,
                        'approved_at' => Carbon::createFromTimestamp(strtotime($tweet['created_at']))->toDateTimeString()
                    ]);

                }
            }
        }

        echo $count.' tweet'.(($count == 1) ? '' : 's').' added to message table'.PHP_EOL;
    }
}
