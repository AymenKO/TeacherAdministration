<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('teacher.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('teacher.grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'DS' => 'required|numeric',
            'TP' => 'required|numeric',
            'Exam' => 'required|numeric',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
        ]);

        Grade::create($request->all());
        return redirect()->route('teacher.grades.index')->with('success', 'Grade created successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('teacher.grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'DS' => 'required|numeric',
            'TP' => 'required|numeric',
            'Exam' => 'required|numeric',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $grade->update($request->all());
        return redirect()->route('teacher.grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('teacher.grades.index')->with('success', 'Grade deleted successfully.');
    }
}
