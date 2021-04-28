<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use Illuminate\Http\Request;

class AgreementRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_admin');
        $this->middleware('confirm-profile');
    }

    public function create($id)
    {
        return view('web.agreement.create', ['user_id' => $id]);
    }


    public function accept($id)
    {
        $accept['freelance_accept'] = 1;
        $agreement = Agreement::find($id);
        $agreement->fill($accept)->save();
        return redirect()->back();
    }


    public function reject($id)
    {
        $reject['freelance_accept'] = 2;
        $agreement = Agreement::find($id);
        $agreement->fill($reject)->save();
        return redirect()->back();
    }
}
