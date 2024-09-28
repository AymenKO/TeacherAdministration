@extends('teacher.dashboard')
<title>Courses</title>

@section('content')
<div class="container">
    <h1 class="my-4">Courses</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('teacher.courses.create') }}" class="btn btn-primary mb-3">Create Course</a>
    <table class="table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Credit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->courseName }}</td>
                    <td>{{ $course->courseDescription }}</td>
                    <td>{{ $course->Credit }}</td>
                    <td>
                        <a href="{{ route('teacher.courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teacher.courses.destroy', $course) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
