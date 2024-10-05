@extends('admin.dashboard')
<title>Leave History</title>

@section('content')
<div class="container">
    <h1 class="my-4">All Leave Requests</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Leave Date</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->teacher->name }}</td>
                    <td>{{ $leave->leaveDate }}</td>
                    <td>{{ $leave->leaveReason }}</td>
                    <td><span class="badge
                        @if($leave->leaveStatus == 'Accepted') bg-success
                        @elseif($leave->leaveStatus == 'Rejected') bg-danger
                        @else bg-warning text-dark
                        @endif">
                        {{ $leave->leaveStatus }}
                    </span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
