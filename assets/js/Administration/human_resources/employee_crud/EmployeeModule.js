var EmployeeModule = function () {

    //Create Class
   // var Employee = { employee_id: 0, code: '', name: '', first_name: '', middle_name: '', last_name:'', gender: '', joining_date: '', job_title: '', user_id: 0, is_active: 0, created_at: '', updated_at: '', school_id: ''};


    var School = { school_id: 0};


    //Global
    var employee_department_id=0;
    var employee_position_id=0;
    var gender =0;

    //Field Declaration Section

    var EmployeeIdFld = $('#Form_Employee #employee_id');
    var UserIdFld = $('#Form_Employee #user_id');

    var PhotoFld = $('#Form_Employee #photo');
    var EmployeeCodeFld = $('#Form_Employee #code');
    var JoiningDateFld = $('#Form_Employee #joining_date');
    var DateOfBirthFld = $('#Form_Employee #date_of_birth');

    var EmployeeDepartmentFld = $('#Form_Employee #employee_department_id');
    var EmployeePositionFld = $('#Form_Employee #employee_position_id');
    var GenderFld = $('#Form_Employee #gender');



    var EmployeeGrid = $('#EmployeeGrid');
    var ModalCreateEmployee = $('#mdlCreateEmployee');
    var ModalDeleteEmployee = $('#mdlDeleteEmployee');

    var form1 = $('#Form_Employee');
    var error = $('.alert-danger');
    var success = $('.alert-success');

    error.hide();
    success.hide();

    var loader = $("#Form_Employee #loader");
    loader.hide();

    var loadGridUrl = baseApiUrl + "employees/all_employees";
    var editUrl = baseApiUrl + "employees/find_employee/";
    var saveUrl = baseApiUrl + "employees/save";
    var deleteUrl = baseApiUrl + "employees/delete";
    var listUrl = baseAppUrl + "employees/index";
    var newUrl = baseApiUrl + "employees/new_employee";

    var newTable = null;
    var loadGrid = function () {
        // ShowSuccessMessage();

        var dataSet = [];


        newTable = EmployeeGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            columns: [
                //Table Column Header Collection
                { data: "employee_id",
                    visible: false,
                    searchable: false },
                {
                    data: null, render: function (data, type, row) {
                    return '<img src="' + baseAppImageUrl+ data.photo + '" style="width:30px;heigh:30px;" />';
                }
                },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="'+baseAppUrl+'administration/hr/manage/admission/'+ data.employee_id +'" data-id="' + data.employee_id + '">'+ data.first_name +' '+data.middle_name +', '+ data.last_name +'</a>';
                }
                },
                { data: "gender_text" },
                { data: "job_title" },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="edit/'+ data.employee_id +'" class="btn btn-default btn-xs purple"><i class="fa fa-key"></i> Manage</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple" data-id="' + data.employee_id + '"><i class="fa fa-edit"></i> Edit</a>';
                    /*return '<a href="edit/'+ data.employee_id +'" class="btn btn-default btn-xs purple"><i class="fa fa-key"></i> Manage</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.employee_id + '"><i class="fa fa-edit"></i> Edit</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.employee_id + '"><i class="fa fa-trash-o"></i> Delete</a>';*/
                }
                },
            ],

        });

        jQuery('#EmployeeGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    EmployeeGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);
        error.hide();
        success.hide();

        var id = $(this).data('id');

        edit(id);
        $('.modal-title').html("Edit Student");
        ModalCreateEmployee.modal('show');
    });

    // Delete record
    EmployeeGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        error.hide();
        success.hide();

        showDelete(id);
        ModalDeleteStudent.modal('show');

        //deleteData(id);
    });

    var reloadGrid = function(){
        //debugger;
        newTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//

    function loadAll() {

        fillDropDownDepartments();
        fillDropDownPositions();
    }
   /* StudentClassFld.on('change', function(){
        fillDropDownBatches();
    });*/
    function fillDropDownDepartments() {

        var loadDDUrl = baseApiUrl + "employeedepartments/all_employeedepartments";

        EmployeeDepartmentFld.empty();
        EmployeeDepartmentFld.append($("<option     />").val(0).text("Select Department"));
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
                    EmployeeDepartmentFld.append($("<option />").val(this.employee_department_id).text(this.name));
                });
            }
        });
    }

    function fillDropDownPositions() {
        //var class_id = StudentClassFld.val();
        var loadDDUrl = baseApiUrl + "employeepositions/all_employeepositions";

        EmployeePositionFld.empty();
        EmployeePositionFld.append($("<option     />").val(0).text("Select position"));
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
                    EmployeePositionFld.append($("<option />").val(this.employee_position_id).text(this.name));
                });
            }
        });
    }




    //--------------------Form Validation Functions-----------------------//
    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        //debugger;
        //var form1 = $('#Form_Student');
        //var error = $('.alert-danger', form1);
        //var success = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message batch
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                //Field Validation Rule
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error batch to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error batch to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success batch to the control group
            },

            submitHandler: function (form) {
                success.hide();
                error.hide();
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
        loader.show();

        //Get values
        var employee = form1.serializefiles();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : employee,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                //debugger;
                loader.hide();

                if(result.status === "success") {

                    ShowMessage("success", result.message);
                    EmployeeIdFld.val(result.data['employee_id']);
                    UserIdFld.val(result.data['user_id']);

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

        error.hide();
        success.hide();
        if (type == "error") {
            error.html(message);
            error.show();
        }else if(type=="success")
        {
            success.html(message);
            success.show();
        }

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
                // debugger;
                showEdit(data.data[0]);
            },
            fail: function (result) {
            }
        });
    }

    var add = function(){
        var url = newUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (data) {
                // debugger;

                var newRecord = data.data[0];
                EmployeeCodeFld.val(newRecord.new_employee_id);
            },
            fail: function (result) {
            }
        });

        EmployeeIdFld.val("0");
        //StudentBatchFld.select2('val','0');

        UserIdFld.val("0");
        //batch_id = 0;
        var d = new Date();
        JoiningDateFld.val(GetDateFormatOnly(d.yyyymmdd()));
    }

    function showEdit(data) {
        if (data == null) return;

        employee_department_id = data.employee_department_id;
        employee_position_id = data.employee_position_id;
        gender = data.gender;


        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#'+key).val(val);
        });

        //Fire class on change, fills the batches

        PhotoFld.attr("src",baseAppImageUrl + data.photo);
        JoiningDateFld.val(GetDateFormatOnly(data.joining_date));
        DateOfBirthFld.val(GetDateFormatOnly(data.date_of_birth));
         EmployeeDepartmentFld.val(employee_department_id);
         EmployeePositionFld.val(employee_position_id);
        // GenderFld.val(gender);
        //Disabled some fields
        disabledField(true);
    }

    $('#btnDelete').click(function(){
        deleteData(EmployeeIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        //Set values
        EmployeeIdFld.val(id);
    }

    function showAddEdit() {

        //Get Auto increment Admission number

        var employee_id = fetchEmployeeId();
        if(employee_id==0){
            add();
        }else {
            edit(employee_id);
        }
    }


    // function showPopup() {
    //
    //     //Get Auto increment Admission number
    //
    //     var url = newUrl;
    //     $.ajax({
    //         url: url,
    //         accepts: 'application/json',
    //         cache: false,
    //         type: 'GET',
    //         dataType: 'jsonp',
    //         success: function (data) {
    //             // debugger;
    //
    //             var newRecord = data.data[0];
    //             EmployeeCodeFld.val(newRecord.new_employee_id);
    //         },
    //         fail: function (result) {
    //         }
    //     });
    //
    //
    //     $('#Form_Student').trigger("reset");
    //     error.hide();
    //     success.hide();
    //
    //     EmployeeIdFld.val("0");
    //     UserIdFld.val("0");
    //     batch_id = 0;
    //     var d = new Date();
    //     JoiningDateFld.val(GetDateFormatOnly(d.yyyymmdd()));
    //
    //     PhotoFld.attr("src", DEFAULT_EMPLOYEE_IMAGE);
    //     //Enables some fields
    //     disabledField(false);
    //
    //
    //     $('.modal-title').html("Create Employee");
    //     ModalCreateEmployee.modal('show');
    // }

    var fetchEmployeeId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');

        //set in global
        var employee_id = params[params.length - 1];

        if(isNaN(employee_id)){
            employee_id = 0;
        }

        return employee_id;
    }

    function deleteData(id) {
        loader.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var student = Student;
        //debugger;

        //Get values
        student.student_id= id;

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : student,
            dataType: 'jsonp',
            success : function(result){
                //debugger;
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.batch_id;
                     //alert(save_id);
                     BatchIdFld.val(save_id);*/

                    reloadGrid();
                    ModalDeleteBatch.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }

    function disabledField(mark){
        if(mark){
            /*StudentClassFld.attr('disabled','disabled');
            StudentBatchFld.attr('disabled','disabled');*/

        }else {
            EmployeeDepartmentFld.removeAttrs('disabled');
           // StudentBatchFld.removeAttrs('disabled');
        }
    }
    //--------------------End Form Validation Functions-----------------------//

    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            handleDateTime();
            handleValidation();
            loadAll();

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
        addView: function () {
            showPopup();
        },
        addEditView: function () {
            handleDateTime();
            handleValidation();
            loadAll();

            showAddEdit();
        },
    };
}();
