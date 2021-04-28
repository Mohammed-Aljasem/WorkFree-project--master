<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = [ 'title','description','agreement_id', 'created_at', 'updated_at'];

//=========================================
//============ Realisations ===============
//=========================================


    public function agreement()
    {
        return $this->belongsTo(Agreement::class,'agreement_id');
    }


//=========================================
//========== End Realisations =============
//=========================================
}
