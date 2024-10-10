<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Group;
use App\Models\Grade;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard');
    }

    public function dashboard()
{
    $totalCourses = Course::count();
    $totalStudents = Group::sum('numberOfStudents'); // Sum of students in all groups
    $averageGrades = Grade::avg(DB::raw('(DS + TP + EXAM) / 3'));
    $averageGrades = $averageGrades ? round($averageGrades, 2) : 0;


    $grades = Grade::select('student_id',
    DB::raw('AVG(DS) as avg_ds'),
    DB::raw('AVG(TP) as avg_tp'),
    DB::raw('AVG(EXAM) as avg_exam'))
    ->groupBy('student_id')
    ->get();
    return view('teacher.dashboard', compact('totalCourses', 'totalStudents', 'averageGrades','grades'));
}



}
