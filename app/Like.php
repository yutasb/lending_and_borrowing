<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id','kashikari_id'];

        public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kashikari(){
        return $this->belongsTo('App\Kashikari');
    }

}



