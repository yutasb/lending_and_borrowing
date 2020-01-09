<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['send_data', 'msg', 'kashikari_id'];

    public function kashikari()
    {
        return $this->belongsTo('App\Kashikari');
    }

    public function getData()
    {
        return $this->msg;
    }
}
