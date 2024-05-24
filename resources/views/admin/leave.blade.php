@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Leave Management</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Leave Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Leave Requests</a></li>
    </ol>
</div>
@endsection

@section('button')
<button class="btn btn-primary" onclick="toggleLeaveForm()">New Leave Request</button>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body"> 
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
            <form id="leaveForm" action="{{ route('admin.leave.store') }}" method="POST" style="display: none;">
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function toggleLeaveForm() {
        var form = document.getElementById("leaveForm");
        form.style.display === "none" ? form.style.display = "block" : form.style.display = "none";
    }
</script>
@endsection
