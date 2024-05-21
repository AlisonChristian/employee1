<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Employee_ids extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'emp_id',
        'employee_no',
    ];
}