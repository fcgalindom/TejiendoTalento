<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCharge extends Model
{
    use HasFactory;
    public function charge()
    {
        return $this->belongsTo(Charge::class, 'charge_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function boss()
    {
        return $this->belongsTo(User::class, 'boss_id');
    }

}
