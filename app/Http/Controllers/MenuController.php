<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function show(){
        $menus = Menu::where('status', 1)->get();
        $men = Menu::where('status', 0)->get();

        return view('admin.menu', compact('menus','men'));
    }
    public function edit($menuId)
    {
        $data = Menu::findOrFail($menuId);
        return view('admin.editmenu', compact('data'));
    }
    public function destroy($menuId)
    {
        DB::table('menus')
            ->where('id', $menuId)
            ->update(['status' => '0']);
        return redirect()->route('menu.show');
    }
    public function restore($menuId)
    {
        DB::table('menus')
            ->where('id', $menuId)
            ->update(['status' => '1']);
        return redirect()->route('menu.show');
    }
    public function create()
    {
        return view('admin.tambahmenu');
    }
    public function store(Request $request)
    {
        $request->validate([
            'foodName' => 'required|string|min:1|max:255',
            'foodDesc' => 'required|string|min:1|max:255',
            'foodImg' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foodStock' => 'required|integer|min:0',
            'foodPrice' => 'required|numeric|min:0',
            'jenis' => 'required|string',
            'foodDisc' => 'required|numeric|min:0',
        ]);

        $menu = new Menu();

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

        $menu->id_admin = Auth::user()->id;
        $menu->name = $request->foodName;
        $menu->desc = $request->foodDesc;
        $menu->image_path = $path;
        $menu->number_sale = 0;
        $menu->status=1;
        $menu->favorite = 0;
        $menu->number_available = $request->foodStock;
        $menu->food_type = $request->jenis;
        $menu->price_food = $request->foodPrice;
        $menu->discount = $request->foodDisc;
        $menu->save();

        return redirect()->route('menu.create');

    }
    public function update( Request $request)
    {
        $data=$request->validate([
            'foodName' => 'required|string|min:1|max:255',
            'foodDesc' => 'required|string|min:1|max:255',
            'foodStock' => 'required|integer|min:0',
            'foodPrice' => 'required|numeric|min:0',
            'jenis' => 'required|string',
            'foodDisc' => 'required|numeric|min:0',
        ]);

        $menu = Menu::findOrFail($request->route()->parameter('menu'));
        $menu->name = $data['foodName'];
        $menu->desc = $data['foodDesc'];
        $menu->number_available = $data['foodStock'];
        $menu->price_food = $data['foodPrice'];
        $menu->food_type = $data['jenis'];
        $menu->discount = $data['foodDisc'];
        $menu->save();
        return redirect()->route('menu.show');
    }
}
