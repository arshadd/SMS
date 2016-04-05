var AttendanceModule = function () {

    //Create Class
    var Attendance = { AttendanceId: 0, RegisterNumber: '', DateOfJoining: '', FirstName: '', LastName: '', DateOfBirth: '', Gender: '', BloodGroup: '', PlaceOfBirth: '', Nationality: '', RollNumber: '', Religion: '', PresentAddress: '', PermanentAddress: '', Country: '', State: '', City: '', Mobile: '', Phone: '', Email: '', Photo: '', GuardianName: '', GuardianRelation: '', GuardianEducation: '', GuardianOccupation: '', GuardianIncome: '', GuardianCountry: '', GuardianState: '', GuardianCity: '', GuardianPhone: '', GuardianEmail: '', GuardianMobile: '', FatherName: '', FatherMobile: '', FatherJob: '', MotherName: '', MotherMobile: '', MotherJob: '', Status: '' };

    //Field Declaration Section
    
    var AttendanceIdFld = $('#AttendanceId');
    var RegisterNumberFld = $('#RegisterNumber');
    var DateOfJoiningFld = $('#DateOfJoining');
    var FirstNameFld = $('#FirstName');
    var LastNameFld = $('#LastName');
    var DateOfBirthFld = $('#DateOfBirth');

    var GenderFld = $('#Gender');

    var BloodGroupFld = $('#BloodGroup');
    var PlaceOfBirthFld = $('#PlaceOfBirth');
    var NationalityFld = $('#Nationality');
    var ReligionFld = $('#Religion');
    var PresentAddressFld = $('#PresentAddress');
    var PermanentAddressFld = $('#PermanentAddress');
    var PhotoFld = $('#Photo');


    var GuardianNameFld = $('#GuardianName');
    var GuardianRelationFld = $('#GuardianRelation');
    var GuardianOccupationFld = $('#GuardianOccupation');
    var GuardianIncomeFld = $('#GuardianIncome');
    var GuardianPhoneFld = $('#GuardianPhone');
    var GuardianEmailFld = $('#GuardianEmail');
    var GuardianMobileFld = $('#GuardianMobile');

    var FatherNameFld = $('#FatherName');
    var FatherMobileFld = $('#FatherMobile');
    var FatherJobFld = $('#FatherJob');

    var MotherNameFld = $('#MotherName');
    var MotherMobileFld = $('#MotherMobile');
    var MotherJobFld = $('#MotherJob');

    var StatusFld = $('#Status');
    

    var loadGridUrl = baseApiUrl + "Attendance/List";
    var editUrl = baseApiUrl + "Attendance/Find/";
    var saveUrl = baseApiUrl + "Attendance/Save";
    var deleteUrl = baseApiUrl + "Attendance/Delete/";
    var listUrl = baseAppUrl + "Attendance/List";


    

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();
        //alert('dd')
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        

        var form = $('#Form_Attendance');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                //Personal Info
                RegisterNumber: {
                    required:true
                },
                DateOfJoining: {
                    required: true
                }, 
                FirstName: {
                    required: true
                }, 
                LastName: {
                    required: true
                }, 
                DateOfBirth: {
                    required: true
                }, 
                Gender: {
                    required: true
                }, 
                BloodGroup: {
                    required: true
                }, 
                PlaceOfBirth: {
                    required: true
                }, 
                Nationality: {
                    required: true
                }, 
                Religion: {
                    required: true
                }, 
                PresentAddress: {
                    required: true
                }, 
                PermanentAddress: {
                    required: true
                }, 
                Photo: {
                    required: true
                }, 

                //Guardian Info
                GuardianName: {
                    required:true
                },
                GuardianRelation: {
                    required: true
                }, 
                GuardianOccupation: {
                    required: true
                }, 
                GuardianIncome: {
                    required: true
                }, 
                GuardianPhone: {
                    required: true
                }, 
                GuardianMobile: {
                    required: true
                }, 
                FatherName: {
                    required: true
                },
                FatherMobile: {
                    required: true
                }, 

                MotherName: {
                    required: true
                }, 
                MotherMobile: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                'payment[]': {
                    required: "Please select at least one option",
                    minlength: jQuery.format("Please select at least one option")
                }
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#form_gender_error");
                } else if (element.attr("name") == "payment[]") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#form_payment_error");
                } else if (element.attr("type") == "file") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#fileupload");
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                    label
                        .closest('.form-group').removeClass('has-error').addClass('has-success');
                    label.remove(); // remove error label here
                } else { // display success icon for other inputs
                    label
                        .addClass('valid') // mark the current input as valid and display OK icon
                    .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                }
            },
            submitHandler: function (form) {
                success.show();
                error.hide();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            }
        });
        
        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form).change(function () {
            form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        var displayConfirm = function () {
            $('#tab3 .form-control-static', form).each(function () {
                var input = $('[name="' + $(this).attr("data-display") + '"]', form);
                if (input.is(":text") || input.is("textarea")) {
                    $(this).html(input.val());
                } else if (input.is("select")) {
                    $(this).html(input.find('option:selected').text());
                } else if (input.is(":radio") && input.is(":checked")) {
                    $(this).html(input.attr("data-title"));
                } else if ($(this).attr("data-display") == 'payment') {
                    var payment = [];
                    $('[name="payment[]"]').each(function () {
                        payment.push($(this).attr('data-title'));
                    });
                    $(this).html(payment.join("<br>"));
                }
            });
        }

        var handleTitle = function (tab, navigation, index) {
            var total = navigation.find('li').length;
            var current = index + 1;
            // set wizard title
            $('.step-title', $('#Form_Attendance_Wizard')).text('Step ' + (index + 1) + ' of ' + total);
            // set done steps
            jQuery('li', $('#Form_Attendance_Wizard')).removeClass("done");
            var li_list = navigation.find('li');
            for (var i = 0; i < index; i++) {
                jQuery(li_list[i]).addClass("done");
            }

            if (current == 1) {
                $('#Form_Attendance_Wizard').find('.button-previous').hide();
            } else {
                $('#Form_Attendance_Wizard').find('.button-previous').show();
            }

            if (current >= total) {
                $('#Form_Attendance_Wizard').find('.button-next').hide();
                $('#Form_Attendance_Wizard').find('.button-submit').show();
                displayConfirm();
            } else {
                $('#Form_Attendance_Wizard').find('.button-next').show();
                $('#Form_Attendance_Wizard').find('.button-submit').hide();
            }
            App.scrollTo($('.page-title'));
        }

        // default form wizard
        $('#Form_Attendance_Wizard').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            onTabClick: function (tab, navigation, index, clickedIndex) {
                success.hide();
                error.hide();
                if (form.valid() == false) {
                    return false;
                }
                handleTitle(tab, navigation, clickedIndex);
            },
            onNext: function (tab, navigation, index) {
                success.hide();
                error.hide();

                if (form.valid() == false) {
                    return false;
                }

                handleTitle(tab, navigation, index);
            },
            onPrevious: function (tab, navigation, index) {
                success.hide();
                error.hide();

                handleTitle(tab, navigation, index);
            },
            onTabShow: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                var $percent = (current / total) * 100;
                $('#Form_Attendance_Wizard').find('.progress-bar').css({
                    width: $percent + '%'
                });
            }
        });

        $('#Form_Attendance_Wizard').find('.button-previous').hide();
        $('#Form_Attendance_Wizard .button-submit').click(function () {
            
            save();

            //alert('Finished! Hope you like it :)');
        }).hide();
    }


    function save() {
       
        var student = Attendance;
        debugger;

        //Get values
        
        student.AttendanceId = AttendanceIdFld.val();
        student.RegisterNumber = RegisterNumberFld.val();
        student.DateOfJoining = DateOfJoiningFld.val();
        student.FirstName = FirstNameFld.val();
        student.LastName = LastNameFld.val();
        student.DateOfBirth = DateOfBirthFld.val();

        //Get checked value
        //student.Gender = RadioCheckedValue('Gender');
        student.Gender = GenderFld.val();



        student.BloodGroup = BloodGroupFld.val();
        student.PlaceOfBirth = PlaceOfBirthFld.val();
        student.Nationality = NationalityFld.val();
        student.Religion = ReligionFld.val();
        student.PresentAddress = PresentAddressFld.val();
        student.PermanentAddress = PermanentAddressFld.val();
        student.Photo = PhotoFld.val();

        student.GuardianName = GuardianNameFld.val();
        student.GuardianRelation = GuardianRelationFld.val();
        student.GuardianOccupation = GuardianOccupationFld.val();
        student.GuardianIncome = GuardianIncomeFld.val();

        student.GuardianPhone = GuardianPhoneFld.val();
        student.GuardianEmail = GuardianEmailFld.val();
        student.GuardianMobile = GuardianMobileFld.val();

        student.FatherName = FatherNameFld.val();
        student.FatherMobile = FatherMobileFld.val();
        student.FatherJob = FatherJobFld.val();

        student.MotherName = MotherNameFld.val();
        student.MotherMobile = MotherMobileFld.val();
        student.MotherJob = MotherJobFld.val();

        student.Status = StatusFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : student,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=Attendance Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }

    function loadAll() {
        //Todo
        
    }

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('.alert-danger');
        var success = $('.alert-success');

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

    function ShowSuccessMessage() {
        var message = decodeURIComponent(getUrlVars()["message"]);
        ShowMessage("success", message);
    }
   
    var loadGrid = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#AttendanceGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection
                
                { data: "RegisterNumber", defaultContent: "" },
                { data: "FirstName", defaultContent: "" },
                { data: "LastName", defaultContent: "" },
                { data: "Gender", defaultContent: "" },
                { data: "BloodGroup", defaultContent: "" },
                { data: "GuardianName", defaultContent: "" },
                { data: "GuardianMobile", defaultContent: "" },
                { data: "FatherMobile", defaultContent: "" },
                { data: "Status", defaultContent: "" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.Attendance Id + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        return '<a href="Edit/' + data.AttendanceId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';

                        //return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.AttendanceId + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Attendance");
                    $('#mdlCreateAttendance').modal('show');
                });
            }
        });

        jQuery('#AttendanceGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#AttendanceGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#AttendanceGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var loadGrid2 = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#AttendanceGrid').DataTable({
            filter: false
            , lengthChange: false

            , scrollY: "300px"
            , scrollX: true
            , scrollCollapse: true
           
           //,"aoColumnDefs" : [ {
           // "bSortable" : false,
           // "aTargets" : [ "no-sort" ]
           //}]

            //, fixedColumns: {
            //    leftColumns: 1
            //}

        });

        //jQuery('#AttendanceGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        //jQuery('#AttendanceGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        //jQuery('#AttendanceGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


    var edit = function (id) {
        //alert(id);

        var url = editUrl + id;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (data) {
                //debugger;
                showEdit(data.data);
            },
            fail: function (result) {
            }
        });
    }

    

    function showEdit(data) {
        if (data == null) return;
        
        //Set values
        
        AttendanceIdFld.val(data.AttendanceId);
        RegisterNumberFld.val(data.RegisterNumber);

        DateOfJoiningFld.val(GetDateFormatOnly(data.DateOfJoining));

        FirstNameFld.val(data.FirstName);
        LastNameFld.val(data.LastName);

        DateOfBirthFld.val(GetDateFormatOnly(data.DateOfBirth));

        GenderFld.select2("val", data.Gender);
        BloodGroupFld.select2("val", data.BloodGroup);


        PlaceOfBirthFld.val(data.PlaceOfBirth);
        NationalityFld.val(data.Nationality);
        ReligionFld.val(data.Religion);
        PresentAddressFld.val(data.PresentAddress);
        PermanentAddressFld.val(data.PermanentAddress);
        //PhotoFld.val(data.Photo);

        GuardianNameFld.val(data.GuardianName);
        GuardianRelationFld.val(data.GuardianRelation);
        GuardianOccupationFld.val(data.GuardianOccupation);
        GuardianIncomeFld.val(data.GuardianIncome);
        GuardianPhoneFld.val(data.GuardianPhone);
        GuardianEmailFld.val(data.GuardianEmail);
        GuardianMobileFld.val(data.GuardianMobile);

        FatherNameFld.val(data.FatherName);
        FatherMobileFld.val(data.FatherMobile);
        FatherJobFld.val(data.FatherJob);

        MotherNameFld.val(data.MotherName);
        MotherMobileFld.val(data.MotherMobile);
        MotherJobFld.val(data.MotherJob);

        StatusFld.val(data.Status);
    }


    function showPopup() {
        $('#Form_Attendance').trigger("reset");
        $('.modal-title').html("Create Attendance");
        $('#mdlCreateAttendance').modal('show');
    }
   
    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                //format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    var handleDateRangePickers = function () {
        if (!jQuery().daterangepicker) {
            return;
        }

        //$('#defaultrange').daterangepicker({
        //    opens: (App.isRTL() ? 'left' : 'right'),
        //    format: 'MM/DD/YYYY',
        //    separator: ' to ',
        //    startDate: moment().subtract('days', 29),
        //    endDate: moment(),
        //    minDate: '01/01/2012',
        //    maxDate: '12/31/2014',
        //},
        //function (start, end) {
        //    console.log("Callback has been called!");
        //    $('#defaultrange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //}
        //);

        $('#reportrange').daterangepicker({
            opens: (App.isRTL() ? 'left' : 'right'),
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2014',
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
                console.log("Callback has been called!");
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
        //Set the initial state of the picker label
        $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }


    return {
        //main function to initiate the module
        validate: function () {
            //            handleValidation();

            //Handle date time
            handleDateTime();
            handleDateRangePickers();

        },
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
        loadGrid2: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid2();
        },
        addView: function () {
            showPopup();
        },
        edit: function (id) {
            //var pathname = window.location.pathname;
            //var params = pathname.split('/');
            //var id = params[params.length - 1];

            edit(id);
        },
    };
}();
