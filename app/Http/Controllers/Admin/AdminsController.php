<?php





namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use \Validator;
use \Exception;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $admins = User::all();
      return view('admin.manage_admin.index', ['admins'=>$admins]);

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
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:admins|max:255,email',
            'password'   => 'required',

        ]);
        $adminData = $request->all();
        $adminData['password'] =Hash::make($request->input('password'));
//        $adminData['role_id']=1;

        $admin = User::create($adminData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.manage_admin.edit',['admin'=> $admin]);

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
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|max:255,email',
            'password'   => 'required',

        ]);
        $adminData = $request->all();
        $adminData['password'] =Hash::make($request->input('password'));
        $admin = User::find($id);
        $admin->fill($adminData)->save();

        session()->flash('success2', trans('messages.data_has_been_updated_successfully'));
        return redirect()->route('manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $admin = User::destroy($id);
        if($admin){
            return redirect()->route('manage.index');
        }
    }
}
