<?php

namespace App\Http\Controllers;

use App\Models\MenuOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function show(){
        $datas = DB::table('menu_order')
            ->join('menus', 'menu_order.id_menu', '=', 'menus.id')
            ->select('menu_order.quantity','menu_order.price_food','menu_order.discount','menu_order.subtotal','menu_order.created_at','menus.name',)
            ->whereMonth('menu_order.created_at', date('m'))
            ->get();
        $total = $datas->sum('subtotal');
        return view('admin.laporan', compact('datas','total'));
    }
}
