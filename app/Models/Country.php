<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [ 'name', 'created_at', 'updated_at'];


//=========================================
//============ Realisations ===============
//=========================================


    public function users()
    {
        return $this->hasMany(User::class, 'foreign_key', 'owner_key');

    }


//=========================================
//========== End Realisations =============
//=========================================


}
