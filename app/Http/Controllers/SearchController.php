<?php

namespace App\Http\Controllers;

use App\Category;
use App\Kashikari;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchCategory()
    {
        $categories = config('category');
        return view('kashikari.index')->with(['categories' => $categories]);
    }


    public function search($id)
    {
        $kashikaris = Kashikari::where('category_id', $id)->get();
        $categories = Category::find($id);
        return view('kashikari.index', ['kashikaris' => $kashikaris, 'categories' => $categories]);
    }

    public function wordsearch(Request $request)
    {

        $kashikaris = Kashikari::where('title',  'like', "%{$request->title}%")->get();
        return view('kashikari.index', ['kashikaris' => $kashikaris]);
    }
}
