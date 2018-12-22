<?php

namespace App\Http\Controllers;

use App\Match;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        \Carbon\Carbon::setLocale('nl');

        $activeMatches = ($objMatch = new Match())->getActiveMatches();
        $arrMatchesByPoule = [];
        if (false === empty($matches = $objMatch->getForThisWeek($activeMatches->pluck('matches_id'))->all())
            && true === \is_array($matches)) {
            foreach ($matches as $match) {
                switch (true) {
                    case true === \in_array($match->poule, ['F', 'E', 'D',], true):
                        $match->category = 1;
                        break;
                    case true === \in_array($match->poule, ['A', 'B', 'C',], true):
                        $match->category = 2;
                        break;
                    default:
                        $match->category = 3;
                        break;
                }
                $match->isToday = ($objMatchDate = Carbon::createFromFormat('Y-m-j', $match->date))->isToday();
                $match->isSaturday = $objMatchDate->isSaturday();
                $match->isSunday = $objMatchDate->isSunday();
                $arrMatchesByPoule[$match->category][] = $match;
            }
            ksort($arrMatchesByPoule);
        }

        // Get Feed Data
        $messages = DB::table('message')
            ->join('message_type', 'message_type.message_type_id', '=', 'message.message_type_id')
            ->select('message.*','message_type.message_type_name','message_type.message_type_icon')
            ->whereNotNull('approved_at')
            ->orderBy('approved_at','desc')
            ->get();

        $messages->map(function($message, $key) {
//            $media = explode('||',$message->message_media);
            $approved_at = \Carbon\Carbon::createFromTimestamp(strtotime($message->approved_at),'Europe/Amsterdam');
            $difference = \Carbon\Carbon::now()->diffForHumans($approved_at);

            $message->message_media_first = '';//array_shift($media);
            $message->difference = str_replace('later','geleden', $difference);
            return $message;
        });

        // Get Colors
        $colors = ['yellow','black','blue','grey'];

        return view('feed', [
            'activeMatches' => $activeMatches->all(),
            'matches' => $arrMatchesByPoule,
            'messages' => $messages,
            'colors' => $colors,
        ]);
    }

}
