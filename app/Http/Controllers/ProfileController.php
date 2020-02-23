<?php
// myprofile otherprofile
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

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
        $user = Auth::user()->find($id);


        $picupload = $user->pic = $request->file('pic');
        $path = Storage::disk('s3')->putFile('myprefix', $picupload, 'public');
        $user->pic = Storage::disk('s3')->url($path);


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
    }
}
