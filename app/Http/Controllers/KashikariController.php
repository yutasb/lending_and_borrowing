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
        $kashikari->category_id = $request->category_id;
        $kashikari->place = $request->place;
        $kashikari->price = $request->price;
        $kashikari->comment = $request->comment;

        $filename = $request->file('pic1')->store('public/post_images');
        $kashikari->pic1 = basename($filename);

        $filename2 = $request->file('pic2');
        if ($filename2) {
            $filename2->store('public/post_images');
            $kashikari->pic2 = basename($filename);
        }
        $filename3 = $request->file('pic3');
        if ($filename3) {
            $filename3->store('public/post_images');
            $kashikari->pic3 = basename($filename);
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

        $filename = $request->file('pic1');
        $filename->store('public/post_images');
        $kashikari->pic1 = basename($filename);

        $filename2 = $request->file('pic2');
        if ($filename2) {
            $filename2->store('public/post_images');
            $kashikari->pic2 = basename($filename);
        }
        $filename3 = $request->file('pic3');
        if ($filename3) {
            $filename3->store('public/post_images');
            $kashikari->pic3 = basename($filename);
        }

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

    public function searchCategory()
    {
        $categories = config('category');
        return view('kashikari.index')->with(['categories' => $categories]);
    }


    public function search($id)
    {
        $kashikaris = Kashikari::where('category_id', $id)->get();
        return view('kashikari.index', ['kashikaris' => $kashikaris]);
    }

    public function wordsearch(Request $request)
    {

        $kashikaris = Kashikari::where('title',  'like', "%{$request->title}%")->get();
        return view('kashikari.index', ['kashikaris' => $kashikaris]);
    }
}
