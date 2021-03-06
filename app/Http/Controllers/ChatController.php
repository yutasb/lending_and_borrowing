<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Kashikari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function confirm($id)
    {

        $kashikari = Kashikari::find($id);

        return view('kashikari.borrowconfirm', ['kashikari' => $kashikari]);
    }

    public function index($id)
    {
        $param = ['kashikari_using' => '1', 'borrower' => Auth::user()->id];
        $kashikari = Kashikari::find($id);
        Kashikari::where('id', $id)->update($param);
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
