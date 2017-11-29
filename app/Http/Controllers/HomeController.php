<?php

namespace App\Http\Controllers;

use App\Match;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        return view('feed', [
            'activeMatches' => $activeMatches = ($objMatch = new Match())->getActiveMatches(),
            'matches' => $objMatch->getForThisWeek($activeMatches->pluck('matches_id')),
        ]);
    }

}
