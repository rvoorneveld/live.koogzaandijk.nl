<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Carbon\Carbon;

class MessageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $message = Message::findOrFail($id);
        return view('admin.message.edit',compact('message'));
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

        $message = Message::findOrFail($id);
        $message->message_name = $request->message_name;
        $message->message_title = $request->message_title;
        $message->approved_at = (($request->status == 'online') ? Carbon::now()->toDateTimeString() : NULL);
        $message->save();

        if($request->status == 'online') {
            event(new \App\Events\MessageApproved($message));
        }

        flash()->success("Success","Message updated succesfully");

        return redirect('/admin');
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

    public function status($id)
    {
        $message = Message::findOrFail($id);

        $status = ((is_null($message->approved_at)) ? Carbon::now()->toDateTimeString() : NULL);

        $message->approved_at = $status;
        $message->save();

        if(! is_null($status)) {
            event(new \App\Events\MessageApproved($message));
        }

        flash()->success("Success","Status changed succesfully");

        return redirect('/admin');

    }
}
