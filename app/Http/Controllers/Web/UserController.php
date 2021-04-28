<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Post;
use App\Models\ProjectFreelance;
use App\Models\Role;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\UserTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth_admin');
        $this->middleware('confirm-profile', ['except' => ['update', 'create', 'show']]);
    }

    public function index()
    {
        $user = User::where('id', Auth::id())->with('skills')->with('projects')->with('country')->first();
        return view('web.users.profile', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $skills = Skill::all();
        $countries = Country::all();
        return view('web.users.confirm-profile', ['roles' => $roles, 'skills' => $skills, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('skills')->with('projects')->with('country')->first();
        return view('web.users.profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        //        validation data user
        $validated = $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'email'       => 'required',
            'mobile'      => 'required',
            'role_id'     => 'required',
            'country_id'  => 'required',
            'image'       => 'required',
            'card_image'  => 'required',
            'description' => 'required',

        ]);
        $userData = $request->all();
        $new['first_name']  = $userData['first_name'];
        $new['last_name']   = $userData['last_name'];
        $new['email']       = $userData['email'];
        $new['mobile']      = $userData['mobile'];
        $new['role_id']     = $userData['role_id'];
        $new['country_id']  = $userData['country_id'];
        $new['description'] = $userData['description'];
        $new['card_image']  = $userData['card_image'];
        $new['image']       = $userData['image'];

        //        $userData['confirm_account'] =1;



        //add images (image user and image card)
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('public/uploades/imageProfile', $image_name);
            $new['image'] = $image_name;
        }
        if ($request->file('card_image')) {
            $image = $request->file('card_image');
            $image_name = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('public/uploades/cardsImages', $image_name);
            $new['card_image'] = $image_name;
        }

        //delete old data
        $scamProjects = ProjectFreelance::where('user_id', Auth::id())->get();
        foreach ($scamProjects as $project) {
            ProjectFreelance::destroy($project->id);
        }

        $scamSkills = UserSkill::where('user_id', Auth::id())->get();
        foreach ($scamSkills as $skill) {
            UserSkill::destroy($skill->id);
        }
        //add skills for freelancer
        if (!empty($userData['skills'])) {
            $skills = $userData['skills'];
            foreach ($skills as $skill) {
                $skillData['skill_id'] = $skill;
                $skillData['user_id']  = Auth::id();

                $checkData = UserSkill::where('skill_id', $skill)->where('user_id', Auth::id())->first();
                if (empty($checkData)) {
                    $skillDone = UserSkill::create($skillData);
                }
            }
        }
        //           //add projects for freelancer
        if (!empty($userData['project_name'])) {
            $projectName =  $userData['project_name'];
            $projectDesc =  $userData['description_project'];
            $projectCreate =  $userData['created_at'];
            for ($i = 0; $i < count($projectName); $i++) {
                $project['user_id'] = Auth::id();
                $project['project_name'] = $projectName[$i];
                $project['description']  = $projectDesc[$i];
                $project['created_at']   = $projectCreate[$i];
                ProjectFreelance::create($project);
            }
        }



        //add save user data for confirm account
        $user = User::find($id);

        $user->fill($new)->save();


        return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
