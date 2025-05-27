<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = AdminModel::all();
        // dd($users[0]['Name']);
        return view('AdminHome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->only('email')['email']);
        $name = $request->only('name')['name'];
        $email = $request->only('email')['email'];
        $password = $request->only('password')['password'];
        $role = $request->only('role')['role'];
        // dd($email);
        $hashedPassword = Hash::make($password, [
            'round' => 12
        ]);

        $adminModel = new AdminModel();
        $adminModel->fill([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role,
        ]);
        $adminModel->save();
        // dd('insert');
        return redirect()->route('admin.index');
        // $user = AdminModel::Create($request->only(['name', 'email', 'role', 'password' => $hashedPassword]));
    }

    public function edit(string $id)
    {
        $user = AdminModel::findOrFail($id);
        // return $user;
        return view('Page.EditUser', compact('user'));
    }

    public function update(Request $request, string $id)
    {

        // $name = $request->only('name')['name'];
        // $email = $request->only('email')['email'];
        // $role = $request->only('role')['role'];
        // dd($email);
        $user = AdminModel::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.index');
    }

    public function destroy(string $id)
    {
        // $user = UserModel::findOrFail($id);
        // $user->delete();
        // return redirect('/user');
        // dd('sdv');
        $user = AdminModel::findOrFail($id);
        $user->delete();
        // return view('AdminHome');
        return redirect()->route('admin.index');
    }
}
