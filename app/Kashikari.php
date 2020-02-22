<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kashikari extends Model
{
    protected $fillable = ['title', 'category_id', 'method_id', 'place', 'price', 'comment', 'borrower', 'pic1', 'pic2', 'pic3',];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



    public function getIcon()
    {
        $pic = $this->user->pic;
        return $pic;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function chats()
    {
        return $this->hasMany('App\Chat');
    }

    public function likeJudge()
    {
        return $this->likes->user_id;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getCategoryName()
    {
        return $this->category->name;
    }


    public function method()
    {
        return $this->belongsTo('App\Method');
    }
}
