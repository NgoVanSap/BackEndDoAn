<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function loginForm()
    {
        return view('Admin.Login.adminLogin');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required'    => 'Email không được để trống',
            'email.email'    => 'Phải đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
        ]);


        if(Auth::attempt($credentials)){

            return redirect('dashboard');

        }
        return redirect()->back()->withErrors([
            'errors' => 'Email & mật khẩu sai!',
        ]);
    }

    public function logout() {

        Auth::logout();
        return redirect('login');

    }
}
