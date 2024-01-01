<?php
//pelanggan
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\MenuOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function show($mejaID){
        return view('customer.pesan',['idMeja' => $mejaID]);
    }
    public function menu($mejaID){
        $menus = Menu::all();
        return view('customer.menu',compact('mejaID', 'menus'));
    }
    public function addMenuCart($mejaID, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);
        $cart[$id] = [
            "name" => $menu->name,
            "menuId" => $menu->id,
            "quantity" => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
            "price" => $menu->price_food,
            "image" => $menu->image_path,
            "discount" => 0,
            'subtotal'=>0,
            "total" => 0
        ];
        $cart[$id]['subtotal'] = ($cart[$id]['price'] - $cart[$id]['discount']) * $cart[$id]['quantity'];
        session(['cart' => $cart]);
        return redirect()->back();
    }
    public function cartdelete($mejaID, $id, Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session(['cart' => $cart]);
            }
        }

        return redirect()->back();
    }

    public function flush($mejaID){
        session()->forget('cart');
        return redirect()->back();
    }

    public function cartshow($mejaID){
        return view('customer.cart ',['idMeja' => $mejaID]);
    }

    public function checkOut(Request $request,$mejaID)
    {
        $cart = $request->session()->get('cart', []);
        $nameCus = $request->session()->get('nameCus');
        $totalPrice = 0;

        $Order = new Order();
        if (Order::all()->isEmpty())
        {
            $Order->id = 1;
        }
        else {
            $maxID = $Order->max('id');
            $Order->id = $maxID + 1;
        }

        $Order->id_customer = $request->session()->get('idCus');
        $Order->date = now();
        $Order->order_status = '1';

        $menuOrders = [];

    foreach ($cart as $item) {
        $menuOrder = new MenuOrder();
        $menuOrder->id_menu = $item['menuId'];
        $menuOrder->id_order = $Order->id; 
        $menuOrder->quantity = $item['quantity'];
        $menuOrder->price_food = $item['price'];
        $menuOrder->discount = $item['discount'];
        $menuOrder->subtotal = $item['subtotal'];
        $menuOrder->menu_note = 'None';

        $menuOrders[] = $menuOrder;
        $totalPrice += $item['subtotal'];
    }

    $Order->total_price = $totalPrice;
    $Order->table_number = $mejaID;
    $Order->save();

    foreach ($menuOrders as $menuOrder) {
        $menuOrder->save();
    }
    $data =Order::latest()->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id,
                'gross_amount' => $data->total_price,
            ),
            'customer_details' => array(
                'name' => $nameCus,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $request->session()->forget('cart');
        return view('customer\checkout',compact('snapToken','data'));
    }

    public function setupSession(Request $request)
    {
        $data = $request->validate([
            'namaCus' => 'required|string|min:3|max:15|regex:/^[a-zA-Z]+$/',
        ], [
            'namaCus.required' => 'Tolong masukan nama anda!',
            'namaCus.string' => 'Nama harus berupa string.',
            'namaCus.min' => 'Nama harus memiliki setidaknya 3 karakter.',
            'namaCus.max' => 'Nama tidak boleh melebihi 15 karakter.',
            'namaCus.regex' => 'Nama hanya boleh berisi huruf tanpa karakter khusus.'
        ]);
        $request->session()->put('nameCus',$data['namaCus']);
        $request->session()->put('idMeja',$request->input('id'));

        // Assign customer data
        $Customer = new Customer();
        $Customer->name = $data['namaCus'];

        $Customer->save();

        $request->session()->put('idCus',$Customer->id);

        return redirect()->route('pesan.menu', $request->input('id'));
    }
}
