<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSkill extends Model
{
    use HasFactory;

    protected $table = 'post_skills';

    protected $fillable = [ 'skill_id','post_id', 'created_at', 'updated_at'];
}
