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
        // Additional leave statistics
        $totalLeaves = Leave::count();
        $acceptedLeaves = Leave::where('leaveStatus', 'Accepted')->count();
        $rejectedLeaves = Leave::where('leaveStatus', 'Rejected')->count();

        // Monthly overview
        $leavesByMonth = Leave::selectRaw('MONTHNAME(created_at) as month,
                                        SUM(leaveStatus = "On Hold") as pending,
                                        SUM(leaveStatus = "Accepted") as accepted,
                                        SUM(leaveStatus = "Rejected") as rejected')
                            ->groupBy('month')
                            ->orderByRaw('MIN(created_at)')
                            ->get();

        return view('admin.dashboard', compact('totalTeachers', 'totalDepartments', 'totalGroups', 'pendingLeaves', 'totalLeaves', 'acceptedLeaves', 'rejectedLeaves', 'leavesByMonth'));
    }
}