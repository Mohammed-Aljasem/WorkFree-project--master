<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = ['name','created_at','updated_at'];

//=========================================
//============ Realisations ===============
//=========================================


//*******==Many to Many==*************

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function posts()
    {
        return $this->belongsToMany(User::class, 'post_skills');
    }

//=========================================
//============ End Realisations ===========
//=========================================
}
