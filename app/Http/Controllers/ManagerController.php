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
    public function index()
    {
        $employees = AdminModel::where('Role', 'employee')->get();
        $tasks = ManagerModel::all();
        return view('Pages.managerHome', compact('employees', 'tasks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
