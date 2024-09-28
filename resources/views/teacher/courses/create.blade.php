@extends('teacher.dashboard')
<title>Create Course</title>
@section('content')
<div class="container">
    <h1 class="my-4">Create Course</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('teacher.courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="courseName" class="form-label">Course Name</label>
            <input type="text" name="courseName" class="form-control" id="courseName" required>
        </div>
        <div class="mb-3">
            <label for="courseDescription" class="form-label">Course Description</label>
            <input type="text" name="courseDescription" class="form-control" id="courseDescription" required>
        </div>
        <div class="mb-3">
            <label for="Credit" class="form-label">Credit</label>
            <input type="number" name="Credit" class="form-control" id="Credit" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
</div>
@endsection
