<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'image', 'description', 'created_at', 'updated_at'];


    //=========================================
    //============ Realisations ===============
    //=========================================


    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
