@extends('admin.dashboard')
<title>Leave Requests</title>

@section('content')
<div class="container">
    <h1 class="my-4">Pending Leave Requests</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Leave Date</th>
                <th>Leave Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->teacher->name }}</td>
                    <td>{{ $leave->leaveDate }}</td>
                    <td>{{ $leave->leaveReason }}</td>
                    <td>
                        <form action="{{ route('admin.leaves.accept', $leave->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('admin.leaves.reject', $leave->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
