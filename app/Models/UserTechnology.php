<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTechnology extends Model
{
    use HasFactory;

    protected $table = 'user_technologies';

    protected $fillable = [ 'user_id','technology_id', 'created_at', 'updated_at'];

}
