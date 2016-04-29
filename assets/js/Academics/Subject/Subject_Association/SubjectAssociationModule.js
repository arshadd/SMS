var SubjectAssociationModule = function () {

    //Field Declaration Section
    var EmployeeSubjectIdFld = $('#Form_Subject_Association #employees_subjects_id');



    var BatchFld = $('#Form_Subject_Search #subject_batch_id');

    var EmployeeFld = $("#Form_Subject_Association #employee_id");
    var SubjectFld = $("#Form_Subject_Association #subject_id");

    //Global
    var class_id=0;
    var batch_id=0;

    var form1 = $('#Form_Subject_Association');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);



    var SubjectAssociationGrid = $('#SubjectAssociationGrid');
    var ModalCreateSubject = $('#mdlCreateSubjectAssociation');
    var ModalDeleteSubject = $('#mdlDeleteSubjectAssociation');

    var loader = $("#Form_Subject_Association #loader");
    loader.hide();

    var loaderDelete = $("#mdlDeleteSubjectAssociation #loader");
    loaderDelete.hide();


    var loadGridUrl = baseApiUrl + "employees_subjects/all_batch_employees_subjects/";
    var editUrl = baseApiUrl + "employees_subjects/find_employee_subject/";
    var saveUrl = baseApiUrl + "employees_subjects/save";
    var deleteUrl = baseApiUrl + "employees_subjects/delete";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function (batch_id) {

        loadGridUrl = loadGridUrl + batch_id;

        dataTable = SubjectAssociationGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            displayLength : 25,
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
                    return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.employees_subjects_id + '"><i class="fa fa-edit"></i> Edit</a>';
                        //'| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.employees_subjects_id + '"><i class="fa fa-trash-o"></i> Delete</a>';
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#SubjectAssociationGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SubjectAssociationGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SubjectAssociationGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    SubjectAssociationGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);

        var id = $(this).data('id');
        edit(id);
        $('#mdlCreateSubjectAssociation .modal-title').html("Edit Employee's Subject Association");
        ModalCreateSubject.modal('show');
    });

    // Delete record
    SubjectAssociationGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        debugger;
        showDelete(id);
        ModalDeleteSubject.modal('show');

        //deleteData(id);
    });

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//


    //------------------Form Validation Functions------------------//
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
            errorSubject: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                //Field Validation Rule
                code: {
                    required: true
                },
                name: {
                    required: true
                },
                /* max_weekly_classes: {
                 required: true
                 },
                 credit_hours: {
                 required: true
                 }*/
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
        loader.show();

        var subjectAssociation = form1.serializefiles();
        //debugger;

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: subjectAssociation,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                // debugger;
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.subject_id;
                     //alert(save_id);
                     SubjectIdFld.val(save_id);*/

                    reloadGrid();
                    ModalCreateSubject.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
                //parent.location.reload();
                //alert('success'+result);
            },
        });
    }

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('#mdlCreateSubject .alert-danger');
        var success = $('#mdlCreateSubject .alert-success');

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
            //console.log("key:"+key, ", val:"+val);
            $('#Form_Subject_Association #'+key).select2('val', val);
        });

        $('#employees_subjects_id').val(data.employees_subjects_id);
    }

    $('#btnDelete').click(function(){
        deleteData(EmployeeSubjectIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        var error = $('#mdlDeleteSubjectAssociation .alert-danger');
        error.hide();
        //Set values
        EmployeeSubjectIdFld.val(id);
    }

    function showPopup() {
        $('#Form_Subject_Association').clearForm();

        EmployeeSubjectIdFld.val("0");

        $('#mdlCreateSubjectAssociation .modal-title').html("Create Subject Association");
        ModalCreateSubject.modal('show');
    }

    function deleteData(id) {
        loaderDelete.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var subject_association = {employees_subjects_id:id};

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : subject_association,
            dataType: 'jsonp',
            success : function(result){
                //debugger;
                loaderDelete.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.subject_id;
                     //alert(save_id);
                     SubjectIdFld.val(save_id);*/

                    //reloadGrid();
                    ModalDeleteSubject.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }
    //--------------------End Form Validation Functions-----------------------//
    //--------------------Dropdown Functions-----------------------//
    function loadAll(){
        fillDropDownBatches();
        fillDropDownEmployee();

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
        var batch_id = BatchFld.val();
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
    function fillDropDownBatches() {
        var loadDDUrl = baseApiUrl + "batches/all_batches";

        BatchFld.empty();
        BatchFld.append($("<option     />").val("0").text("Select..."));
        BatchFld.select2('val','0');

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
                    BatchFld.append($("<option     />").val(this.batch_id).text(this.full_name));
                });


                BatchFld.trigger('change');
            }
        });
    }

    BatchFld.on('change', function(){
        var batch_id = $(this).val();

        if(batch_id==0){
            disableControl(true);
        }else{
            disableControl(false);
        }

        fillDropDownSubject();

        var url = loadGridUrl + batch_id;
        dataTable.ajax.url(url).load();
    });

    //--------------------End Dropdown Functions-----------------------//

    //--------------------Other Functions-----------------------//
    function disableControl(isDisable){
        if(isDisable){
            $('.addNewSubject').attr('disabled', 'disabled');
        }
        else {
            $('.addNewSubject').removeAttr('disabled');
        }
    }
    //--------------------End Other Functions-----------------------//


    return {
        //main function to initiate the module
        init : function(){
            handleValidation();
            loadAll();

            //initially load grid
            loadGrid(0);
        },
        addView: function () {
            showPopup();
        }
    };
}();
