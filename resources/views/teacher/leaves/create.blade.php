@extends('teacher.dashboard')
<title>Apply for a Leave</title>

@section('content')
<div class="container">
    <h1 class="my-4">Apply for a Leave</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.leaves.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="leaveDate" class="form-label">Leave Date</label>
            <input type="date" name="leaveDate" class="form-control" id="leaveDate" required>
        </div>

        <div class="mb-3">
            <label for="leaveReason" class="form-label">Reason</label>
            <textarea name="leaveReason" class="form-control" id="leaveReason" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Leave Request</button>
    </form>
</div>
@endsection
