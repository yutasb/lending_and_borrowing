<?php

namespace App\Http\Controllers;

use App\Kashikari;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function off($id)
    {
        $kashikari = Kashikari::find($id);
        $likeJudge = Like::where('kashikari_id', $id)->get();

        if ($likeJudge->isEmpty()) {

            $like = new Like();
            $like->user_id = Auth::user()->id;
            $like->kashikari_id = $kashikari->id;
            $like->save();

            return redirect()->route('kashikari.show', ['id' => $like->kashikari_id])->with('flash_message', __('Like'));
        } else {

            $kashikari->likes()->delete();

            return redirect()->route('kashikari.show', ['id' => $kashikari->id])->with('flash_message', __('UnLike'));
        }
    }

    public function Page($id)
    { }
}
