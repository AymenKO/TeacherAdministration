<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'depName' => 'required|string|max:30',
        'numberOfTeachers' => 'required|integer|min:1',
    ]);

    Department::create($request->all());

    return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
{
    $request->validate([
        'depName' => 'required|string|max:30',
        'numberOfTeachers' => 'required|integer|min:1',
    ]);

    $department->update($request->all());

    return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
{
    $department->delete();

    return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
}

}
