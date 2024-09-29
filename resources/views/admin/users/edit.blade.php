@extends('admin.dashboard')
<title>Users</title>

@section('content')
<div class="container">
    <h1 class="my-4">Edit User</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->depName }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
