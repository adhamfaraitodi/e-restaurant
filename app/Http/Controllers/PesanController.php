<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function show(){
        return view('customer.pesan');
    }
}
