<?php

namespace App\Http\Controllers;

use App\Kashikari;
use Illuminate\Http\Request;

class LentReturnController extends Controller
{
    public function confirm($id)
    {
        $param = ['kashikari_using' => '0', 'borrower' => '0'];
        $kashikari = Kashikari::find($id);
        Kashikari::where('id', $id)->update($param);
        return view('kashikari.returnconfirm', ['kashikari' => $kashikari]);
    }

    public function return()
    {
        return redirect('/mypage')->with('flash_message', __('Returned.'));
    }
}
