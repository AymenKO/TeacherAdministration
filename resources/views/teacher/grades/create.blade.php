@extends('teacher.dashboard')
<title>Grades</title>
@section('content')
<div class="container">
    <h1 class="my-4">Create Grade</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('teacher.grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="DS" class="form-label">DS</label>
            <input type="number" name="DS" step="0.01" min="0" max="20" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="TP" class="form-label">TP</label>
            <input type="number" name="TP" step="0.01" min="0" max="20" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Exam" class="form-label">Exam</label>
            <input type="number" name="Exam"step="0.01" min="0" max="20"  class="form-control" required>
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
