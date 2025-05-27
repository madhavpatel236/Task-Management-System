<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ManagerModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function store(Request $request)
    {
        dd($request->all());
        ManagerModel::create($request->all());
        // return redirect()->route('admin.show');
    }

    public function getUser($id)
    {
        // dd($id);
        $employees = AdminModel::where('Role', 'employee')->get();
        $currentUser = AdminModel::findOrFail($id);
        $name = $currentUser['Name'];
        $tasks = ManagerModel::where('manager_name', $name)->get();
        // dd($employees);
        return view('Pages.managerHome', compact('employees', 'tasks'));
    }

    public function show(string $id) {}

    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
