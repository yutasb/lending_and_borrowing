<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kashikari;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        Auth::user()->kashikaris()->save($kashikari->fill($request->all()));
        return redirect('/lent')->with('flash_message', __('Registered.'));
    }

    public function usercreate(Request $request)
    {
        $request->validate([
            'comment' => 'string|max:255',
            'pic' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User;
        Auth::user()->save($user->fill($request->all()));
        return redirect('/mypage')->with('flash_message', __('Profile Regiseterd'));
    }

    public function index()
    {
        $kashikaris = Kashikari::all();
        return view('kashikari.index', ['kashikaris' => $kashikaris]);
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
        $kashikaris = Auth::user()->kashikaris()->get();
        return view('kashikari.mypage', compact('kashikaris'));
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
        return view('kashikari.myprofedit', ['user' => $user]);
    }

    public function myprofupdate(Request $request, $id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $user = User::find($id);
        $user->fill($request->all())->save();

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
