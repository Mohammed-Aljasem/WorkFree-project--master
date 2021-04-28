<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Post;
use App\Models\PostSkill;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('skills')->with('requests')->with('user')->get();

        //       foreach ($posts as $key => $post){
        //           foreach ($posts[$key]->requests as $request){
        //                if ($request->user_id != Auth::id()){
        //               echo $request->id."--------".$request->user_id ."<br>";
        //
        //                }
        //           };
        //       }
        //       exit;
        return view('web.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'image' => 'required',
            'skills' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);
        $user_id = Auth::user()->id;

        $postDetail = $request->all();
        $postDetail['user_id'] = $user_id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('public/uploades/posts', $image_name);
            $postDetail['image'] = $image_name;
        }

        $postDetail['user_id'] = Auth::id();
        $post = Post::create($postDetail);
        $post_id = $post->id;
        #################################################
        //add skills for freelancer
        if (!empty($postDetail['skills'])) {
            $skills = $postDetail['skills'];
            foreach ($skills as $skill) {
                $skillData['post_id'] = $post_id;
                $skillData['skill_id'] = $skill;
                $skillData['user_id']  = Auth::id();

                $skillDone = PostSkill::create($skillData);
            }
        }
        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::where('id', $id)->with('users')->with('requests')->first();

        $countries = Country::all();
        $users = User::with('skills')->get();
        return view('web.post.requests-post', ['post' => $post, 'countries' => $countries, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->with('skills')->first();
        return view("web.post.edit", ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required',
            'description' => 'required|max:255',
            'image'       => 'required',
            'skills'      => 'required',
            'from'        => 'required',
            'to'          => 'required',
        ]);


        $postDetail = $request->all();

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('public/uploades/posts', $image_name);
            $postDetail['image'] = $image_name;
        }


        $post = Post::find($id);
        $post->fill($postDetail)->save();
        $post_id = $post->id;
        #################################################

        $scamSkills = PostSkill::where('post_id', $post_id)->get();
        foreach ($scamSkills as $skill) {
            PostSkill::destroy($skill->id);
        }
        //add skills for freelancer
        if (!empty($postDetail['skills'])) {
            $skills = $postDetail['skills'];
            foreach ($skills as $skill) {
                $skillData['post_id'] = $post_id;
                $skillData['skill_id'] = $skill;
                $skillData['user_id']  = Auth::id();

                $skillDone = PostSkill::create($skillData);
            }
        }
        return "ok";
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::destroy($id);
        return "ok";
    }
}
