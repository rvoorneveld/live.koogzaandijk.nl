<?php

namespace App\Http\Controllers;

use App\Notifications\MessageCreatedByClient;
use Illuminate\Http\Request;
use App\User;
use App\Message;


class MessageController extends Controller
{

    public function addMedia()
    {
        return view('add/mediaform');
    }

    public function saveStepMedia(Request $request)
    {
        $this->validate($request,[
            'files' => 'required|filled'
        ]);

        $files = implode('||',json_decode(base64_decode($request->get('files'))));

        $message = new Message;
        $message->message_type_id = 5;
        $message->message_media = $files;
        $message->save();

        $this->_setId($message->message_id);

        return redirect('/add-details');
    }

    public function addDetails()
    {
        return view('add/detailsform');
    }

    public function saveStepDetails(Request $request)
    {
        $this->validate($request,[
            'message_name' => 'required|filled',
            'message_title' => 'required|filled',
        ]);

        $message = Message::find($this->_getId());
        $message->message_name = $request->get('message_name');
        $message->message_title = $request->get('message_title');
        $message->save();

        $users = User::all();

        foreach($users as $user) {
            $user->notify(new MessageCreatedByClient($message));
        }


        flash()->success('Succes!','Uw bericht is met succes opgeslagen');

        return redirect('/');
    }

    protected function _setId($messageId)
    {
        session()->put('message_id',$messageId);
    }

    protected function _getId()
    {
        return session()->get('message_id');
    }

}
