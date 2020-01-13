<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'email', 'myself', 'pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getIcon()
    {
        $pic = $this->pic;
        return basename($pic);
    }

    public function kashikaris()
    {
        return $this->hasMany('App\Kashikari');
    }


    public function likes()
    {
        return $this->hasMany('App\like');
    }

    public function messages()
    {
        return $this->hasMany('App\message');
    }
}
