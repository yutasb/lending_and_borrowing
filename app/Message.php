<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['send_data', 'msg'];

    public function kashikari()
    {
        return $this->hasOne('App\Kashikari');
    }
}
