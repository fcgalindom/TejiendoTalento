<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bossUser()
    {
        return $this->belongsTo(User::class, 'boss_id');
    }


    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
