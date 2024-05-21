<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Uuids;

    protected $fillable = [
        'id',
        'slug',
        'name',
        'permissions',
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_users', 'role_id', 'user_id');
    }
}
