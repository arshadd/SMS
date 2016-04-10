var EmployeeModule = function () {

    //Create Class
    var Employee = { employee_id: 0, code: '', name: '', first_name: '', middle_name: '', last_name:'', gender: '', joining_date: '', job_title: '', user_id: 0, is_active: 0, created_at: '', updated_at: '', school_id: ''};

    //Field Declaration Section

    var employee_idFld = $('#employee_id');
    var codeFld = $('#code');
    var nameFld = $('#name');
    var first_nameFld = $('#first_name');
    var middle_nameFld = $('#middle_name');
    var last_nameFld = $('#last_name');
    var genderFld = $('#gender');
    var joining_dateFld = $('#joining_date');
    var job_titleFld = $('#job_title');
    var user_idFld = $('#user_id');
    var is_activeFld = $('#is_active');
    var created_atFld = $('#created_at');
    var updated_atsFld = $('#updated_at');
    var school_idFld = $('#school_id');


    var loadGridUrl = baseApiUrl + "employees/all_employees";
    var editUrl = baseApiUrl + "employees/find_employee/";
    var saveUrl = baseApiUrl + "employees/save";
    var deleteUrl = baseApiUrl + "employees/delete";
    var listUrl = baseAppUrl + "employees/index";

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Employee');
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
                //Field Validation Rule

                Code: {
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
                DateOfJoining: {
                    required: true
                },
                DepartmentId: {
                    required: true
                },
                DesignationId: {
                    required: true
                },
                Qualification: {
                    required: true
                },
                TotalExperience: {
                    required: true
                },
                PresentAddress: {
                    required: true
                },
                PermanentAddress: {
                    required: true
                },
                Country: {
                    required: true
                },
                State: {
                    required: true
                },
                City: {
                    required: true
                },
                Mobile: {
                    required: true
                },
                Phone: {
                    required: true
                },
                Email: {
                    required: true
                },
                Photo: {
                    required: true
                },
                Status: {
                    required: true
                },
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

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
    }


    function save() {

        var employee = Employee;
        debugger;

        //Get values

        employee.EmployeeId = EmployeeIdFld.val();
        employee.Code = CodeFld.val();
        employee.FirstName = FirstNameFld.val();
        employee.LastName = LastNameFld.val();
        employee.DateOfBirth = DateOfBirthFld.val();
        employee.Gender = GenderFld.val();
        employee.DateOfJoining = DateOfJoiningFld.val();
        employee.DepartmentId = DepartmentIdFld.val();
        employee.DesignationId = DesignationIdFld.val();
        employee.Qualification = QualificationFld.val();
        employee.TotalExperience = TotalExperienceFld.val();
        employee.PresentAddress = PresentAddressFld.val();
        employee.PermanentAddress = PermanentAddressFld.val();
        employee.Country = CountryFld.val();
        employee.State = StateFld.val();
        employee.City = CityFld.val();
        employee.Mobile = MobileFld.val();
        employee.Phone = PhoneFld.val();
        employee.Email = EmailFld.val();
        employee.Photo = PhotoFld.val();
        employee.Status = StatusFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : employee,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=Employee Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }

    function loadAll() {
        //Todo

        fillDropDownDepartment();

        fillDropDownDesignation();

    }


    function fillDropDownDepartment() {
        var loadDDUrl = baseApiUrl + "Department/List";

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
                    $("#DepartmentId").append($("<option     />").val(this.DepartmentId).text(this.Name));
                });
            }
        });
    }
    function fillDropDownDesignation() {
        var loadDDUrl = baseApiUrl + "Designation/List";

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
                    $("#DesignationId").append($("<option     />").val(this.DesignationId).text(this.Name));
                });
            }
        });
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

        var newTable = $('#EmployeeGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection
                { data: "employee_id",
                    visible: false,
                    searchable: false },
                { data: "code" },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="edit/'+ data.employee_id +'" >'+ data.name +'</a>';
                }
                },
                { data: "gender" },
                { data: "job_title" },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="edit/'+ data.employee_id +'" class="btn btn-default btn-xs purple"><i class="fa fa-key"></i> Manage</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.employee_id + '"><i class="fa fa-edit"></i> Edit</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.employee_id + '"><i class="fa fa-trash-o"></i> Delete</a>';
                }
                },
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Employee");
                    $('#mdlCreateEmployee').modal('show');
                });
            }
        });

        jQuery('#EmployeeGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var loadGrid2 = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#EmployeeGrid').DataTable({
        });

        jQuery('#EmployeeGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


    var edit = function (id) {
        alert(id);

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

        EmployeeIdFld.val(data.EmployeeId);
        CodeFld.val(data.Code);
        FirstNameFld.val(data.FirstName);
        LastNameFld.val(data.LastName);
        DateOfBirthFld.val(data.DateOfBirth);
        GenderFld.val(data.Gender);
        DateOfJoiningFld.val(data.DateOfJoining);
        DepartmentIdFld.val(data.DepartmentId);
        DesignationIdFld.val(data.DesignationId);
        QualificationFld.val(data.Qualification);
        TotalExperienceFld.val(data.TotalExperience);
        PresentAddressFld.val(data.PresentAddress);
        PermanentAddressFld.val(data.PermanentAddress);
        CountryFld.val(data.Country);
        StateFld.val(data.State);
        CityFld.val(data.City);
        MobileFld.val(data.Mobile);
        PhoneFld.val(data.Phone);
        EmailFld.val(data.Email);
        PhotoFld.val(data.Photo);
        StatusFld.val(data.Status);
    }

    function showPopup() {
        $('#Form_Employee').trigger("reset");
        $('.modal-title').html("Create Employee");
        $('#mdlCreateEmployee').modal('show');
    }
    //var view = function () {
    //    var pathname = window.location.pathname;

    //    var params = pathname.split('/');
    //    var id = params[params.length - 1];

    //    //alert(id);

    //    var url = editUrl + id;
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'GET',
    //        dataType: 'jsonp',
    //        success: function (data) {
    //            //debugger;
    //            showView(data.data);
    //        },
    //        fail: function (result) {
    //        }
    //    });
    //}

    //function showView(data) {
    //    debugger;
    //    if (data == null) return;

    //    //Set values

    //    EmployeeIdFld.text(data.EmployeeId);
    //    CodeFld.text(data.Code);
    //    FirstNameFld.text(data.FirstName);
    //    LastNameFld.text(data.LastName);
    //    DateOfBirthFld.text(data.DateOfBirth);
    //    GenderFld.text(data.Gender);
    //    DateOfJoiningFld.text(data.DateOfJoining);
    //    DepartmentIdFld.text(data.DepartmentId);
    //    DesignationIdFld.text(data.DesignationId);
    //    QualificationFld.text(data.Qualification);
    //    TotalExperienceFld.text(data.TotalExperience);
    //    PresentAddressFld.text(data.PresentAddress);
    //    PermanentAddressFld.text(data.PermanentAddress);
    //    CountryFld.text(data.Country);
    //    StateFld.text(data.State);
    //    CityFld.text(data.City);
    //    MobileFld.text(data.Mobile);
    //    PhoneFld.text(data.Phone);
    //    EmailFld.text(data.Email);
    //    PhotoFld.text(data.Photo);
    //    StatusFld.text(data.Status);

    //    $(".edit").attr("href", "../Edit/" + data.EmployeeId);
    //};

    //function deleteData() {
    //    var pathname = window.location.pathname;

    //    var params = pathname.split('/');
    //    var id = params[params.length - 1];

    //    //alert(id);

    //    var url = deleteUrl + id;
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'POST',
    //        dataType: 'jsonp',
    //        complete: function (result) {
    //            // Handle the complete event
    //            var obj = JSON.parse(result.responseText);

    //            if (obj.Success == true) {
    //                window.location = listUrl + "?message=Employee Information Deleted";
    //            } else {
    //                ShowMessage("error", obj.Message);
    //            }
    //        }
    //    });
    //}
    //var del = function () {
    //    $(".delete").on("click", function () {
    //        if (confirm("Are you sure want to delete?")) {
    //            deleteData();
    //        }
    //    });
    //};

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
        loadGrid2: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid2();
        },
        addView: function () {
            showPopup();
        },
        //edit: function () {
        //    edit();
        //},
        //view: function () {
        //    view();
        //},
        //del: function () {
        //    del();
        //}
    };
}();
