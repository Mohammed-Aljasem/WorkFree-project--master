<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRequest extends Model
{
    use HasFactory;

    protected $table = 'post_requests';

    protected $fillable = [ 'post_id','user_id','accepted', 'created_at', 'updated_at'];

//=========================================
//============ Realisations ===============
//=========================================


    public function post()
{
    return $this->hasMany(Post::class);
}

    public function users()
    {
        return $this->belongsTo(User::class);
    }


//=========================================
//========== End Realisations =============
//=========================================
}
