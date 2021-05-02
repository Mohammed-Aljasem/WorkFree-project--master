<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Skill;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // return   Skill::where('id', 2)->with('posts')->get();
        // Search in the title and body columns from the posts table
        $skills = Skill::query()
            ->where('name', 'LIKE', "%{$search}%")
            // ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

        // if (!empty($skills[0])) {
        //     return $skills;
        // } else {
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")->with('skills')->with('user')
            ->get();

        return view('web.post.posts_search', ['posts' => $posts]);
        // }
    }
}
