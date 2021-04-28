<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostRequest;
use Illuminate\Http\Request;
use Auth;

class PostRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_admin');
        $this->middleware('confirm-profile');
    }

    public function index()
    {
        $posts =  Post::where('user_id', Auth::id())->with('users')->get();
        //     return $posts;
        return view('web.post.post_manage', ['posts' => $posts]);
    }

    public function sendRequest($id)
    {

        $user_id = Auth::id();
        $postRequest['post_id'] = $id;
        $postRequest['user_id'] = $user_id;
        $postRequest['accepted'] = 0;

        PostRequest::create($postRequest);

        return redirect('/post');
    }
    public function acceptRequest($id)
    {
        $request = PostRequest::find($id);
        $requestData['accepted'] = 1;
        $request->fill($requestData)->save();
        return redirect()->back();
    }

    public function deleteRequest($id)
    {

        $requestData['accepted'] = 2;
        $request = PostRequest::find($id);
        $request->fill($requestData)->save();


        return redirect()->back();
    }
}
