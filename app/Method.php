<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    public function kashikari()
    {
        return $this->hasMany('App\Kashikari');
    }
}
