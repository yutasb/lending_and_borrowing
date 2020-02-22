<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable = ['sender', 'msg', 'kashikari_id'];

    public function kashikari()
    {
        return $this->belongsTo('App\kashikari');
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
