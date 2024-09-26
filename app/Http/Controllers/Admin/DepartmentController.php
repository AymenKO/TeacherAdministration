<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
   
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

   
    public function create()
    {
        return view('admin.departments.create');
    }

   
    public function store(Request $request)
{
    $request->validate([
        'depName' => 'required|string|max:30',
        'numberOfTeachers' => 'required|integer|min:1',
    ]);

    Department::create($request->all());

    return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
}


   
    public function show(string $id)
    {
    }

  
    public function edit($id)
{
    $department = Department::findOrFail($id);
    return view('admin.departments.edit', compact('department'));
}


   
    public function update(Request $request, Department $department)
{
    $request->validate([
        'depName' => 'required|string|max:30',
        'numberOfTeachers' => 'required|integer|min:1',
    ]);

    $department->update($request->all());

    return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
}


    public function destroy(Department $department)
{
    $department->delete();

    return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
}

}
