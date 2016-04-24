var ClassAttendanceModule = function () {

    //Field Declaration Section
    
    var AttendanceGrid = $('#AttendanceGrid');

    var AttendanceDateFld = $('#Form_Class_Attendances_Search #attendance_date');

    var BtnSaveAttendanceFld = $('#Form_Attendance #btnSaveAttendance');


    var loader = $("#Form_Attendance #loader");
    loader.hide();

    var loadGridUrl = baseApiUrl + "student_attendances/all_batch_students/";
    var editUrl = baseApiUrl + "student_attendances/find/";
    var saveUrl = baseApiUrl + "student_attendances/save";

    /* var deleteUrl = baseApiUrl + "Attendance/Delete/";
     var listUrl = baseAppUrl + "Attendance/List";*/



    //--------------------Grid Functions-----------------------//

    var dataTable = null;
    var counter=0;
    var loadGrid = function () {
        
        //debugger;
        // var batch_id = BatchIdFld.val();

        //var loadGridUrl = loadGridUrl + batch_id +'?attendance_date='+ attendance_date;
        var dataSet = [];


        dataTable = AttendanceGrid.DataTable({
            //dom: "Bfrtip",
            //ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            paginate: false,
            lengthChange: false,
            filter:false,
            //bDestroy: true,

            /*language: {
             emptyTable: "No records available - Got it?",
             },*/
            columns: [
                //Table Column Header Collection
                {
                    data: null, render: function (data, type, row) {
                    counter = counter + 1;
                    return counter;
                }
                },
                {
                    data: null, render: function (data, type, row) {
                    return '<img src="' + baseAppImageUrl+ data.photo + '" style="width:30px;heigh:30px;" />';
                }
                },
                {data: "full_name"},
                {data: "class_roll_no"},
                {data: null, render: function ( data, type, full, meta ) {

                    var name = "attendance_status_"+ data.student_id;
                    var student_attendance = "student_attendance_id_"+ data.student_id;
                    var checked1 = "";
                    var checked2 = "";
                    var checked3 = "";
                    var batch_id = fetchBatchId();

                    if(data.attendance_status!=null) {
                        if (data.attendance_status == "P") {
                            checked1 = "checked='checked'";
                        } else if (data.attendance_status == "A") {
                            checked2 = "checked='checked'";
                        } else {
                            checked3 = "checked='checked'";
                        }
                    }

                    var list = '<div > '+
                                '<input type="hidden" name="student_id[]" value="'+ data.student_id +'"/>'+
                                '<input type="hidden" name="'+ student_attendance +'" value="'+ data.student_attendance_id +'"/>'+
                                '<input type="hidden" name="attendance_date" value="'+ AttendanceDateFld.val() +'"/>'+
                                '<input type="hidden" name="batch_id" value="'+ batch_id +'"/>'+
                                '<label class="radio-inline"> '+
                                '<input type="radio" name="'+ name +'" '+ checked1 +' value="P"/> Present '+
                                '</label> '+
                                '<label class="radio-inline"> '+
                                '<input type="radio" name="'+ name +'" '+ checked2 +'  value="A"/> Absent '+
                                '</label> '+
                                '<label class="radio-inline"> '+
                                '<input type="radio" name="'+ name +'" '+ checked3 +'  value="L" /> Leave '+
                                '</label> '+
                                '</div> ';

                    return list;
                }
                },
                {
                    data: null, render: function (data, type, full, meta) {

                    var name = "reason_"+ data.student_id;
                    var reason = data.reason == null? '':data.reason;

                    var reason = '<input type="text" name="'+ name +'" value="'+ reason +'"/>';
                    return reason;
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#AttendanceGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#AttendanceGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#AttendanceGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//

    //--------------------Form Validation Functions-----------------------//

    var error = $('#Form_Class_Attendances_Search .alert-danger');
    var success = $('#Form_Class_Attendances_Search .alert-success');

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();
        //alert('dd')
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Class_Attendances_Search');

        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message batch
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                //Personal Info
                attendance_batch_id: {
                    required: true
                },
                attendance_date: {
                    required: true
                },
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error batch to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error batch to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error'); // set success batch to the control group
            },
            submitHandler: function (form) {
                success.hide();
                error.hide();

                //alert('saving');
                search();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            }
        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        /*$('.select2me', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });*/
    }

    function search(){
        var batch_id = fetchBatchId();
        var attendance_date = AttendanceDateFld.val();

        var url = loadGridUrl + batch_id+'?attendance_date='+attendance_date;

        //reset counter
        counter=0;
        //alert(url);
        dataTable.ajax.url(url).load();

        fillSummary(attendance_date, url);
    }
    function fillSummary(attendance_date, url){

        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            processData: false,
            contentType: false,

            success : function(result){
                debugger;
                loader.hide();
                $("#lblAttendanceDate").text(attendance_date);


                var summary = result.summary[0];

                if(summary!=null){
                    $("#lblPresent").text(summary.present_count);
                    $("#lblAbsent").text(summary.absent_count);
                }
                else {
                    $("#lblPresent").text("0");
                    $("#lblAbsent").text("0");
                }

                App.scrollTo($('.page-title'));
            },
            failed : function(result){
                //debugger;
                loader.hide();
                ShowMessage("error", result.message);
            }
        });
    }
    function save() {

        //debugger;
        var attendance_form = $('#Form_Attendance');

        //Get values
        var student = attendance_form.serializefiles();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : student,
            dataType: 'jsonp',
            processData: false,
            contentType: false,

            success : function(result){
                //debugger;
                loader.hide();
                if(result.status == "success"){

                     ShowMessage("success", result.message);
                    reloadGrid();
                }else {
                    //alert(result.message);
                    ShowMessage("error", result.message);
                }

                App.scrollTo($('.page-title'));
            },
            failed : function(result){
                //debugger;
                loader.hide();
                ShowMessage("error", result.message);
            }
        });
    }
    function ShowMessage(type, message){
        if (message == 'undefined') return;

        message = '<button data-close="alert" class="close"></button>'+ message;

        if (type == "error") {
            error.html(message);
            error.show();
        }else if(type=="success")
        {
            success.html(message);
            success.show();
        }

    }
    //--------------------End Form Validation Functions-----------------------//

    //--------------------Other Functions-----------------------//
    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                //format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    };

    BtnSaveAttendanceFld.on('click', function(){
        save();
    });

    $("input[name='rdoMarkAll']").on('click', function(){
        var v = $(this).val();

        $('input:radio').filter('[value="'+ v +'"]').attr('checked', "checked");
    });

    var fetchBatchId = function(){
        // var pathname = window.location.pathname;
        // var params = pathname.split('/');
        //
        // //set in global
        // var batch_id = params[params.length - 1];
        // return batch_id;

        return 2; //should be removed
    }

    //--------------------End Other Functions-----------------------//


    return {
        //main function to initiate the module
        init : function(){
            handleValidation();
            handleDateTime();

            var d = new Date();
            AttendanceDateFld.val(GetDateFormatOnly(d.yyyymmdd()));

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
    };
}();
