@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Department</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="depName" class="form-label">Department Name</label>
            <input type="text" name="depName" class="form-control" id="depName" value="{{ old('depName', $department->depName) }}" required>
        </div>
        <div class="mb-3">
            <label for="numberOfTeachers" class="form-label">Number of Teachers</label>
            <input type="number" name="numberOfTeachers" class="form-control" id="numberOfTeachers" value="{{ old('numberOfTeachers', $department->numberOfTeachers) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Department</button>
    </form>
</div>
@endsection
