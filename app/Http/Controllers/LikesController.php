<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request, $kashikariId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'kashikari_id' => $kashikariId
          )
        );

        $like = Like::findOrFail($KashikariId);

        return redirect()
             ->action('KashikariController@index', $like->id);
    }

    public function destroy($kashikariId, $likeId) {
      $kashikari = Post::findOrFail($likeId);
      $kashikari->like_by()->findOrFail($likeId)->delete();

      return redirect()
             ->action('KashikariController@index', $like->id);
    }
}
