<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [ 'title','description','image','from','to','user_id','approved_post','blocked','status', 'created_at', 'updated_at'];

//=========================================
//============ Realisations ===============
//=========================================

//*******== Many to Many ==*************

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_requests');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'post_skills');
    }

//>>>>>>>>>>>>> Many to one <<<<<<<<<<<<

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requests()
    {
        return $this->hasMany(PostRequest::class );
    }

//=========================================
//============ End Realisations ===========
//=========================================

}
