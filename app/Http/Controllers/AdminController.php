<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function show()
    {
        return view('admin.index');
    }
}
