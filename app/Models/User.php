<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'image',
        'card_image',
        'age',
        'description',
        'role_id',
        'country_id',
        'category_id',
        'provider',
        'provider_id',
        'blocked',
        'confirm_account',
        'is_active',
        'deleted_account',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //=========================================
    //============realisations=================
    //=========================================


    //*******==Many to Many==*************

    //where user is requester
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_requests');
    }

    //technologies for user
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills', 'user_id', 'skill_id');
    }


    //>>>>>>>>>>>>>>> many to one  <<<<<<<<<<<<<<<<<<<

    public function userRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //where user is poster
    public function post()
    {
        return $this->hasMany(Post::class, 'foreign_key', 'owner_key');
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }

    public function projects()
    {
        return $this->hasMany(ProjectFreelance::class, 'user_id');
    }

    //>>>>>>>>>>>>>> one to many <<<<<<<<<<<<<<<<<

    //where user is he send post
    public function postRequest()
    {
        return $this->hasMany(PostRequest::class);
    }
    //where user is he send post
    public function messageFrom()
    {
        return $this->hasMany(Message::class, 'from');
    }
    public function messageTo()
    {
        return $this->hasMany(Message::class, 'to');
    }


    //=========================================
    //==============End relations==============
    //=========================================

    public  static  function login($email, $password)
    {

        try {

            $email    = $email;
            $password = $password;



            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $user = Auth::user();

                return redirect(url('admin/manage'));
            }
            return redirect()->back();
        } catch (Exception $e) {

            report($e);
            return $e->getMessage();
        }
    }

    public static function logout()
    {



        Session::flush(); // remove session

        return redirect(url('/login'));
    }
}
