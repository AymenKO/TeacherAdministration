@extends('admin.dashboard')
<title>Departments</title>

@section('content')
<div class="container">
    <h1 class="my-4">Manage Departments</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.departments.create') }}" class="btn btn-primary mb-3">Create New Department</a>
    <table class="table">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Number of Teachers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->depName }}</td>
                    <td>{{ $department->numberOfTeachers }}</td>
                    <td>
                        <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
