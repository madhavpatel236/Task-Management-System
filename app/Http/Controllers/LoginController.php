<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('Pages.Login');
    }

    public function authentication(Request $request)
    {
        $email = $request->only('email')['email'];
        $password = $request->only('password')['password'];
        $user = LoginModel::where('Email', $email)->get();

        $dbEmail = $user[0]['Email'];
        $dbPassword = $user[0]['Password'];
        $dbRole = $user[0]['Role'];
        if ($email == $dbEmail && $password == $dbPassword) {
            if ($dbRole == 'admin') {
                return redirect()->route('admin.index');
            } else if ($dbRole == 'manager') {
                // return redirect()->route();
            } else if ($dbRole == 'employee') {
                // return redirect()->route();
            }
        } else {
            return redirect()->route('loginView');
        }

        // Hash::check();

    }
}
