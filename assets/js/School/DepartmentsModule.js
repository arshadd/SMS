var DepartmentsModule = function () {

    //Create Batch
    var School = { school_id: 0, code: '', name: '', description: '', address: '', phone:'', email:'', website:'', logo:''};

    //Field Declaration Section

    var EmployeeDepartmentIdFld = $('#Form_Departments #employee_department_id');
    var CodeFld = $('#Form_Departments #code');

    var loader = $("#Form_Departments #loader");
    loader.hide();

    var error = $('#mdlCreateDepartment .alert-danger');
    var success = $('#mdlCreateDepartment .alert-success');

var loadGridUrl =  baseApiUrl + "employeedepartments/all_employeedepartments";
    var editUrl = baseApiUrl + "employeedepartments/find_department/";
    var saveUrl = baseApiUrl + "employeedepartments/save";
    var deleteUrl = baseApiUrl + "schools/delete";
    var listUrl = baseAppUrl + "Employee_Department/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        var dataSet = [];

        dataTable = $('#DepartmentGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
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
        $('.modal-title').html("Edit Student");
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


        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#'+key).val(val);
        });

        //Fire class on change, fills the batches
        //StudentClassFld.trigger('change');

        //Disabled some fields
       // disabledField(true);
    }

    $('#btnUpload').click(function(){
        ModalUploadFile.modal('show');
    });


    /* function showDelete(id) {
     if (id == null) return;

     //Set values
     BatchIdFld.val(id);
     }
     $('.modal').on('hidden.bs.modal', function(){
     $(this).find('form')[0].reset();
     });*/
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
