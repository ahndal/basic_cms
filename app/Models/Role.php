<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // 허용컬럼
    protected $fillable = [
       'name', 'is_admin', 'is_default',
    ];

    // many to many =  belongsToMany
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_user')->withTimestamps();
    }
}
