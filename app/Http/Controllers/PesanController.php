<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function show($mejaID){
        
        return view('customer.pesan',['idMeja' => $mejaID]);
    }
    public function menu($mejaID){
        return view('customer.menu',['idMeja' => $mejaID]);
    }
    public function cartshow($mejaID){
        return view('customer.cart',['idMeja' => $mejaID]);
    }

    public function setupSession(Request $request)
    {
        $request->session()->put('nameCus',$request->input('namaCus'));
        return redirect()->route('pesan.menu', $request->input('id'));
    }
}
