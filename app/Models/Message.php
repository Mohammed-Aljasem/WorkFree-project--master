<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'to', 'from', 'is_read'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function userTo()
    {
        return $this->belongsTo(User::class);
    }

    public function userFrom()
    {
        return $this->belongsTo(User::class);
    }
}
