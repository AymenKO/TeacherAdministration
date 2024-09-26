<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{

public function index() {
    $users = User::where('is_admin', 0)->get(); // Fetch only teachers
    return view('admin.users.index', compact('users'));
}

public function create() {
    return view('admin.users.create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'password.min' => 'The password must be at least 8 characters long.',
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}

public function edit(User $user) {
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, User $user) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($request->only('name', 'email'));

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}

public function destroy(User $user) {
    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}

}
