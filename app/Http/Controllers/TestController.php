<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Reminder;
use Sentinel;
use Illuminate\Http\Request;
use Mail;

class TestController extends Controller
{
    //    public function index(){
    //        $user = Post::with('users')->get();
    //        $post = Post::find(1);
    //
    ////        foreach ($post->users as $user){
    ////         return $post->title;
    ////        };
    //
    ////        foreach ($post->users as $user){
    ////         return $user->first_name;
    ////        };
    //
    //        return $user;
    //    }

    public function index(Request $request)
    {
        return $request->all();
    }

    //    public function store(Request $request)
    //    {
    //
    //        $input = $request->all();
    //
    //        $user = User::whereEmail($request->email)->first();
    //        if (empty($user)) {
    //            return redirect()->back();
    //        }
    //
    //        $user = Sentinel::findById($user->id);
    //
    //        $reminder = Reminder::exists($user) ?: Reminder::create($user);
    //        $this->sendEmail($user, $reminder->code);
    //    }
    //        Public function sendEmail($user, $code){
    //            Mail::send(
    //                'forgot',
    //                ['user'=>$user, 'code'=> $code],
    //                function ($message) use ($user){
    //                    $message->to($user->email);
    //                    $message->subject("hello $user->name", "Reset your account.");
    //                }
    //            );
    //    }


    //        $data = [];
    //        $names = $input['name'];
    //
    ////        foreach ($names as $name){
    ////            Country::create(['name'=>$name]);
    ////        }
    //
    //
    //
    //        $data['name'] = json_encode($input['name']);
    //
    //
    //        return response()->json(['success'=>'Success Fully Insert Recoreds']);

}
