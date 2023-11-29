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
    public function addMenuCart($mejaID,$id){
        $menu =Menu::findorfail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price_food,
                "image" => $menu->image_path
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'menambahkan ke keranjang');
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
