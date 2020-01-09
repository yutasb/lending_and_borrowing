<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kashikari extends Model
{
    protected $fillable = ['title', 'place', 'price', 'comment', 'pic1', 'pic2', 'pic3'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function message()
    // {
    //     return $this->belongsTo('App\Message');
    // }
}
