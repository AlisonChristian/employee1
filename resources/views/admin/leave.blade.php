@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Leave Management</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Leave</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Leave Requests</a></li>
    </ol>
</div>
@endsection

@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Leave Request</a>
@endsection

@section('content')
@include('includes.flash')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Log on to codeastro.com for more projects! -->
                <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th data-priority="1">Employee ID</th>
                            <th data-priority="2">Leave Type</th>
                            <th data-priority="3">Start Date</th>
                            <th data-priority="4">End Date</th>
                            <th data-priority="5">Reason</th>
                            <th data-priority="6">Status</th>
                            <th data-priority="7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $leave->employee_id }}</td>
                            <td>{{ ucfirst($leave->leave_type) }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>{{ ucfirst($leave->status) }}</td>
                            <td>
                                <a href="#edit{{ $leave->id }}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                <a href="#delete{{ $leave->id }}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Leave Request Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <option value="maternity">Maternity Leave</option> <!-- Fixed the value for maternity leave -->
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
</div>

<!-- Edit and Delete Leave Request Modals -->
@foreach($leaves as $leave)
    <div class="modal fade" id="edit{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel{{ $leave->id }}" aria-hidden="true">
        <!-- Edit Leave Request Modal -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Edit Leave Request Content -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel{{ $leave->id }}" aria-hidden="true">
        <!-- Delete Leave Request Modal -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Delete Leave Request Content -->
            </div>
        </div>
    </div>
@endforeach

@endsection

@section('script')
<!-- Responsive-table -->
@endsection
