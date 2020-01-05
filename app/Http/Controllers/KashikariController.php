<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kashikari;

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
        $kashikari->fill($request->all())->save();
        return redirect('/lent')->with('flash_message', __('Registered.'));
    }

    public function index()
    {
        $kashikaris = Kashikari::all();
        return view('kashikari.index', ['kashikaris' => $kashikaris]);
    }

    public function show($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Registered.'));
        }
        $kashikari = Kashikari::find($id);
        return view('kashikari.show', ['kashikari' => $kashikari]);
    }

    public function edit($id)
    {
        if (!\ctype_digit($id)) {
            return redirect('/lent/new')->with('flash_message', __('Invalid operation was perfomed'));
        }
        $kashikari = Kashikari::find($id);
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

        Kashikari::find($id)->delete();
        return redirect('/lent')->with('flash_message', __('Deleted.'));
    }
}
