<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('web.auth_user.register');
    }
    public function Register(Request  $request){

       $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:users|max:255,email',
            'password'   => 'required',

        ]);
       $userData = $request->all();
        $userData['password'] =Hash::make($request->input('password'));
//        $userData['role_id']=1;

        $user = User::create($userData);
    }
}
