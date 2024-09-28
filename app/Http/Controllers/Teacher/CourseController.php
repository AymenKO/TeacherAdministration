<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = Course::all();
        return view('teacher.courses.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('teacher.courses.create');
    }

    // Store a newly created course in storage
    public function store(Request $request)
    {
        $request->validate([
            'courseName' => 'required|string|max:30',
            'courseDescription' => 'required|string|max:100',
            'Credit' => 'required|integer',
        ]);

        Course::create($request->all());
        return redirect()->route('teacher.courses.index')->with('success', 'Course created successfully.');
    }

    // Show the form for editing the specified course
    public function edit(Course $course)
    {
        return view('teacher.courses.edit', compact('course'));
    }

    // Update the specified course in storage
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'courseName' => 'required|string|max:30',
            'courseDescription' => 'required|string|max:100',
            'Credit' => 'required|integer',
        ]);

        $course->update($request->all());
        return redirect()->route('teacher.courses.index')->with('success', 'Course updated successfully.');
    }

    // Remove the specified course from storage
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('teacher.courses.index')->with('success', 'Course deleted successfully.');
    }
}

