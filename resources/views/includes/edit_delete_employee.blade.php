<!-- Edit -->
<div class="modal fade" id="edit{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>Edit Employee Details</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                            <label for="name">Fullname</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($employee) ? $employee->name : '' }}"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="department" name="department" required>
                                <option value="" disabled selected>Select your department</option>
                                <option value="admin" {{ old('department', $employee->department) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="teacher" {{ old('department', $employee->department) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                <option value="accounting" {{ old('department', $employee->department) == 'accounting' ? 'selected' : '' }}>Accounting</option>
                                <option value="staff" {{ old('department', $employee->department) == 'staff' ? 'selected' : '' }}>Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ isset($employee) ? $employee->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" class="form-control" placeholder="+63" id="phone_number" name="phone_number" value="{{ isset($employee) ? $employee->phone_number : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('other', $employee->other) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ isset($employee) ? $employee->address : '' }}">
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
              <h4 class="modal-title "><span class="employee_id">Delete Employee</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                    @csrf
                    @method('DELETE')
                    
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$employee->name}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
