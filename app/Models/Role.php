<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [ 'role_name', 'created_at', 'updated_at'];


//=========================================
//============ Realisations ===============
//=========================================


    public function admins()
    {
        return $this->hasMany('App\Models\admin');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }


//=========================================
//========== End Realisations =============
//=========================================
}
