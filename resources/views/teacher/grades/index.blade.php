@extends('teacher.dashboard')
<title>Grades</title>
@section('content')
<div class="container">
    <h1 class="my-4">Manage Grades</h1>
    <a href="{{ route('teacher.grades.create') }}" class="btn btn-primary">Add Grade</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>DS</th>
                <th>TP</th>
                <th>Exam</th>
                <th>Course ID</th>
                <th>Student ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->DS }}</td>
                <td>{{ $grade->TP }}</td>
                <td>{{ $grade->Exam }}</td>
                <td>{{ $grade->course_id }}</td>
                <td>{{ $grade->student_id }}</td>
                <td>
                    <a href="{{ route('teacher.grades.edit', $grade) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('teacher.grades.destroy', $grade) }}" method="POST" style="display:inline;">
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
