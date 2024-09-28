@extends('teacher.dashboard')
<title>Grades</title>
@section('content')
<div class="container">
    <h1 class="my-4">Create Grade</h1>
    <form action="{{ route('teacher.grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="DS" class="form-label">DS</label>
            <input type="number" name="DS" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="TP" class="form-label">TP</label>
            <input type="number" name="TP" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Exam" class="form-label">Exam</label>
            <input type="number" name="Exam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Course ID</label>
            <input type="number" name="course_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="number" name="student_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Grade</button>
    </form>
</div>
@endsection
