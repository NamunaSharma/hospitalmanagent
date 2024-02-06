<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
{
    $departments = Department::all();
    return view('department.index')->with(compact('departments'));
}

public function create()
{
    return view('department.create');
}

public function store(Request $request)
{
    Department::create([
        "name" => $request->name
    ]);

    return redirect('/department');
}

public function destroy($id)
{
    Department::findOrFail($id)->delete();
    return redirect('/department');
}

public function edit($id)
{
    $department = Department::findOrFail($id);
    return view('department.edit')->with(compact('department'));
}

public function update(Request $request, $id)
{
    Department::findOrFail($id)->update([
        "name" => $request->name
    ]);

    return redirect('/department');
}

}
