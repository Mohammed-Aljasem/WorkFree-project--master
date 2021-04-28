<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $table = 'technologies';

    protected $fillable = ['name','created_at','updated_at'];

//=========================================
//============ Realisations ===============
//=========================================


//*******==Many to Many==*************

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_technologies');
    }

    public function posts()
    {
        return $this->belongsToMany(User::class, 'post_technologies');
    }

//=========================================
//============ End Realisations ===========
//=========================================
}
