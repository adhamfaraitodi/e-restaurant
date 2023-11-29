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
                "image" => $menu->image_path,
                "discount" => 0,
                "total" => 0
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function cartdelete($mejaID,$id,Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash();
        }
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
