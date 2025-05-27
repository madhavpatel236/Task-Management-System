<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $dbId = $user[0]['id'];
        $dbEmail = $user[0]['Email'];
        $dbPassword = $user[0]['Password'];
        $dbRole = $user[0]['Role'];
        $isPasswordCorrect = Hash::check($password, $dbPassword);
        if ($email == $dbEmail && $isPasswordCorrect) {
            if ($dbRole == 'admin') {
                return redirect()->route('admin.index');
            } else if ($dbRole == 'manager') {
                // return redirect()->route('manager.show', ['manager' => $dbId]);
                return redirect()->route("managerHome", $dbId);
            } else if ($dbRole == 'employee') {
                // return redirect()->route();
            }
        } else {
            return redirect()->route('loginView');
        }
    }
}
