<?php

namespace App\Http\Controllers;

use App\Match;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
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

        return view('feed', [
            'activeMatches' => $activeMatches->all(),
            'matches' => $arrMatchesByPoule,
        ]);
    }

}
