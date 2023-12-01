<?php

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
        // Calculate subtotal and total for the item
        $cart[$id]['subtotal'] = ($cart[$id]['price'] - $cart[$id]['discount']) * $cart[$id]['quantity'];
        // Update the cart in the session
        session(['cart' => $cart]);

        // Calculate total by summing up all subtotals in the cart
        $total = array_sum(array_column($cart, 'subtotal'));

        // Update total for each item in the cart
        foreach ($cart as &$item) {
            $item['total'] = $total;
        }

        // Update the cart in the session with the recalculated totals
        session(['cart' => $cart]);
        return redirect()->back();
    }
    public function cartdelete($mejaID, $id, Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                // Remove the item with the specified ID from the cart
                unset($cart[$request->id]);

                // Update the session cart with the modified array
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
        
        // Create new order
        $Order = new Order();

        // Override auto increment order
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
        $Order->order_status = 'unpaid';


        // Make a array of MenuOrder eloquent object
        
        $menuOrders = [];

    foreach ($cart as $item) {
        $menuOrder = new MenuOrder();
        $menuOrder->id_menu = $item['menuId'];
        $menuOrder->id_order = $Order->id; // Assuming you have the order ID
        $menuOrder->quantity = $item['quantity'];
        $menuOrder->price_food = $item['price'];
        $menuOrder->discount = $item['discount'];
        $menuOrder->subtotal = $item['subtotal'];
        $menuOrder->menu_note = 'None';

        $menuOrders[] = $menuOrder;
        $totalPrice += $item['subtotal'];
    }


    // Clear the cart after successfully checking out
    $request->session()->forget('cart');

    // Save order
    $Order->total_price = $totalPrice;
    $Order->table_number = $mejaID;
    $Order->save();

    // Save each MenuOrder
    foreach ($menuOrders as $menuOrder) {
        $menuOrder->save();
    }
    
    dd($Order); // <- Dump data sementara, hapus jika tidak perlu lagi
    // Redirect disini
    }

    public function setupSession(Request $request)
    {
        $request->session()->put('nameCus',$request->input('namaCus'));
        $request->session()->put('idMeja',$request->input('id'));
        
        // Assign customer data 
        $Customer = new Customer();
        $Customer->name = $request->input('namaCus');
        
        $Customer->save();
        
        $request->session()->put('idCus',$Customer->id);
        
        return redirect()->route('pesan.menu', $request->input('id'));
    }
}
