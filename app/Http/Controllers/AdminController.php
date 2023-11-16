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

    public function tambahMenuForm()
    {
        return view('admin.tambahmenu');
    }

    public function tambahMenu(Request $request)
    {
        $request->validate([
            'foodName' => 'required|string|max:255',
            'foodDesc' => 'required|string|max:255',
            'foodImg' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foodStock' => 'required|integer',
            'foodPrice' => 'required|numeric',
            'jenis' => 'required|string',
            'foodDisc' => 'required|numeric',
        ]);

        $menu = new Menu();

        // Meng-override auto-increment dari database jadi disini dulu.
        if (Menu::all()->isEmpty())
        {
            $menu->id = 1;
        }
        else {
            $maxID = $menu->max('id');
            $menu->id = $maxID + 1;
        }

        $imageName = 'Menu'.'.'.$request->foodImg->extension();  
        $menuId = $menu->id;
        $path = $request->foodImg->store('img/menu/'.$menuId, 'public');
    
        $menu->id_admin = 1; // Nanti ambil id nya dari auth session,sementara 1 dulu
        $menu->name = $request->foodName;
        $menu->desc = $request->foodDesc;
        $menu->image_path = $path;
        $menu->number_sale = 0;
        $menu->favorite = 0;
        $menu->number_available = $request->foodStock;
        $menu->food_type = $request->jenis;
        $menu->price_food = $request->foodPrice;
        $menu->discount = $request->foodDisc;
        $menu->save();

        return redirect()->route('admin.tambahMenuForm');
    
    }
}
