<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function kashikari()
    {
        return $this->hasMany('App\Kashikari');
    }
}
