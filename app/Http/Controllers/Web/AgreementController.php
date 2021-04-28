<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use App\Models\ProjectFreelance;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_admin');
        $this->middleware('confirm-profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 3) {
            $agreements = Agreement::where('freelance_id', Auth::id())->with('userClient')->get();
            return view('web.agreement.index', ['agreements' => $agreements]);
        } elseif (Auth::user()->role_id == 4) {

            $agreements = Agreement::where('client_id', Auth::id())->with('userFreelance')->get();
            return view('web.agreement.index', ['agreements' => $agreements]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'project_title' => 'required',
            'description' => 'required',
            'requirement_title' => 'required',
            'require_description' => 'required',
            'skill' => 'required',
            'budget' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',


        ]);


        $agreementData = $request->all();
        //     $agreementData['requirement_title'][1];
        $agreementData['client_id'] = Auth::id();

        $agreement = Agreement::create($agreementData);
        $agreement_id = $agreement->id;


        if (!empty($agreementData['project_title'])) {
            $requireName   =  $agreementData['requirement_title'];
            $requireDesc   =  $agreementData['require_description'];


            if (!empty($agreementData['requirement_title'][1])) {

                for ($i = 0; $i < count($requireName); $i++) {
                    $requirement['agreement_id'] = $agreement_id;
                    $requirement['title']        = $requireName[$i];
                    $requirement['description']  = $requireDesc[$i];

                    Requirement::create($requirement);
                }
            } else {

                $requirement['agreement_id'] = $agreement_id;
                $requirement['title']        = $requireName[0];
                $requirement['description']  = $requireDesc[0];
                $requirement;
                Requirement::create($requirement);
            }
        }
        return redirect('/agreements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agreement = Agreement::where('id', $id)->with('userFreelance')->with('userClient')->with('requirement')->first();
        return view('web.agreement.agreement-form', ['agreement' => $agreement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agreement = Agreement::where('id', $id)->with('requirement')->first();
        return view('web.agreement.edit', ['agreement' => $agreement]);
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
            'project_title' => 'required',
            'description' => 'required',
            'requirement_title' => 'required',
            'require_description' => 'required',
            'budget' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',


        ]);


        $agreementData = $request->all();
        //     $agreementData['requirement_title'][1];
        $agreementData['client_id'] = Auth::id();
        $agreementData['freelance_accept'] = 0;

        $agreement = Agreement::find($id);
        $agreement->fill($agreementData)->save();

        $agreement_id = $agreement->id;
        //delete old requirement
        $scamRequire = Requirement::where('agreement_id', $agreement_id)->get();
        foreach ($scamRequire as $require) {
            Requirement::destroy($require->id);
        }
        //add new requirements
        if (!empty($agreementData['project_title'])) {
            $requireName   =  $agreementData['requirement_title'];
            $requireDesc   =  $agreementData['require_description'];


            if (!empty($agreementData['requirement_title'][1])) {

                for ($i = 0; $i < count($requireName); $i++) {
                    $requirement['agreement_id'] = $agreement_id;
                    $requirement['title']        = $requireName[$i];
                    $requirement['description']  = $requireDesc[$i];

                    Requirement::create($requirement);
                }
            } else {

                $requirement['agreement_id'] = $agreement_id;
                $requirement['title']        = $requireName[0];
                $requirement['description']  = $requireDesc[0];
                $requirement;
                Requirement::create($requirement);
            }
        }
        return redirect('/agreements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agreement = Agreement::destroy($id);
        if ($agreement) {
            return redirect('/agreements');
        }
    }
}
