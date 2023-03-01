<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('user.pages.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation',
        ]);

        //validator

        $validator = Validator::make($data, [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['role'] = 2;

        if ($validator->fails()) {
            return redirect('/register')->with('error', 'Đăng ký không thành công');
        }

        $result = ['status' => 200];

        try {
            $result['data'] = User::create($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return redirect('/')->with('message','Đăng ký tài khoản thành công!');
    }
}
