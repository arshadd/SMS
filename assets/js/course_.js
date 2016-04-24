var CourseModule = function () {
  
    var Course = { CourseId: 0, Code: '', Name: '', Description: '', MinimumAttendancePercentage: 0, AttendanceType: '', TotalWorkingDays: 0, SyllabusName: '', Status:'' };

    var CourseIdFld = $('#CourseId');
    var CodeFld = $('#Code');
    var NameFld = $('#Name');
    var DescriptionFld = $('#Description');
    var MinimumAttendancePercentageFld = $('#MinimumAttendancePercentage');
    var AttendanceTypeFld = $('#AttendanceType');
    var TotalWorkingDaysFld = $('#TotalWorkingDays');
    var SyllabusNameFld = $('#SyllabusName');
    var StatusFld = $('#Status');


    var loadGridUrl = baseApiUrl + "Course/List";
    var editUrl = baseApiUrl + "Course/Find/";
    var saveUrl = baseApiUrl + "Course/Save";
    var deleteUrl = baseApiUrl + "Course/Delete/";

    var listUrl = baseAppUrl + "Course/List";

    var handleValidation = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#form_course');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                Code: {
                    minlength: 2,
                    required: true
                },
                Name: {
                    required: true
                },
                Description: {
                    required: true,
                },
                MinimumAttendancePercentage: {
                    required: true,
                    number: true
                },
                //digits: {
                //    required: true,
                //    digits: true
                //},
                //creditcard: {
                //    required: true,
                //    creditcard: true
                //},
                //occupation: {
                //    minlength: 5,
                //},
                //AttendanceType: {
                //    required: true
                //}
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

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
                save();
            }
        });
    }


    function save() {
       
        var course = Course;
        //debugger;
        course.CourseId = CourseIdFld.val();
        course.Code = CodeFld.val();
        course.Name = NameFld.val();
        course.Description = DescriptionFld.val();
        course.MinimumAttendancePercentage = MinimumAttendancePercentageFld.val();
        course.AttendanceType = AttendanceTypeFld.val();
        course.SyllabusName = SyllabusNameFld.val();
        course.TotalWorkingDays = TotalWorkingDaysFld.val();
        course.Status = StatusFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : course,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);

                if (obj.Success == true) {
                    window.location = listUrl + "?success=y";
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
        var success = getUrlVars()["success"];
        //console.log(success);
        if (success == "y") {
            ShowMessage("success", "Course Information Saved Successfully.")
        }
    }
   
    var loadGrid = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#example2').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //{
                //    data: null, render: function (data, type, row) {
                //        // Combine the first and last names into a single table field
                //        return '<a href="View/' + data.CourseId + '">' + data.Code + '</a>';
                //    }
                //},
                { data: "Code" },
                { data: "Name" },
                { data: "MinimumAttendancePercentage" },
                { data: "AttendanceType" },
                { data: "TotalWorkingDays" },
                { data: "SyllabusName" },
                { data: "Status" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.CourseId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        return '<a href="Edit/' + data.CourseId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ]
        });

        jQuery('#example2_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#example2_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#example2_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


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
        
        function showEdit(data) {
            if (data == null) return;
          
            CourseIdFld.val(data.CourseId);
            CodeFld.val(data.Code);
            NameFld.val(data.Name);
            DescriptionFld.val(data.Description);
            MinimumAttendancePercentageFld.val(data.MinimumAttendancePercentage);
            AttendanceTypeFld.val(data.AttendanceType);
            TotalWorkingDaysFld.val(data.TotalWorkingDays);
            SyllabusNameFld.val(data.SyllabusName);
            StatusFld.val(data.Status);
        };
        //LoadWatchList();
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

        function showView(data) {
            debugger;
            if (data == null) return;

            CourseIdFld.text(data.CourseId);
            CodeFld.text(data.Code);
            NameFld.text(data.Name);
            DescriptionFld.text(data.Description);
            MinimumAttendancePercentageFld.text(data.MinimumAttendancePercentage);
            AttendanceTypeFld.text(data.AttendanceType);
            TotalWorkingDaysFld.text(data.TotalWorkingDays);
            SyllabusNameFld.text(data.SyllabusName);
            StatusFld.val(data.Status);

            $(".edit").attr("href", "../Edit/" + data.CourseId);
        };
    }

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
                    window.location = listUrl + "?success=y";
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

    return {
        //main function to initiate the module
        validate : function(){
            handleValidation();
        },
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
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
        }
    };
}();
