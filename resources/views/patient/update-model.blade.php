    <!-- Modal -->
    <div class="modal fade" id="ajax-modal" style="display:none" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Update Patient Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="msg_error" class="msg_error"></div>
        <form id="patient_update_form" action="{{ url('update-patient-details') }}" method="POST" name="patient_update_form" class="form-horizontal">
               <input type="hidden" name="patient_id" id="patient_id">
                <div class="form-group">
                    <label for="name" class="col-sm-6 control-label">Visited date</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="visited_date" name="visited_date" placeholder="Please Enter Visited Date" value="" maxlength="50" required="">
                    </div>
                </div>
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-6 control-label">Next Visit date</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="next_visit_date" name="next_visit_date" placeholder="Please Enter Next Visit Date" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-6 control-label">status</label>
                    <div class="col-sm-12">
                    <select class="form-select form-control form-control-brdr" name="is_active" id="is_active">
                    </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="update_patient_details" class="btn btn-primary">update changes</button>
        </div>
        </div>
    </div>
    </div>
