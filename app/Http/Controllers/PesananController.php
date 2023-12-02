<?php
//admin
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuOrder;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function show(){
        $orders = Order::all();
        $menuorder =MenuOrder::all();
        return view('admin.pesanmasuk', compact('orders','menuorder'));
    }
    public function selesaishow(){
        return view('admin.pesanselesai');
    }
}
