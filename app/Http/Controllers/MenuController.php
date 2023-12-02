<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    public function show(){
        $menus = Menu::all();

        return view('admin.menu', compact('menus'));
    }
    /**
     * Edit user data
     *
     * @param Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.editmenu', [
            'menu' => $menu
        ]);
    }
    /**
     * Delete user data
     *
     * @param Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $menu->delete();

        return response()->json(array('success' => 'Menu deleted successfully.'),200);
        // return redirect()->route('menu.show')
        //     ->withSuccess(__('menu deleted successfully.'));
    }
    public function create()
    {
        return view('admin.tambahmenu');
    }
    public function store(Request $request)
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

        $menu->id_admin = Auth::user()->id; // Nanti ambil id nya dari auth session,sementara 1 dulu
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

        return redirect()->route('menu.create');

    }
    /**
     * Update user data
     *
     * @param Menu $menu
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, UpdateMenuRequest $request)
    {
        $menu->update($request->validated());

        return redirect()->route('menu.show')
            ->withSuccess(__('menu updated successfully.'));
    }
}
