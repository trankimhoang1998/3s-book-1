<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('user.pages.auth.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required'],
        //     'password' => ['required'],
        // ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect('/')->with('message','Đăng nhập thành công!');
        }

        return back()->with('error', 'Đăng nhập thất bại');
    }
}
