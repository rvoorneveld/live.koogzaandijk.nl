<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'club_id' => 'required',
        ]);

        Team::create($attributes);

        return  redirect("/club/{$attributes['club_id']}");
    }

}
