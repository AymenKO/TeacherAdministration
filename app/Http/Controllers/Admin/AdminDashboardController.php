<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Group;
use App\Models\Leave;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $totalTeachers = User::where('is_admin', false)->count();
        $totalDepartments = Department::count();
        $totalGroups = Group::count();
        $pendingLeaves = Leave::where('leaveStatus', 'On Hold')->count();

        return view('admin.dashboard', compact('totalTeachers', 'totalDepartments', 'totalGroups', 'pendingLeaves'));
    }
}
