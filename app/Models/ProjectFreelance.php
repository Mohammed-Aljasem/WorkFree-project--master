<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFreelance extends Model
{
    use HasFactory;

    protected $table = 'project_freelancers';

    protected $fillable = [ 'user_id','project_name','date_finished','description', 'created_at', 'updated_at'];

//=========================================
//============ Realisations ===============
//=========================================

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//=========================================
//========== End Realisations =============
//=========================================
}
