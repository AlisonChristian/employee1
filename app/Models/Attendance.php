<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    protected $primaryKey = 'id'; // If you want to use UUID as the primary key
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing

    protected $keyType = 'string'; // Set the key type to string for UUIDs

    protected $fillable = [
        'id', // Assuming 'id' is fillable
        'employee_id',
        // Other fillable columns...
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
