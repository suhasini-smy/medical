@include('include/header')

        <!-- Begin Page Content -->
        <div class="container-fluid">


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Records</h6>
                    <h6 class="m-0 font-weight-bold text-primary listbtn" ><a href="/dashboard">List Patient</a></h6>
                </div>

                <div class="loader" style="display:none">Please Wait ,LOADING...</div>
                <div id="msg" class="msg"></div>
                @include('flash-message')

                <div class="card-body">
                    <div class="table-responsive">

                    <form id="insert-patient"  action="{{ url('insert-patient-data') }}" method="POST">
                       {{ csrf_field() }}

                        <div class="form-group">
                            <label class="mandatory">Patient First Name*</label>
                            <input type="text" class="form-control form-control-brdr" id="patient_fname" name="patient_fname" placeholder="Enter patient first name">
                        </div>
                        <div class="form-group">
                            <label class="mandatory">Patient Last Name*</label>
                            <input type="text" class="form-control form-control-brdr" id="patient_lname"  name="patient_lname" placeholder="Enter patient last name">
                        </div>
                        <div class="form-group">
                            <label class="mandatory">Patient Dob*</label>
                            <input type="text" class="form-control form-control-brdr patient_dob" name="patient_dob" id="patient_dob" placeholder="Enter patient date of birth">
                            <input type="hidden" id="alternate" />

                        </div>
                        <div class="form-group">
                            <label class="mandatory">Patient Gender*</label>
                            <select class="form-select form-control form-control-brdr" name="patient_gender" id="patient_gender">
                            <option value="">Select gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="mandatory">Patient Category*</label>
                            <select class="form-select form-control form-control-brdr" name="category_id" id="category_id">
                            <option value="">Select category</option>
                                   @foreach($categories as $data)
                                      <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mandatory">Patient Phone Number*</label>
                            <input type="text" class="form-control form-control-brdr"  name="patient_number" id="patient_number" placeholder="Enter Phone Number">
                        </div>

                        <button type="submit" id="submitPatientDetails" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@include('include/footer')
