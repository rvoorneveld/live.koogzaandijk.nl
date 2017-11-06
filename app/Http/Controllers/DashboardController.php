<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
//use Carbon\Carbon;
//use DB;

class DashboardController extends Controller
{

    public function index()
    {
//        $matches = DB::table('matches')
//            ->select('matches.*')
//            ->where('year', Carbon::now()->year)
//            ->where('week', Carbon::now()->weekOfYear)
//            ->orderBy('date', 'asc')
//            ->orderBy('time', 'asc')
//            ->get();
//
//        // Get Feed Data
//        $messages = DB::table('message')
//            ->join('message_type', 'message_type.message_type_id', '=', 'message.message_type_id')
//            ->select('message.*', 'message_type.message_type_name', 'message_type.message_type_icon')
//            ->whereNotNull('approved_at')
//            ->orderBy('approved_at', 'desc')
//            ->get();
//
//        $messages->map(function($message, $key) {
//            $media = explode('||', $message->message_media);
//
//            Carbon::setLocale('nl');
//            $approvedAt = Carbon::createFromTimestamp(strtotime($message->approved_at), 'Europe/Amsterdam');
//            $difference = Carbon::now()->diffForHumans($approvedAt);
//
//            $message->message_media_first = array_shift($media);
//            $message->difference = str_replace('later', 'geleden', $difference);
//            return $message;
//        });
//
//        // Get Colors
//        $colors = ['yellow','black','blue','grey'];
//
//        return view('feed', compact('messages', 'colors', 'matches'));
        return view('dashboard');
    }

}