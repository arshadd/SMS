var ExamMarksModule = function () {

    //Field Declaration Section

    var MarksGrid = $('#MarksGrid');

    var AttendanceDateFld = $('#attendance_date');

    var BtnSaveAttendanceFld = $('#Form_Marks #btnSaveAttendance');


    var loader = $("#Form_Marks #loader");
    loader.hide();

    var loadGridUrl = baseApiUrl + "student_attendances/all_batch_students/";
    var editUrl = baseApiUrl + "student_attendances/find/";
    var saveUrl = baseApiUrl + "student_attendances/save";

    /* var deleteUrl = baseApiUrl + "Attendance/Delete/";
     var listUrl = baseAppUrl + "Attendance/List";*/



    //--------------------Grid Functions-----------------------//

    var dataTable = null;
    var counter=0;
    var loadGrid = function (batch_id) {

        //debugger;
        // var batch_id = BatchIdFld.val();

        //var loadGridUrl = loadGridUrl + batch_id +'?attendance_date='+ attendance_date;

        dataTable = MarksGrid.DataTable({
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
                /*{
                 data: null, render: function (data, type, row) {
                 return '<img src="' + baseAppImageUrl+ data.photo + '" style="width:30px;heigh:30px;" />';
                 }
                 },*/
                {data: "full_name"},
                {data: "full_roll_no"},
                {data: "admission_no"},
                {data: null, render: function ( data, type, full, meta ) {

                    var name = "obtained_"+ data.student_id;
                    var obtained = data.reason == null? '':data.reason;

                    var obtaineds = '<input type="text" name="'+ name +'" value="'+ obtained +'"/>';
                    return obtaineds;

                }
                },
                {
                    data: null, render: function (data, type, full, meta) {

                    var name = "reason_"+ data.student_id;
                    var reason = data.reason == null? '':data.reason;

                    var reasons = '<input type="text" name="'+ name +'" value="'+ reason +'"/>';
                    return reasons;
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#MarksGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#MarksGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#MarksGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//

    //--------------------Form Validation Functions-----------------------//

    var error = $('.alert-danger');
    var success = $('.alert-success');

    $('#btnSearch').on('click', function(){
        search();
    });

    function search(){
        var batch_id = $('#batch_id').val();// fetchBatchId();

        var attendance_date = AttendanceDateFld.val();

        var url = loadGridUrl + batch_id+'?attendance_date='+attendance_date;

        //alert(url);

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

                //debugger;
                if(result.summary != null && result.summary[0] != null){
                    var summary = result.summary[0];

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
        var attendance_form = $('#Form_Marks');

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

    /*var fetchBatchId = function(){
     // var pathname = window.location.pathname;
     // var params = pathname.split('/');
     //
     // //set in global
     // var batch_id = params[params.length - 1];
     // return batch_id;

     return 2; //should be removed
     }*/
    //--------------------End Other Functions-----------------------//

    //--------------------Fill dropdown Functions-----------------------//
    function fillDropDownBatches() {
        var loadDDUrl = baseApiUrl + "batches/all_batches";

        $("#batch_id").empty();
        $("#batch_id").append($("<option     />").val("0").text("Select..."));
        $("#batch_id").select2('val','0');

        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                $.each(result.data, function () {
                    $("#batch_id").append($("<option     />").val(this.batch_id).text(this.full_name));
                });

                /*$("#batch_id").select2('val', fetchBatchId());
                 $("#batch_id").trigger('change');
                 */
            }
        });
    }

    /*$("#batch_id").on('change', function(){
     var batch_id = $(this).val();

     var url = loadGridUrl + batch_id;
     dataTable.ajax.url(url).load();
     });*/
    //--------------------End Fill dropdown Functions-----------------------//

    return {
        //main function to initiate the module
        init : function(){
            handleDateTime();
            fillDropDownBatches();

            var d = new Date();
            AttendanceDateFld.val(GetDateFormatOnly(d.yyyymmdd()));

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid(0);
        },
    };
}();
