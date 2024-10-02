@extends('teacher.dashboard')
<title>View Leaves</title>

@section('content')
<div class="container">
    <h1 class="my-4">Your Leave Requests</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Leave Date</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->leaveDate }}</td>
                <td>{{ $leave->leaveReason }}</td>
                <td>{{ $leave->leaveStatus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
