@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Leave Management</h1>

    <!-- Display Success or Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Leave Request Form -->
    <form action="{{ route('admin.leave.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID:</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" id="leave_type" class="form-control" required>
                <option value="sick">Sick Leave</option>
                <option value="vacation">Vacation Leave</option>
                <option value="emergency">Emergency Leave</option>
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- List of Leave Requests -->
   <!--  <h2>Leave Requests</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $leave)
                <tr>
                    <td>{{ $leave->employee_id }}</td>
                    <td>{{ ucfirst($leave->leave_type) }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>{{ ucfirst($leave->status) }}</td>
                    <td>
                        <a href="{{ route('admin.leave.edit', $leave->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.leave.destroy', $leave->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody> -->
    </table>
</div>
@endsection
