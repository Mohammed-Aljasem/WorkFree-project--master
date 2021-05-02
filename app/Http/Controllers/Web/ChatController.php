<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;



use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::Where('id', '!=', Auth::user()->id)->get();
        // return   $users = User::Where('id', '!=', Auth::user()->id)->with('messageTo')->get();
        // $users = Message::Where('from', '!=', Auth::id())->orWhere('to', '!=', Auth::id())->with('userTo')->get();


        return view('web.chat.index', ['users' => $users]);
    }

    public function getMessage($id)
    {
        $user_id = $id;
        $my_id = Auth::user()->id;
        $messages = Message::Where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();

        $user  = User::find($id);
        return view('web.chat.message', ['messages' => $messages, 'user' =>  $user]);
    }
    public function getSpeaker($id)
    {
        $user_id = $id;
        $my_id = Auth::user()->id;
        $messages = Message::Where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();


        $user  = User::find($id);

        return view('web.chat.speaker', ['user' =>  $user, 'messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from    = Auth::id();
        $to      = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from    = $from;
        $data->to      = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();


        // pusher

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter

        broadcast(new MessageEvent($data));

        //        event(new MessageEvent($data));

        //        return "success";

    }
    public function userChat($id)
    {
        $user = User::find($id);
        $users = User::Where('id', '!=', Auth::user()->id)->get();

        $user_id = $id;
        $my_id = Auth::user()->id;
        $messages = Message::Where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();

        return view('web.chat.user_chat', ['messages' => $messages, 'userChat' =>  $user, 'users' =>  $users]);
    }
}
