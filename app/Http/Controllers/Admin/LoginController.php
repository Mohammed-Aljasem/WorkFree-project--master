<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.auth_admin.login');
    }
    public function login(Request $request){
      $validated = $request->validate([
            'email'      => 'required|max:255,email',
            'password'   => 'required',
        ]);
        $email    = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::login($email, $password);
//        return $validated;
        return $admin;
    }


    public function logout(){

        try {

            $user = User::logout();
            return $user;

        } catch (Exception $e) {

            report($e);
            return $e->getMessage();

        }

    }
}
