<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kashikari;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KashikariController extends Controller
{
    public function new()
    {
        return view('kashikari.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
        ]);
        $kashikari = new Kashikari;
        $kashikari->title = $request->title;
        $kashikari->place = $request->place;
        $kashikari->price = $request->price;
        $kashikari->comment = $request->comment;
        $filename = $request->file('pic1')->store('public/post_images');
        $kashikari->pic1 = basename($filename);
        $filename = $request->file('pic2')->store('public/post_images');
        $kashikari->pic2 = basename($filename);
        $filename = $request->file('pic3')->store('public/post_images');
        $kashikari->pic3 = basename($filename);
        $kashikari->user_id = Auth::user()->id;
        $kashikari->save();

        // Auth::user()->kashikaris()->save($kashikari->fill($request->all()));
        return redirect('/lent')->with('flash_message', __('Registered.'));
    }






    public function index()
    {
        $kashikaris = Kashikari::all();
        // 全レコードを取得

        return view('kashikari.index', ['kashikaris' => $kashikaris]);
        //index.blade.phpの$kashikaris部分が、$kashikari(今回の場合Kashikari::all)に置き換えられる。
    }




    public function show($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed.'));
        }
        $kashikari = Kashikari::find($id);
        $message = Message::find($id);
        return view('kashikari.show', ['kashikari' => $kashikari], ['message' => $message]);
    }
    public function showboard($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed.'));
        }
        $message = Message::find($id);
        $kashikari = Kashikari::find($id);
        return view('kashikari.show', ['kashikari' => $kashikari], ['message' => $message]);
    }

    public function mypage()
    {
        $user = Auth::user();
        $kashikaris = Auth::user()->kashikaris()->get();
        return view('kashikari.mypage', ['kashikaris' => $kashikaris, 'user' => $user, 'pic' => str_replace('public/', 'storage/', Auth::user()->pic),]);
        // str_replace("検索を行う文字列", "置き換えを行う文字列", "対象の文字列");
    }

    public function edit($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $kashikari = Auth::user()->kashikaris()->find($id);
        return view('kashikari.edit', ['kashikari' => $kashikari]);
    }
    public function update(Request $request, $id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $kashikari = Kashikari::find($id);
        $kashikari->fill($request->all())->save();
        return redirect('/lent')->with('flash_message', __('Registerd.'));
    }
    public function delete($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        Auth::user()->kashikaris()->find($id)->delete();
        return redirect('/mypage')->with('flash_message', __('Deleted.'));
    }
    public function myprofedit($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $user = Auth::user()->find($id);
        return view('kashikari.myprofedit', ['user' => $user, 'pic' => str_replace('public/', 'storage/', Auth::user()->pic),]);
    }



    public function myprofupdate(Request $request, $id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $user = Auth::user()->find($id);
        $time = date("Ymdhis");
        $user->pic = $request->pic->storeAs('public/post_images', $time . '_' . Auth::user()->id . '.jpg');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->myself = $request->myself;
        $user->save();


        // $user->fill($request->all())->save();
        return redirect('/mypage')->with('flash_message', __('Updated'));
    }


















    public function msg($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent')->with('flash_message', __('Invalid operation was perfomed.'));
        }
        $message = Message::all();
        return view('kashikari.msg', ['message' => $message]);
    }
    public function showmsg(Request $request, $id)
    {
        $request->validate([
            'msg' => 'required|string|max:255',
        ]);
        $message = new Message;
        $message->fill($request->all())->save();
        // return view('kashikari.showmsg', ['message' => $message]);
        $message = kashikari()->find($id);
        $messages = Message::all();
        return view('kashikari.showmsg', ['messages' => $messages]);
    }
}
