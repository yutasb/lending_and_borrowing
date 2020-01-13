<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'msg', 'kashikari_id'];

    public function kashikari()
    {
        return $this->belongsTo('App\Kashikari');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getUserName()
    {
        return $this->user->name;
    }


    public function getUserIcon()
    {
        $pic = $this->user->pic;
        return basename($pic);
    }
}
