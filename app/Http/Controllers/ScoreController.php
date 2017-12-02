<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Team;
use App\Player;
use App\Score;

class ScoreController extends Controller
{

    /**
     * @var array $types The Possibilities to Score a Goal
     */
    public $types = [
        1 => 'afstand',
        2 => 'halve afstand',
        3 => 'korte kans',
        4 => 'doorloopbal',
        5 => 'strafworp',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /**
         * @todo Remove this testing data
         */
        $matchId = 5245;
        $teamId = 30143;
        $teamName = 'KZ/Hiltex 2';
        $teamType = 'home';

        if (true === $request->isXmlHttpRequest()) {
            $matchId = $request->get('matchId');
            $teamId = $request->get('teamId');
            $teamName = $request->get('teamName');
            $teamType = $request->get('teamType');
        }

        $match = (new Match())->getMatch($matchId);

        if (($isClubteam = $match->{'team_'.$teamType.'_clubteam'}) === 1) {
            $team = (new Team())->getTeam($teamId);
            $players = (new Player())->getPlayers($team->name);
        }

        /**
         * @todo make Types dynamic
         */
        return view('forms.scoreCreate', [
            'players' => $players ?? null,
            'types' => $this->types,
            'teamName' => $teamName,
            'isClubteam' => $isClubteam,
            'matchId' => $matchId,
            'scoreHome' => $match->team_home_score,
            'scoreAway' => $match->team_away_score,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * @todo Get the Score again from the Database, just to be sure.
         */
        Score::create([
            'matchId' => $request->get('matchId'),
            'playerId' => $request->get('playerId'),
            'scoreTypeId' => $request->get('scoreTypeId'),
            'scoreHome' => $request->get('scoreHome'),
            'scoreAway' => $request->get('scoreAway'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
