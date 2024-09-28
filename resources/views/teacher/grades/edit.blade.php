@extends('teacher.dashboard')
<title>Grades</title>
@section('content')
<div class="container">
    <h1 class="my-4">Edit Grade</h1>
    <form action="{{ route('teacher.grades.update', $grade) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="DS" class="form-label">DS</label>
            <input type="number" name="DS" class="form-control" value="{{ $grade->DS }}" required>
        </div>
        <div class="mb-3">
            <label for="TP" class="form-label">TP</label>
            <input type="number" name="TP" class="form-control" value="{{ $grade->TP }}" required>
        </div>
        <div class="mb-3">
            <label for="Exam" class="form-label">Exam</label>
            <input type="number" name="Exam" class="form-control" value="{{ $grade->Exam }}" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Course ID</label>
            <input type="number" name="course_id" class="form-control" value="{{ $grade->course_id }}" required>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="number" name="student_id" class="form-control" value="{{ $grade->student_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Grade</button>
    </form>
</div>
@endsection
