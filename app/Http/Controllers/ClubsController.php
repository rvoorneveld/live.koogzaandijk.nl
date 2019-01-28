<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{

    public function index()
    {
        $clubs = auth()->user()->clubs;

        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function show(Club $club)
    {
        if (false === $club->users->contains('id', auth()->user()->id)) {
            abort(403);
        }

        return view('clubs.show', compact('club'));
    }

    public function store()
    {
        $attributes = request()->validate(['name' => 'required',]);

        $club = club::create($attributes);
        $club->users()->attach(auth()->user()->id);

        return redirect('/clubs');
    }

}
