<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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

    public function setupSession(Request $request)
    {
        $request->session()->put('nameCus',$request->input('namaCus'));
        $request->session()->put('idMeja',$request->input('id'));
        return redirect()->route('pesan.menu', $request->input('id'));
    }
}
