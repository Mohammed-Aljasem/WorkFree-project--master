<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryFilterController extends Controller
{
    public function filter($id)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $id)->with('skills')->with('requests')->with('user')->get();
        return view('web.post.index', ['posts' => $posts, 'categories' => $categories]);
    }
}
