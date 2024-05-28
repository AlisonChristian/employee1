<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Traits;

class Employee extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'id', 
        'name',
        'department',
        'email',
        'phone_number',
        'gender',
        'address',
    ];

    protected $hidden = [
        'pin_code', 'remember_token',
    ];

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'schedule_employees', 'emp_id', 'schedule_id');
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function latetimes()
    {
        return $this->hasMany(Latetime::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function overtimes()
    {
        return $this->hasMany(Overtime::class);
    }
}
