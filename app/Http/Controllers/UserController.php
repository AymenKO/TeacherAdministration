<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class UserController extends Controller
{

    public function index()
{
    $users = User::where('is_admin', 0)->with('department')->get();
    return view('admin.users.index', compact('users'));
}


    public function create() {
        $departments = Department::all(); // Fetch all departments
        return view('admin.users.create', compact('departments')); // Pass departments to the view

    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'required|exists:departments,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0, // Setting is_admin to 0 for teachers
            'department_id' => $request->department_id, // Correctly assign the department_id
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
{
    $departments = Department::all();
    return view('admin.users.edit', compact('user', 'departments'));
}

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'department_id' => 'required|exists:departments,id',
        ]);

        $user->update($request->only('name', 'email','department_id'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}