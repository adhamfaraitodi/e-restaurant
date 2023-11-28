<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function show(){
        return view('customer.pesan');
    }
    public function menu(){
        return view('customer.menu');
    }
    public function cartshow(){
        return view('customer.cart');
    }
}
