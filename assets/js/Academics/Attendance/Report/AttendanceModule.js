var AttendanceModule = function () {

    var classes = $('#class');
    var student = $('#student');
    var employee = $('#employee');

    //var ReportType = $('#type');

    var loader = $("#Form_Report #loader");
    loader.hide();

    var class_id =0;
    var batch_id =0;

    var ReportRange = $('#Form_Report #reportrange');


    //Batch Student report
    var ClassFld = $('#Form_Report #class_id');
    var BatchFld = $('#Form_Report #batch_id');
    var loadGrid_Batch_Students_Url = baseApiUrl + "student_attendances/all_batch_students_pivot/";



    //Student report
    var StudentFld = $('#Form_Report #student_id');
    var load_Student_Url = baseApiUrl + "student_attendances/all_students_pivot/";

    //--------------------Form Validation Functions-----------------------//

    var error = $('#Form_Report .alert-danger');
    var success = $('#Form_Report .alert-success');

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();
        //alert('dd')
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Report');

        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message batch
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore",
            rules: {

                //Personal Info
                /*class_id: {
                    required: true
                },
                batch_id: {
                    required: true
                },

                student_id: {
                    required: true
                },*/
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

                generateReport();
                //alert('save');
                //alert('saving');
                //search();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            }
        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        /*$('.select2me', form1).change(function () {
         form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
         });*/
    }
    //--------------------End Form Validation Functions-----------------------//

     //--------------------Dropdown Functions-----------------------//
/*    ReportType.on('change', function(){
        var value = $(this).val();
        //alert('d'+value)

        $('.batch-class-selection').hide();
        $('.student-selection').hide();

        if(value == "class"){
            $('.batch-class-selection').show();

        }else if(value == "student"){

            $('.student-selection').show();
        }else if(value == "employee"){

        }
        //alert(value);
        //fillDropDownBatches();
    });*/

    function loadAll() {
        //Todo
        fillDropDownBatches();

        //fillDropDownStudents();

        //ReportType.change();
    }
    /*ClassFld.on('change', function(){
        class_id = ClassFld.val();
        fillDropDownBatches();
    });
    function fillDropDownClasses() {

        var loadDDUrl = baseApiUrl + "classes/all_classes";

        ClassFld.empty();
        ClassFld.append($("<option     />").val('').text("Select class"));
        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: true,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                $.each(result.data, function () {
                    ClassFld.append($("<option />").val(this.class_id).text(this.name));
                });
            }
        });
    }*/
    function fillDropDownBatches() {
        var loadDDUrl = baseApiUrl + "batches/all_batches/";

        BatchFld.empty();
        BatchFld.append($("<option     />").val('0').text("Select batch"));
        BatchFld.select2('val','0');

        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: true,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                $.each(result.data, function () {
                    BatchFld.append($("<option     />").val(this.batch_id).text(this.full_name));
                });
            }
        });
    }

    /*function fillDropDownStudents() {

        var loadDDUrl = baseApiUrl + "students/all_students";

        StudentFld.empty();
        StudentFld.append($("<option     />").val('').text("Select student"));
        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: true,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                $.each(result.data, function () {
                    StudentFld.append($("<option />").val(this.student_id).text(this.class_name +' ('+this.batch_name+') '+this.class_roll_no+' '+ this.full_name));
                });
            }
        });
    }*/

    //--------------------End Dropdown Functions-----------------------//
    

    //--------------------Other Functions-----------------------//
    function generateReport() {
        //debugger;



        generateBatchStudentsAttendanceReport();
        
        /*if (ReportType.val() == "class") {
            classes.show();
            generateBatchStudentsAttendanceReport();
        }
        if (ReportType.val() == "student") {
            student.show();
            generateStudentsAttendanceReport();
        }*/
    }

    function generateBatchStudentsAttendanceReport(){
        //debugger;

        $("#ClassAttendanceGrid").empty();
        var dates = $('#reportrange span').html().split('-');
        var batch_id = BatchFld.val();
        var from_date = dates[0];// ReportRange.start();// '2016-04-01';
        var to_date = dates[1];// ReportRange.end();//'2016-04-30';

        var url = loadGrid_Batch_Students_Url + batch_id + '?from_date=' + from_date + '&to_date=' + to_date;


        //var className= $('#Form_Report #class_id option:selected').text();
        var batchName= $('#Form_Report #batch_id option:selected').text();
        if(batch_id==0)return;

        //alert(url);

        loader.show();
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success : function(result){
                loader.hide();

                //Show summary
                $('#ClassAttendanceSummaryGrid .class_name').text(batchName);
                $('#ClassAttendanceSummaryGrid .date_ranges').text("From : "+from_date+", To : "+to_date);

                //debugger;
                var tableHeaders="";
                var columns = result.data[0];
                $.each(columns, function (i, val) {
                    ////debugger;
                    tableHeaders += "<th>" + i + "</th>";
                });

                var tableBody="";

                $.each(result.data, function (i, val) {
                    tableBody +="<tr>";

                    //debugger;
                    $.each(result.data[i], function (j, val2) {
                        val2 = val2==null?'':val2;

                        tableBody += "<td>" + val2 + "</td>";
                    });
                    tableBody +="</tr>";
                });


                $("#ClassAttendanceGrid").append('<table id="displayTable" class="table table-striped table-advance2 table-bordered table-hover"><thead><tr>' + tableHeaders + '</tr></thead><tbody>'+ tableBody +'</tbody></table>');
            },
        });
    }

    /*function generateStudentsAttendanceReport(){
        //debugger;

        $("#StudentAttendanceGrid").empty();
        var dates = $('#reportrange span').html().split('-');

        var student_id = StudentFld.val();

        var from_date = dates[0];// ReportRange.start();// '2016-04-01';
        var to_date = dates[1];// ReportRange.end();//'2016-04-30';

        var url = load_Student_Url + student_id + '?from_date=' + from_date + '&to_date=' + to_date;


        var className= $('#Form_Report #class_id option:selected').text();
        var batchName= $('#Form_Report #batch_id option:selected').text();

        //alert(url);

        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success : function(result){
                loader.hide();

                //Show summary
                $('#StudentAttendanceSummaryGrid .class_name').text(className+', '+batchName);
                $('#StudentAttendanceSummaryGrid .date_ranges').text("From :"+from_date+", To :"+to_date);

                //debugger;
                var tableHeaders="";
                var columns = result.data[0];
                $.each(columns, function (i, val) {
                    ////debugger;
                    tableHeaders += "<th>" + i + "</th>";
                });

                var tableBody="";

                $.each(result.data, function (i, val) {
                    tableBody +="<tr>";

                    //debugger;
                    $.each(result.data[i], function (j, val2) {
                        val2 = val2==null?'':val2;

                        tableBody += "<td>" + val2 + "</td>";
                    });
                    tableBody +="</tr>";
                });


                $("#StudentAttendanceGrid").append('<table id="displayTable" class="table table-striped table-advance2 table-bordered table-hover"><thead><tr>' + tableHeaders + '</tr></thead><tbody>'+ tableBody +'</tbody></table>');
            },
        });
    }
    */
    /*function hideAll() {
        classes.hide();
        student.hide();
        employee.hide();
    }*/

    function handleDateRange() {
        $('#reportrange').daterangepicker({
                opens: (App.isRTL() ? 'left' : 'right'),
                startDate: moment().subtract('days', 29),
                endDate: moment(),
                minDate: '01/01/2016',
                maxDate: '12/31/2030',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                buttonClasses: ['btn'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Apply',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom Range',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            },
            function (start, end) {
                //console.log("Callback has been called!");
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
        //Set the initial state of the picker label
        $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }
    //--------------------End Other Functions-----------------------//


    return {
        //main function to initiate the module
        init: function () {
            loadAll();
            handleDateRange();
            handleValidation();
        }
    };
}();
