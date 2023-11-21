<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        return view('admin.tambahmenu');
    }

}
