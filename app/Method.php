<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    public function kashikari()
    {
        return $this->hasMany('App\Kashikari');
    }

    public function doubleSearch($request)
    {
        $methodId    = $request->input('method_id');
        $categoryId = $request->input('category_id');
        $query      = $this->with(['紐づくデータ', '紐づくデータ']);

        if (isset($methodId)) {
            $query->where('method_id', $methodId);
        }

        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        return $query->get();
    }
}
