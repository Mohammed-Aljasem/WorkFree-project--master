<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable

{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'role_id',
        'remember_token',
        'created_at',
        'updated_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//=========================================
//============ Realisations ===============
//=========================================


    public function adminRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

//=========================================
//============ End Realisations ===========
//=========================================


    public  static  function login($email,$password){

        try {

            $email    = $email;
            $password = $password;



            if (Auth::guard('admin')->attempt(['email'=>$email, 'password' =>$password])){
                $admin = Auth::user();
                return  redirect(url('admin/manage'));

            }
            return redirect()->back();


        } catch (Exception $e) {

            report($e);
            return $e->getMessage();
        }
    }

}
