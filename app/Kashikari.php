<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kashikari extends Model
{
    protected $fillable = ['title', 'place', 'price', 'comment', 'pic1', 'pic2', 'pic3'];
}
