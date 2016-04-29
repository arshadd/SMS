var DepartmentsModule = function () {

    //Create Batch
    var EmployeeDepartment = { employee_department_id: 0, code: '', name: '', status: 1, school_id: ''};

    //Field Declaration Section

    var StatusIdFld = $('#Form_Departments #status');
    var EmployeeDepartmentIdFld = $('#employee_department_id');
    var EmployeeDepartmentEditIdFld = $('#Form_Departments #employee_department_id');
    var loaderDelete = $('#loaderDelete');
    var loader = $("#Form_Departments #loader");
    loader.hide();

    var error = $('#mdlCreateDepartment .alert-danger');
    var success = $('#mdlCreateDepartment .alert-success');

var loadGridUrl =  baseApiUrl + "employeedepartments/all_employeedepartments";
    var editUrl = baseApiUrl + "employeedepartments/find_department/";
    var saveUrl = baseApiUrl + "employeedepartments/save";
    var deleteUrl = baseApiUrl + "employeedepartments/delete";
    var listUrl = baseAppUrl + "Employee_Department/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        var dataSet = [];

        dataTable = $('#DepartmentGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl+'/all',
            aaSorting: [], //disabled initial sorting
            columns: [
                //Table Column Header Collection

                { data: "code" },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="#" class="editView"  data-id="' + data.employee_department_id + '" >'+ data.name +'</a>';

                }
                },
                { data: "status" },
                {
                    data: null, render: function (data, type, row) {

                    return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.employee_department_id + '"><i class="fa fa-edit"></i> Edit</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.employee_department_id + '"><i class="fa fa-trash-o"></i> Delete</a>';

                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#DepartmentGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#DepartmentGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#DepartmentGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    $('#DepartmentGrid').on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);
        error.hide();
        success.hide();

        var id = $(this).data('id');

        edit(id);
        $('.modal-title').html("Edit Department");
        $('#mdlCreateDepartment').modal('show');
    });

    var form1 = $('#Form_Departments');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    //--------------------Form Validation Functions-----------------------//
    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        //debugger;


        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message school
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                //Field Validation Rule

                code: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error school to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error school to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success school to the control group
            },

            submitHandler: function (form) {
                //success1.show();
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
        loader.show();

        //USAGE: $("#form").serializefiles();
        var departments = $("#Form_Departments").serializefiles();
        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : departments,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                //debugger;
                loader.hide();

                if(result.status == "success"){
                    ShowMessage("success", result.message);
                    reloadGrid();
                    $('#mdlCreateDepartment').modal('hide');
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

        /*var error = $('#Form_School .alert-danger');
         var success = $('#Form_School .alert-success');*/

        message = '<button data-close="alert" class="close"></button>'+ message;

        if (type == "error") {
            error1.html(message);
            error1.show();
        }else if(type=="success")
        {
            success1.html(message);
            success1.show();
        }

    }
    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
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

    function showEdit(data) {
        if (data == null) return;

        alert(data.employee_department_id);
        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#'+key).val(val);
        });

        EmployeeDepartmentEditIdFld.val(data.employee_department_id);
        //Fire class on change, fills the batches
        //StudentClassFld.trigger('change');

        //Disabled some fields
       // disabledField(true);
    }

    $('#btnUpload').click(function(){
        ModalUploadFile.modal('show');
    });

    // Delete record
    $('#DepartmentGrid').on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');
        EmployeeDepartmentIdFld.val(id);
        loaderDelete.hide();

        $('#mdlDeleteClass').modal('show');


    });

    $('#btnDelete').click(function(){

        deleteData(EmployeeDepartmentIdFld.val());
    });

    function deleteData(id) {

        loaderDelete.show();

        var dept = EmployeeDepartment;

        //Get values
        dept.employee_department_id = id;

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : dept,
            dataType: 'jsonp',
            success : function(result){

                loaderDelete.hide();

                if(result.status == "success"){

                    reloadGrid();
                    $('#mdlDeleteClass').modal('hide');
                }else {
                    ShowDeleteMessage("error", result.message);
                }

            },

        });
    }
    function ShowDeleteMessage(type, message){
        if (message == 'undefined') return;

        var error = $('#mdlDeleteClass .alert-danger');
        var success = $('#mdlDeleteClass .alert-success');

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
    function showPopup() {
        $('#Form_Departments').trigger("reset");
        EmployeeDepartmentIdFld.val("0");
        $('#mdlCreateDepartment .modal-title').html("Create Department");
        $('#mdlCreateDepartment').modal('show');
    }

    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            handleValidation();
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
        addView: function () {
            showPopup();
        },
    };
}();
