<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{

    public function index()
    {
        $clubs = Club::all();

        return view('clubs.index', compact('clubs'));
    }

    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function store()
    {
        $attributes = request()->validate(['name' => 'required',]);

        Club::create($attributes);

        return  redirect('/clubs');
    }

}
