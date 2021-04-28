<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $table = 'agreements';

    protected $fillable =
    [
        'project_title',
        'description',
        'client_id',
        'freelance_id',
        'date_start',
        'date_end',
        'budget',
        'freelance_accept',
        'project_status',
        'created_at',
        'updated_at'
    ];

    //=========================================
    //============ Realisations ===============
    //=========================================


    public function requirement()
    {
        return $this->hasMany(Requirement::class, 'agreement_id');
    }

    public function userClient()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function userFreelance()
    {
        return $this->belongsTo(User::class, 'freelance_id');
    }

    //=========================================
    //==========End Realisations ==============
    //=========================================
}
