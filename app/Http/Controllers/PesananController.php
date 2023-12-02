<?php
//admin
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuOrder;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function show(){
        $orders =DB::table('orders')
            ->join('customers', 'orders.id_customer', '=', 'customers.id')
            ->select('orders.table_number','orders.id','orders.order_status','orders.payment_status','orders.total_price', 'customers.name')
            ->where('order_status','active')
            ->get();
        return view('admin.pesanmasuk', compact('orders'));
    }
    public function detailshow($id){
        $detail = DB::table('menu_order')
            ->join('menus', 'menu_order.id_menu', '=', 'menus.id')
            ->select('menu_order.quantity','menu_order.price_food','menu_order.discount','menu_order.subtotal','menu_order.menu_note','menus.name',)
            ->where('id_order',$id)
            ->get();
        return view('admin.detailpesanan', compact('detail'));
    }
    public function selesaishow(){
        return view('admin.pesanselesai');
    }
}
