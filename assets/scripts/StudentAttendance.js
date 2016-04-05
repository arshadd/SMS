var StudentAttendanceModule = function () {
    var baseApiUrl = "http://localhost/School.Api/api/";
    var baseAppUrl = "http://localhost/School.Web/";

    //Create Class
    //var StudentAttendance = { StudentAttendanceId: 0, Name: '', Status: '', WorkDay: '' };

    var StudentAttendance = { StudentAttendanceId: 0, StudentId: '', WorkDay: '', AttendanceStatus: '' };
    var rows_selected = [];
    //Field Declaration Section

    var StudentAttendanceFld = $('#StudentAttendanceId');
    var StudentIdFld = $('#StudentId');
    var WorkDayFld = $('#Workday');
    var StatusFld = $('#Status');
    

    var loadGridUrl = baseApiUrl + "StudentAttendance/List";
    var editUrl = baseApiUrl + "StudentAttendance/Find/";
    var saveUrl = baseApiUrl + "StudentAttendance/Save";
    var deleteUrl = baseApiUrl + "StudentAttendance/Delete/";
    var listUrl = baseAppUrl + "StudentAttendance/List";
    var saveFirstUrl = baseApiUrl + "StudentAttendance/SaveFirst";
    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_StudentAttendance');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
           

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                //form.submit();

                //Save data
                save(form);
            }
        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $('#example3 tbody').on('click', 'input[type="checkbox"]', function (e) {
            
            
            var $row = $(this).closest('tr');
            var table = $('#example3').DataTable();
            // Get row data
            var data = table.row($row).data();
            var val = new String("");
            //var datapush = new StudentAttendance();
            //datapush.StudentAttendanceId = data.StudentAttendanceId;
            //datapush.StudentId = data.StudentId;
            //datapush.WorkDay = data.WorkDay;
            var datapush = { StudentAttendanceId: data.StudentAttendanceId, StudentId: data.StudentId, WorkDay: data.WorkDay, AttendanceStatus: val };
            if (this.checked) {
                //datapush.AttendanceStatus = "P";
                val = "P";
            }
            else {
                //datapush.AttendanceStatus = "A";
                val = "A";
            }

            // Determine whether row ID is in the list of selected row IDs 
            var index = checkIfObjectExist(rows_selected, datapush);//$.inArray(rowId, rows_selected);

            if (index !== -1)
            {
                rows_selected.splice(index, 1);
                index = -1;
            }
            // If checkbox is checked and row ID is not in list of selected row IDs
            if (index === -1) {
                //rows_selected.push(datapush);
                rows_selected.push({ StudentAttendanceId : data.StudentAttendanceId, StudentId : data.StudentId, WorkDay : data.WorkDay, AttendanceStatus:val });
                // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
            } 

            if (this.checked) {
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Update state of "Select all" control
            //updateDataTableSelectAllCtrl(table);

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });
    }

    function checkIfObjectExist(objArray, objExists) {
        for (var i = 0; i < objArray.length; i++) {
            if (objArray[i].StudentAttendanceId === objExists.StudentAttendanceId) {
                return i;
            }
        }
        return -1;
    }

    function save(form) {
       
        var testObj = { "StudentAttendanceList": rows_selected };
        //var testObj = { "Name": "Myname", "persons": [{ "ID": 1, "First": "First1", "Last": "Last1" }, { "ID": 2, "First": "First2", "Last": "Last2" }] };
        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: testObj,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                //debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=School Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }

    function loadAll() {
        //Todo

    }




    function ShowMessage(type, message) {
        if (message == 'undefined') return;
        var error = $('.alert-danger');
        var success = $('.alert-success');

        message = '<button data-close="alert" class="close"></button>' + message;

        if (type == "error") {
            error.html(message);
            error.show();
        } else if (type == "success") {
            success.html(message);
            success.show();
        }

    }

    function ShowSuccessMessage() {
        var message = decodeURIComponent(getUrlVars()["message"]);
        ShowMessage("success", message);
    }

    var loadGrid = function () {
        //ShowSuccessMessage();
        //debugger;
        var dataSet = [];

        var newTable = $('#example2').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection

                {
                    data: "StudentAttendanceId",
                    visible: false,
                    searchable: false
                },
                {
                    data: "StudentId",
                    visible: false,
                    searchable: false
                },
                {data : "StudentName"},
                { data: "WorkDay" },
                { data: "AttendanceStatus" },
                //{
                //    data: null, render: function (data, type, row) {
                //        return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.StudentAttendanceId + '"><i class="fa fa-edit"></i> Edit</a>';
                //    }
                //},
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Attendance");
                    $('#mdlStudentAttendance').modal('show');
                });
            }
        });

        jQuery('#example2_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#example2_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#example2_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Handle click on checkbox
   

    var edit = function () {
        var pathname = window.location.pathname;

        var params = pathname.split('/');
        var id = params[params.length - 1];

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

        SchoolIdFld.val(data.SchoolId);
        NameFld.val(data.Name);
        DescriptionFld.val(data.Description);
        AddressFld.val(data.Address);
        PhoneFld.val(data.Phone);
        EmailAddressFld.val(data.EmailAddress);
        WebsiteFld.val(data.Website);
        StatusFld.val(data.Status);
    }

    var view = function () {
        var pathname = window.location.pathname;

        var params = pathname.split('/');
        var id = params[params.length - 1];

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
                showView(data.data);
            },
            fail: function (result) {
            }
        });
    }

    function showView(data) {
        debugger;
        if (data == null) return;

        //Set values

        SchoolIdFld.text(data.SchoolId);
        NameFld.text(data.Name);
        DescriptionFld.text(data.Description);
        AddressFld.text(data.Address);
        PhoneFld.text(data.Phone);
        EmailAddressFld.text(data.EmailAddress);
        WebsiteFld.text(data.Website);
        StatusFld.text(data.Status);

        $(".edit").attr("href", "../Edit/" + data.SchoolId);
    };

    function deleteData() {
        var pathname = window.location.pathname;

        var params = pathname.split('/');
        var id = params[params.length - 1];

        //alert(id);

        var url = deleteUrl + id;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);

                if (obj.Success == true) {
                    //$.ajax({
                    //    url: listUrl,
                    //    accepts: 'application/json',
                    //    cache: false,
                    //    type: 'POST',
                    //    dataType: 'jsonp',
                    //    data: '{Success:"Y", Message : "School Information Deleted."}'
                    //});
                    //window.location = listUrl + "?success=y";

                    window.location = listUrl + "?message=School Information Deleted";
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }
    var del = function () {
        $(".delete").on("click", function () {
            if (confirm("Are you sure want to delete?")) {
                deleteData();
            }
        });
    };

    function SaveAttendanceToDB() {
    
    }
    
    function showPopup() {
        //alert($('#WorkDay').val());
        var url = baseApiUrl + 'StudentAttendance/SaveFirst'; //saveFirstUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: { WorkDay: $('#WorkDay').val() },
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                //var obj = JSON.parse(result.responseText);
               // debugger;
                loadNewListData($('#WorkDay').val());
            }
        });
        
        //$('#Form_StudentAttendance').trigger("reset");
        $('.modal-title').html("Create Attendance");
        $('#mdlStudentAttendance').modal('show');
    }
    function loadNewListData(val) {
        var url = baseApiUrl + "StudentAttendance/Find/" + val.replace("/", "-").replace("/", "-");
        var dataSet = [];
        if (newTable != null) {
            newTable.fnDestroy();

        }
        var newTable = $('#example3').DataTable({
            //dom: "Bfrtip",
            ajax: url,
            bDestroy:true,
            //data: val,
            //datatype: 'json',
            columns: [
                //Table Column Header Collection
                {
                    data: "StudentAttendanceId",
                    visible: false,
                    searchable: false
                },
                {
                    data: "StudentId",
                    visible: false,
                    searchable: false
                },
                { data: "Student.StudentFullName" },
                { data: "WorkDay" },
                {
                    data: null, render: function (data, type, row) {
                        if (data.AttendanceStatus == 'A') {
                            return '<input class="check" type="checkbox" name="check[' + data.StudentAttendanceId + ']">';
                        }
                        else {
                            return '<input class="check" type="checkbox" checked=true name="check[' + data.StudentAttendanceId + ']">';
                        }
                    }
                },
            ]

        });
        jQuery('#example3_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#example3_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#example3_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }
    return {
        //main function to initiate the module
        validate: function () {
            handleValidation();
        },
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
            handleDateTime();
            loadGrid();
        },
        edit: function () {
            edit();
        },
        view: function () {
            view();
        },
        del: function () {
            del();
        },
        addView: function () {
            showPopup();
        },
        SaveAttendance: function () {
            SaveAttendanceToDB();
        },
    };
}();
