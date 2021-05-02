<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProjectFreelance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEditController extends Controller
{
    public function editProjects($id)
    {
        $projects = ProjectFreelance::where('user_id', $id)->get();
        return view('web.users.edit_projects', ['projects' => $projects]);
    }


    public function edit(Request $request)
    {

        $projectData = $request->all();

        if (!empty($projectData['project_name'])) {

            $scamProjects = ProjectFreelance::where('user_id', Auth::id())->get();
            foreach ($scamProjects as $project) {
                ProjectFreelance::destroy($project->id);
            }


            $projectName   =  $projectData['project_name'];
            $projectDesc   =  $projectData['description_project'];
            $projectCreate =  $projectData['created_at'];

            for ($i = 0; $i < count($projectName); $i++) {
                $project['user_id'] = Auth::id();
                $project['project_name'] = $projectName[$i];
                $project['description']  = $projectDesc[$i];
                $project['created_at']   = $projectCreate[$i];
                ProjectFreelance::create($project);
            }
        }


        return redirect('profile');



        $projects = ProjectFreelance::where('user_id', $id)->get();
        return view('web.users.edit_projects', ['projects' => $projects]);
    }
}
