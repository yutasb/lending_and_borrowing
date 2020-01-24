<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user', 'msg', 'kashikari_id'];

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
        return $this->from_user->name;
    }


    public function getUserIcon()
    {
        $pic = $this->from_user->pic;
        return basename($pic);
    }
}
