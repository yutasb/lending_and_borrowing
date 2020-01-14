<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Kashikari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($id)
    {
        $kashikari = Kashikari::find($id);
        $chats = Chat::where('kashikari_id', $id)->get();  //これでkashikari_idとURIの{id}が一致しているレコードを取ってこられる。
        return view('kashikari.msg', ['kashikari' => $kashikari], ['chats' => $chats]);
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'msg' => 'required|string|max:255',
        ]);
        $chats = new Chat;
        $kashikaris = Kashikari::find($id);
        $chats->user_id = Auth::user()->id;
        $chats->msg = $request->msg;
        $chats->kashikari_id = $kashikaris->id;
        $chats->save();

        return redirect()->route('chat.index', ['id' => $chats->kashikari_id]);
    }
}
