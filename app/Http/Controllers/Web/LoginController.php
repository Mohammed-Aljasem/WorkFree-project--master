<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('web.auth_user.login');
    }
    public function login(Request $request){
       $validated = $request->validate([
            'email'      => 'required|max:255,email',
            'password'   => 'required',
        ]);
        $email    = $request->input('email');
        $password = $request->input('password');

        $user = User::login($email, $password);
//        return $validated;
        return $user;
    }
}
