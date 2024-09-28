@extends('admin.dashboard')
<title>Groups</title>

@section('content')
<div class="container">
    
<h1 class="my-4">Manage Groups</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.groups.create') }}" class="btn btn-primary mb-3">Create New Group</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Group Name</th>
                <th>Number of Students</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->groupName }}</td>
                    <td>{{ $group->numberOfStudents }}</td>
                    <td>
                        <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display:inline;">
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
