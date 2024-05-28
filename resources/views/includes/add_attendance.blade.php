<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
			<!-- Log on to codeastro.com for more projects! -->
        
            <div class="modal-header">
            <h5 class="modal-title"><b>Add New Employee</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>

            
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Fullname</label>
                            <input type="text" class="form-control" id="name" name="name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="department" name="department" required>
                                <option value="" disabled selected>Select your department</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="accounting">Accounting</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" class="form-control" placeholder="+63" id="phone_number" name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>