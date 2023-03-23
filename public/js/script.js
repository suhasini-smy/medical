$(document).ready(function() {

    $("#submitRegisterData").click(function(ev) {
       $('.loader').show();

       $("#f_name_error,#l_name_error,#email_error,#password_error,#password_confirmation_error").remove();
         ev.preventDefault();
         var form = $("#insert-register-data");
         var url = form.attr('action');

         $.ajax({
             type: "POST",
             url: url,
             data: form.serialize(),
             success: function(data)
             {
               if( data.code === 200 )
               {
                   $('.loader').hide();
                   alert("Registered Successfully");
                   if(data.redirect==true)
                   {
                       window.location.replace("/crm-login");
                   }
                   $('#submitRegisterData').attr('disabled',false);
               }
             },
             error: function(data)
             {
                $('.loader').hide();
                   if( data.status === 422 )
                   {

                       var errors = $.parseJSON(data.responseText);
                       $.each(errors.errors, function (key, val)
                       {
                            if(key!=="msg")
                            {
                                var k =  key + "_error";
                                $("<label class="+k+" id="+k+"></label>").insertAfter("#"+key);
                                $("#" +k).css('display','block');
                                $("#" +k).text(val[0]);
                                $("#" +k).css('color','red');
                                $("#" +k).css('margin-left','1rem');
                                $('.mandatory').css('color','black');
                              }

                              if(key=="msg")
                              {
                                  $('#msg_error').html(val);
                              }


                       });
                   }

             }
         });
     });


        $("#submitPatientDetails").click(function(ev) {
         // $('.loader').show();
          $('#submitPatientDetails').attr('disabled','disabled');

          $("#patient_fname_error,#patient_lname_error,#patient_dob_error,#patient_gender_error,#category_id_error,#patient_number_error").remove();
            ev.preventDefault();
            var form = $("#insert-patient");
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                  if( data.code === 200 )
                  {
                      $('.loader').hide();
                      alert("Form Submited Successfully");
                      if(data.redirect==true)
                      {
                          window.location.replace("/dashboard");
                      }
                      $('#submitPatientDetails').attr('disabled',false);
                  }
                },
                error: function(data)
                {
                  $('.loader').hide();
                  $('#submitPatientDetails').attr('disabled',false);

                      if( data.status === 422 ) {
                          var errors = $.parseJSON(data.responseText);
                          $.each(errors.errors, function (key, val)
                          {
                                if(key!=="msg")
                                {
                                    var k =  key + "_error";
                                    $("<label class="+k+" id="+k+"></label>").insertAfter("#"+key);
                                    $("#" +k).css('display','block');
                                    $("#" +k).text(val);
                                    $("#" +k).css('color','red');
                                    $('.mandatory').css('color','black');
                                }
                                if(key=="msg")
                                {
                                    $('#msg_error').html(val);
                                }
                          });
                      }

                }
            });
        });


    $("#resetPassword").click(function(ev) {
       // $('.loader').show();
        $(this).attr('disabled',true);

        $("#email_error").remove();
          ev.preventDefault();
          var form = $("#forget-password-data");
          var url = form.attr('action');

          $.ajax({
              type: "POST",
              url: url,
              data: form.serialize(),
              success: function(data) {
                if( data.code === 200 )
                {
                    $('.loader').hide();
                    alert("Form Submited Successfully");

                    if(data.redirect==true)
                    {
                        window.location.replace("/dashboard");
                    }
                    $(this).attr('disabled',false);
                }
              },
              error: function(data)
              {
                    $('.loader').hide();
                    $(this).attr('disabled',false);

                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val)
                        {
                            if(key!=="msg")
                            {
                                  var k =  key + "_error";
                                  console.log(k);
                                  console.log(val[0]);

                                  $("<label class="+k+" id="+k+"></label>").insertAfter("#"+key);
                                  $("#" +k).css('display','block');
                                  $("#" +k).text(val[0]);
                                  $("#" +k).css('color','red');
                                  $('.mandatory').css('color','black');
                              }

                              if(key=="msg")
                              {
                                  $('#msg_error').html(val)
                              }
                        });
                    }

              }
          });
      });


      $("#submitLoginForm").click(function(ev) {
       /// $('.loader').show();
        $(this).attr('disabled',true);

        $("#email_error,#password_error").remove();
          ev.preventDefault();
          var form = $("#user_login");
          var url = form.attr('action');
          $.ajax({
              type: "POST",
              url: url,
              data: form.serialize(),
              success: function(data) {

                $('.loader').hide();
                $(this).attr('disabled',false);

                if( data.code === 302 )
                {
                    console.log(data);
                    console.log("error data");
                    alert('not update please check data incorrect')
                    $(this).attr('disabled',false);
                }

                if( data.code === 200 )
                {
                    $('.loader').hide();
                    if(data.redirect==true)
                    {
                        alert("Successfully logged in");
                        window.location.replace("/dashboard");
                    }
                    $(this).attr('disabled',false);
                }
              },
              error: function(data)
              {

                    $('.loader').hide();
                    $(this).attr('disabled',false);

                    if( data.status === 422 )
                    {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val)
                        {
                              if(key!=="msg")
                              {
                                  var k =  key + "_error";
                                  console.log(k);
                                  console.log(val[0]);

                                  $("<label class="+k+" id="+k+"></label>").insertAfter("#"+key);
                                  $("#" +k).css('display','block');
                                  $("#" +k).text(val[0]);
                                  $("#" +k).css('color','red');
                                  $('.mandatory').css('color','black');
                              }

                              if(key=="msg")
                              {
                                  $('#msg_error').html(val)
                              }
                        });
                    }

              }
          });
      });



      $("#update_patient_details").click(function(ev) {
       // $('.loader').show();

        $("#visited_date_error,#next_visit_date_error,#is_active_error").remove();
          ev.preventDefault();
          var form = $("#patient_update_form");
          var patient_id = $('#patient_id').val();
          var url = form.attr('action');
          $.ajax({
              type: "POST",
              url: url+"/"+patient_id,
              data: form.serialize(),
              success: function(data) {

                $('.loader').hide();

                if( data.code === 302 )
                {
                    console.log(data);
                    console.log("error data");
                    alert('Email or password are incorrect')
                }

                if( data.code === 200 )
                {
                    $('.loader').hide();
                    if(data.redirect==true)
                    {
                        alert("Patient Updated Successfully");
                        window.location.replace("/dashboard");
                    }
                }
              },
              error: function(data)
              {
                    $('.loader').hide();
                    if( data.status === 422 )
                    {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val)
                        {
                            if(key!=="msg")
                              {
                                  var k =  key + "_error";
                                  console.log(k);
                                  console.log(val[0]);

                                  $("<label class="+k+" id="+k+"></label>").insertAfter("#"+key);
                                  $("#" +k).css('display','block');
                                  $("#" +k).text(val[0]);
                                  $("#" +k).css('color','red');
                                  $('.mandatory').css('color','black');
                              }


                              if(key=="msg")
                              {
                                  $('#msg_error').html(val)
                              }
                        });
                    }

              }
          });
      });

   });

  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   /* When click show user */
    $('body').on('click', '#show-user', function () {
        var user_id = $(this).data('id');
        $.get('get_patient_data/' + user_id +'', function (data) {

            $( "#next_visit_date" ).datepicker({
                dateFormat: 'dd-mm-yy',
                timeFormat:  "hh:mm:ss",
                minDate: 1,
                onSelect: function(selected,evnt) {
                    updateNextDate(selected);
               }
            });

            $( "#visited_date" ).datepicker({
                dateFormat: 'dd-mm-yy',
                timeFormat:  "hh:mm:ss",
                changeMonth: true,
                changeYear: true,
                maxDate: new Date(),
                yearRange: '1945:'+(new Date).getFullYear(),
                onSelect: function(selected,evnt)
                {
                    updateVisitedDate(selected);
                }
            });

            if(data.visited_date !== null)
            {
                var visited_date =  mysqlDateTophp(data.visited_date);
            }
            if(data.next_visit_date!== null)
            {
                var next_visit_date =  mysqlDateTophp(data.next_visit_date);
            }

            $('#visited_date').val(visited_date);
            $('#patient_id').val(data.patient_id);
            $('#next_visit_date').val(next_visit_date);
            $('#is_active').html("");

            var selectValues = {
                                    "1": "Active",
                                    "0": "In Active"
                               };
              var $mySelect = $('#is_active');
              auxArr = [];
              $.each(selectValues, function(key, value) {
                console.log(data.is_active);

                if(data.is_active==key)
                {
                    var opt= "selected";
                }else{
                    var opt= "";
                }
                var res = "<option  " + opt + " value='" + key + "'>" + value + "</option>";
                auxArr[key] = res;
                console.log(res);

              });
              $mySelect.append(auxArr.join(''));

        })
    });

    function updateVisitedDate(value){
        $('#visited_date').val(value);
    }
    function updateNextDate(value){
        $('#next_visit_date').val(value);
    }

    function mysqlDateTophp(data)
    {
        const date = data;
        var dateSplit = date.split(" ");
        var dateSplit2 = dateSplit[0].split("-");
        var visitedformattedDate = dateSplit2.reverse().join('-');   // 26-06-2013
        return visitedformattedDate;
    }


  });

