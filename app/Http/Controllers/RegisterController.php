<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['name'] = $data['username'];
        $data['phone_number'] = '';
        $data['image_path'] = '';
        $data['address'] = '';
        $data['job'] = 'karyawan';
        $user = Admin::create($data);

        // auth('admins')->login($user);
        Auth::guard()->login($user);

        return redirect('/admin')->with('success', "Account successfully registered.");
    }
}
