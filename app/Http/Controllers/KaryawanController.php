<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function show(){
        $karyawan = Admin::where('job','karyawan')->get();
        return view('admin.karyawan', compact('karyawan'));
    }

    public function UpdateKaryawan(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'passwordConfirm' => 'same:password'
        ]);

        $Karyawan = Admin::findOrFail($request->route()->parameter('id'));
        $Karyawan->name = $data['name'];
        $Karyawan->phone_number = $data['phone'];
        $Karyawan->address = $data['address'];
        $Karyawan->email = $data['email'];
        // $Karyawan->job = $request->input('job');
        if ($request->input('password') != '')
            $Karyawan->password = $data['passwordConfirm'];
        $Karyawan->save();

        return redirect()->route('karyawan.show');
    }

    public function EditKaryawan(Request $request)
    {
        $Karyawan = Admin::findOrFail($request->route()->parameter('id'));
        return view('admin.editkaryawan',['Karyawan' => $Karyawan]);
    }

    public function delKaryawan(Request $request, $id)
    {
        $karyawan = Admin::findOrFail($id);
        $karyawan->delete();

        return response()->json(array('success' => 'Karyawan deleted successfully.'),200);
    }
}
