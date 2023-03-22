 @auth
@include('include/header')

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="loader" style="display:none">Please Wait ,LOADING...</div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Patient</h1>
                <a href="#" onclick="exportexcel()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <div class="row">

            <!-- No. of Patient Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                   Total No. of Patient</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['total_patient'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No of Patient Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Active Patient</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['activedata'][0]->records }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No of Patient Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    In Active Patient</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['inactivedata'][0]->records }}</div>
                            </div>
                            <!--div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </!--div-->
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">System Records</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Mobile Number</th>
                                    <th>Gender</th>
                                    <th>Visited Date</th>
                                    <th>Next Visit Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($data['patientdata'] as $patient)
                                @php

                                                if(!empty($patient->created_at))
                                                {
                                                    $created_at =date('d-m-Y', strtotime($patient->created_at));
                                                }else{
                                                    $created_at =$patient->created_at;
                                                }

                                                if(!empty($patient->visited_date))
                                                {
                                                    $visited_date =date('d-m-Y', strtotime($patient->visited_date));
                                                }else{
                                                    $visited_date =$patient->visited_date;
                                                }

                                                if(!empty($patient->next_visit_date))
                                                {
                                                    $next_visit_date =date('d-m-Y', strtotime($patient->next_visit_date));
                                                }else{
                                                    $next_visit_date =$patient->next_visit_date;
                                                }

                                @endphp
                                <tr>
                                   <td>{{$i}}</td>
                                    <td>{{$patient->patient_fname}} - {{$patient->patient_lname}}</td>
                                    <td>{{$patient->p_age}}</td>
                                    <td>{{$patient->patient_number}}</td>
                                    @if($patient->patient_gender =='1')
                                    <td><p style='color:#5ed7e1'>M<p></td>
                                    @else
                                    <td><p style='color:#f6c23e!important'>F<p></td>
                                    @endif
                                      <td>{{ $visited_date }}</td>
                                      <td>{{ $next_visit_date }}</td>

                                    @if($patient->is_active =='1')
                                    <td><p style='background-color:#5ed7e1;color:white'>Active<p></td>
                                    @else
                                    <td><p style='background-color:#f6c23e!important;color:white'>In Active</p></td>
                                    @endif
                                    <td> <button type="button" id="show-user" data-id="{{ $patient->patient_id }}" class="btn btn-success" data-toggle="modal" data-target="#ajax-modal">update</button></td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

     @include('patient/update-model')


    </div>
    @include('include/footer')
    <!-- Page level plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
        function exportexcel() {
            $("#dataTable").table2excel({
                    name: "Table2Excel",
                    filename: "patient-report",
                    fileext: ".csv"
                });
            }
    </script>

@endauth
