<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;


    class LeaveController extends Controller
    {
        // Teacher applies for a leave
        public function create() {
            return view('teacher.leaves.create');
        }

        public function store(Request $request) {
            $request->validate([
                'leaveDate' => 'required|date',
                'leaveReason' => 'required|string',
            ]);

            Leave::create([
                'leaveDate' => $request->leaveDate,
                'leaveReason' => $request->leaveReason,
                'teacher_id' => auth()->user()->id,
            ]);

            return redirect()->route('teacher.leaves.index')->with('success', 'Leave applied successfully.');
        }

        // Teacher views their leaves
        public function index() {
            $leaves = Leave::where('teacher_id', auth()->user()->id)->get();
            return view('teacher.leaves.index', compact('leaves'));
        }

        // Admin views all leave applications
        public function adminIndex() {
            $leaves = Leave::where('leaveStatus', 'On Hold')->get();
            return view('admin.leaves.index', compact('leaves'));
        }

        // Admin accepts leave
        public function accept($id) {
            $leave = Leave::findOrFail($id);
            $leave->update(['leaveStatus' => 'Accepted']);
            return redirect()->route('admin.leaves.index')->with('success', 'Leave accepted.');
        }

        // Admin rejects leave
        public function reject($id) {
            $leave = Leave::findOrFail($id);
            $leave->update(['leaveStatus' => 'Rejected']);
            return redirect()->route('admin.leaves.index')->with('success', 'Leave rejected.');
        }



        //Admin history
        public function adminHistory() {
            $leaves = Leave::with('teacher')->get(); // Fetch leave with teacher details
            return view('admin.leaves.history', compact('leaves'));
        }

    }

