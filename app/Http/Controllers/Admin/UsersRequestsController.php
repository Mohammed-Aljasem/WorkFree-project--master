<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersRequestsController extends Controller
{
  public function index()
  {
    $users = User::with('userRole')->with('category')->get();
    return view('admin.manage_users.request', ['users' => $users]);
  }

  public function approve($id)
  {

    $userData['confirm_account'] = 1;
    $user = User::find($id);
    $user->fill($userData)->save();
  }
}
