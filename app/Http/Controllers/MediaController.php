<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MediaController extends Controller
{
    public function save(Request $request)
    {
        $timestamp = Carbon::now()->getTimestamp();

        $this->validate($request, [
            'photovideo' => 'required|mimes:jpeg,png,mov',
        ]);

        $file = $request->file('photovideo');

        $name = $timestamp.'.'.str_replace(' ', '', $file->getClientOriginalName());

        $file->move('upload/pending', $name);

        return $name;
    }
}
