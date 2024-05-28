<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Leaves extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'employee_name',
        'department',
        'leave_reason',
        'created_at',
        'remarks',
        'employee_ctn',
    ];
}
