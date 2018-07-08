<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    // 허용컬럼
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    // 비밀번호, 비밀번호 기억 숨김
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 접속일 추가
    protected $dates = ['visited_at'];

    // many to many =  belongsToMany
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user')->withTimestamps();
    }
}
