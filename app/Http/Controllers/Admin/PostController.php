<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('approved_post', 0)->with('skills')->with('user')->with('category')->get();
        return view('admin.manage_posts.index', ['posts' => $posts]);
    }



    public function delete($id)
    {
        $post = Post::destroy($id);

        return redirect('/admin/posts');
    }



    public function reject($id)
    {
        $postData['approved_post'] = 2;
        $post = Post::find($id);
        $post->fill($postData)->save();
        return redirect('/admin/posts');
    }



    public function view($id)
    {

        $post = Post::where('id', $id)->with('skills')->with('user')->with('category')->first();
        return view('admin.manage_posts.show', ['post' => $post]);
    }


    public function approve($id)
    {
        $postData['approved_post'] = 1;
        $post = Post::find($id);
        $post->fill($postData)->save();


        return redirect('/admin/posts');
    }
}
