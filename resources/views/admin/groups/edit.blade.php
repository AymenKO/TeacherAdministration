@extends('admin.dashboard')
<title>Groups</title>

@section('content')
<div class="container">
    <h1 class="my-4">Edit Group</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="groupName" class="form-label">Group Name</label>
            <input type="text" name="groupName" class="form-control" id="groupName" value="{{ old('groupName', $group->groupName) }}" required>
        </div>
        <div class="mb-3">
            <label for="numberOfStudents" class="form-label">Number of Students</label>
            <input type="number" name="numberOfStudents" class="form-control" id="numberOfStudents" value="{{ old('numberOfStudents', $group->numberOfStudents) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Group</button>
    </form>
</div>
@endsection
