<?php

namespace App\Http\Controllers;

use App\Kashikari;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendmsg(Request $request, $id)
    {
        $request->validate([
            'msg' => 'required|string|max:255',
        ]);
        $messages = new Message;
        $kashikaris = Kashikari::find($id);
        $messages->user_id = Auth::user()->id;
        $messages->msg = $request->msg;
        $messages->kashikari_id = $kashikaris->id;
        $messages->save();

        return redirect()->route('kashikari.show', ['id' => $messages->kashikari_id]);
    }
}
