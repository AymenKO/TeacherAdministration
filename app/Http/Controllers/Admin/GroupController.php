<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;


class GroupController extends Controller
{
   
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

   
    public function create()
    {
        return view('admin.groups.create');
    }

   
    public function store(Request $request)
{
    $request->validate([
        'groupName' => 'required|string|max:30',
        'numberOfStudents' => 'required|integer|min:1',
    ]);

    Group::create([
        'groupName' => $request->groupName,
        'numberOfStudents' => $request->numberOfStudents,
    ]);

    return redirect()->route('admin.groups.index')->with('success', 'Group created successfully.');
}



   
    public function show(string $id)
    {
    }

  
    public function edit($id)
{
    $group = Group::findOrFail($id);
    return view('admin.groups.edit', compact('group'));
}


   
    public function update(Request $request, Group $group)
{
    $request->validate([
        'groupName' => 'required|string|max:30',
        'numberOfStudents' => 'required|integer|min:1',
    ]);

    $group->update($request->all());

    return redirect()->route('admin.groups.index')->with('success', 'Group updated successfully.');
}


    public function destroy(Group $group)
{
    $group->delete();

    return redirect()->route('admin.groups.index')->with('success', 'Group deleted successfully.');
}

}