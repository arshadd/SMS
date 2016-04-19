var ClassEmployeeModule = function () {

    //Field Declaration Section
    var EmployeeFld = $("#Form_Teacher #employee_id");
    var SubjectFld = $("#Form_Teacher #subject_id1");


    var EmployeeSubjectIdFld = $('#Form_Teacher #employees_subjects_id');


    var TeacherGrid = $('#TeacherGrid');
    var ModalCreateTeacher = $('#mdlCreateTeacher');
    var ModalDeleteTeacher = $('#mdlDeleteTeacher');

    var loader = $("#Form_Teacher #loader");
    loader.hide();

    var loaderDelete = $("#mdlDeleteTeacher #loader");
    loaderDelete.hide();


    var loadGridUrl = baseApiUrl + "employees_subjects/all_batch_employees_subjects/";
    var editUrl = baseApiUrl + "employees_subjects/find_employee_subject/";
    var saveUrl = baseApiUrl + "employees_subjects/save";
    var deleteUrl = baseApiUrl + "employees_subjects/delete";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();
        //debugger;
        var batch_id = fetchBatchId();

        loadGridUrl = loadGridUrl + batch_id;
        var dataSet = [];

        dataTable = TeacherGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            //bDestroy: true,

            /*language: {
             emptyTable: "No records available - Got it?",
             },*/
            columns: [
                //Table Column Header Collection
                {data: "employee_name"},
                {data: "subject_name"},
                {
                    data: null, render: function (data, type, row) {
                    // Combine the first and last names into a single table field
                    return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.employees_subjects_id + '"><i class="fa fa-edit"></i> Edit</a>' +
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.employees_subjects_id + '"><i class="fa fa-trash-o"></i> Delete</a>';
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#TeacherGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#TeacherGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#TeacherGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    TeacherGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);

        var id = $(this).data('id');
        edit(id);
        $('#mdlCreateTeacher .modal-title').html("Edit Teacher");
        ModalCreateTeacher.modal('show');
    });

    // Delete record
    TeacherGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        showDelete(id);
        ModalDeleteTeacher.modal('show');

        //deleteData(id);
    });

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//

    var form1 = $('#Form_Teacher');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    //--------------------Form Validation Functions-----------------------//
    var handleValidation = function () {

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        //debugger;


        if (form1.validate == null) return;
        //debugger;
        var validator = form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",

            rules: {
                //Field Validation Rule
                employee_id: {
                    required: true
                },
                subject_id1:{
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

        /*form1.validate();
        $( "#Form_Teacher #subject_id" ).rules( "add", {
            required: true
        });*/

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });


    }

    function save() {
        loader.show();

        //Get values
        var employee_subject = form1.serializefiles();

        /*subject.subject_id = TeacherIdFld.val();
        subject.batch_id = fetchBatchId();
        subject.code = CodeFld.val();
        subject.name = NameFld.val();
        subject.max_weekly_classes =MaxWeeklyClassesFld.val();
        subject.credit_hours = CreditHoursFld.val()*/

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: employee_subject,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                debugger;
                loader.hide();

                if (result.status == "success") {

                    reloadGrid();
                    ModalCreateTeacher.modal('hide');
                } else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('#mdlCreateTeacher .alert-danger');
        var success = $('#mdlCreateTeacher .alert-success');

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

        //Set values
        $.each(data, function(key, val){
            console.log("key:"+key, ", val:"+val);
            $('#Form_Teacher #'+key).val(val);
        });

        $('#Form_Teacher #employee_id').select2("val", data.employee_id);
        $('#Form_Teacher #subject_id1').select2("val", data.subject_id);

        /*TeacherIdFld.val(data.subject_id);
        CodeFld.val(data.code);
        NameFld.val(data.name);
        MaxWeeklyClassesFld.val(data.max_weekly_classes);
        CreditHoursFld.val(data.credit_hours);*/
    }

    $('#Form_Teacher #btnDelete').click(function(){
        deleteData(EmployeeSubjectIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        //Set values
        EmployeeSubjectIdFld.val(id);
    }

    function showPopup() {
        $('#Form_Teacher').clearForm();

        EmployeeSubjectIdFld.val("0");
        EmployeeFld.select2('val','');
        SubjectFld.select2('val','');

        $('#mdlCreateTeacher .modal-title').html("Create Teacher");
        ModalCreateTeacher.modal('show');
    }

    function deleteData(id) {
        loaderDelete.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var subject = Teacher;
        //debugger;

        //Get values
        subject.subject_id = id;

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : subject,
            dataType: 'jsonp',
            success : function(result){
                //debugger;
                loaderDelete.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.subject_id;
                     //alert(save_id);
                     TeacherIdFld.val(save_id);*/

                    reloadGrid();
                    ModalDeleteTeacher.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }
    //--------------------End Form Validation Functions-----------------------//

    //--------------------Drop down Functions-----------------------//
    function loadAll(){
        fillDropDownEmployee();
        fillDropDownSubject();

    }
    function fillDropDownEmployee() {
        var loadDDUrl = baseApiUrl + "employees/all_employees";

        EmployeeFld.empty();
        EmployeeFld.append($("<option     />").val(0).text("Select ..."));
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
                    EmployeeFld.append($("<option     />").val(this.employee_id).text(this.department_name +' - '+this.full_name));
                });
            }
        });
    }
    function fillDropDownSubject() {
        var batch_id = fetchBatchId();
        var loadDDUrl = baseApiUrl + "subjects/all_batch_subjects/"+batch_id;

        SubjectFld.empty();
        SubjectFld.append($("<option     />").val(0).text("Select ..."));
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
                    SubjectFld.append($("<option     />").val(this.subject_id).text(this.name));
                });
            }
        });
    }
    //--------------------End Drop down Functions-----------------------//

    //--------------------Other Functions-----------------------//
    var fetchBatchId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');

        //set in global
        var batch_id = params[params.length - 1];
        return batch_id;
    }

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
    //--------------------End Other Functions-----------------------//


    return {
        //main function to initiate the module
        init : function(){
            handleDateTime();
            handleValidation();
            loadAll();

            //initially load grid
            loadGrid();
        },
        addView: function () {
            showPopup();
        },
    };
}();
