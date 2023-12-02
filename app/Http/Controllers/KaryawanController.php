<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function show(){
        $karyawan =DB::table('admins')
            ->select('admins.*')
            ->where('job','karyawan')
            ->get();
        return view('admin.karyawan', compact('karyawan'));
    }
}
