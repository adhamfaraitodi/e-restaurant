<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function dashboard()
    {

        $sumAdmins = DB::table('admins')->where('job', 'karyawan')->count();
        $sumMenu = DB::table('menus')->count();
        $sumOrders = DB::table('orders')->count();
        $sums = [
            'sumAdmins' => $sumAdmins,
            'sumMenu' => $sumMenu,
            'sumOrders' => $sumOrders,
        ];
        return view('admin.dashboard', $sums);
    }
    public function show()
    {
        return view('admin.index');
    }
}
