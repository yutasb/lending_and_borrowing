<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\Kashikari;
use App\Like;
use App\Message;
use App\Method;
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
            'price' => 'required|integer',
            'comment' => 'required|string|max:255',
        ]);
        $kashikari = new Kashikari;
        $kashikari->title = $request->title;
        $kashikari->category_id = $request->category_id;
        $kashikari->place = $request->place;
        $kashikari->price = $request->price;
        $kashikari->comment = $request->comment;
        $kashikari->method_id = $request->method_id;

        $filename = $request->file('pic1')->store('public/post_images');
        $kashikari->pic1 = basename($filename);


        if ($request->file('pic2')) {
            $filename2 = $request->file('pic2')->store('public/post_images');
            $kashikari->pic2 = basename($filename2);
        }

        if ($request->file('pic3')) {
            $filename3 = $request->file('pic3')->store('public/post_images');
            $kashikari->pic3 = basename($filename3);
        }

        $kashikari->user_id = Auth::user()->id;
        $kashikari->save();


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
        $messages = Message::where('kashikari_id', $id)->get();

        return view('kashikari.show', ['kashikari' => $kashikari], ['messages' => $messages]);
    }

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

    public function mypage()
    {
        $user = Auth::user();
        $kashikaris = Kashikari::get();


        return view('kashikari.mypage', ['kashikaris' => $kashikaris, 'user' => $user, 'pic' => str_replace('public/', 'storage/', Auth::user()->pic),]);
        // str_replace("検索を行う文字列", "置き換えを行う文字列", "対象の文字列");
    }

    public function edit($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $kashikari = Auth::user()->kashikaris()->find($id);
        return view('kashikari.edit', ['kashikari' => $kashikari,]);
    }

    public function update(Request $request, $id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $kashikari = Kashikari::find($id);

        $kashikari->title = $request->title;
        $kashikari->category_id = $request->category_id;
        $kashikari->place = $request->place;
        $kashikari->price = $request->price;
        $kashikari->comment = $request->comment;
        $kashikari->method_id = $request->method_id;

        if ($request->file('pic1')) {
            $filename = $request->file('pic1')->store('public/post_images');
            $kashikari->pic1 = basename($filename);
        }

        if ($request->file('pic2')) {
            $filename2 = $request->file('pic2')->store('public/post_images');
            $kashikari->pic2 = basename($filename2);
        }

        if ($request->file('pic3')) {
            $filename3 = $request->file('pic3')->store('public/post_images');
            $kashikari->pic3 = basename($filename3);
        }

        $kashikari->user_id = Auth::user()->id;
        $kashikari->save();
        return redirect('/lent')->with('flash_message', __('Updated'));
    }

    public function delete($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        Auth::user()->kashikaris()->find($id)->delete();
        return redirect('/mypage')->with('flash_message', __('Deleted.'));
    }




    public function store(Request $request)
    {
        $image = new Image();
        $image->image = base64_encode(file_get_contents($request->image));
        $image->save();
        return redirect('/');
    }













    public function myprofedit(Request $request, $id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $user = Auth::user()->find($id);
        $user->pic = base64_encode(file_get_contents($request->pic));
        $user->save();
        return view('kashikari.myprofedit', ['user' => $user,]);
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

        return redirect('/mypage')->with('flash_message', __('Updated'));
    }

    public function otherprofile($id)
    {
        $users = User::find($id);
        $kashikaris = $users->kashikaris()->get();
        return view('kashikari.otherprofile', ['users' => $users, 'kashikaris' => $kashikaris]);
        // str_replace("検索を行う文字列", "置き換えを行う文字列", "対象の文字列");
    }

    public function getCategory()
    {
        $categories = config('category');
        return view('kashikari.new')->with(['categories' => $categories]);
    }

    public function getCategoryEdit()
    {
        $categories = config('category');
        return view('kashikari.edit')->with(['categories' => $categories]);
    }
}
