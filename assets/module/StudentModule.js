var StudentModule = function () {

    //Create Batch
    var School = { school_id: 0};


    //Global
    var batch_id=0;

    //Field Declaration Section

    var StudentIdFld = $('#Form_Student #student_id');
    var UserIdFld = $('#Form_Student #user_id');

    var PhotoFld = $('#Form_Student #photo');
    var AdmissionNumberFld = $('#Form_Student #admission_no');
    var AdmissionDateFld = $('#Form_Student #admission_date');
    var DateOfBirthFld = $('#Form_Student #date_of_birth');

    var StudentClassFld = $('#Form_Student #class_id');
    var StudentBatchFld = $('#Form_Student #batch_id');



    var StudentGrid = $('#StudentGrid');
    var ModalCreateStudent = $('#mdlCreateStudent');
    var ModalDeleteStudent = $('#mdlDeleteStudent');

    var form1 = $('#Form_Student');
    var error = $('#mdlCreateStudent .alert-danger');
    var success = $('#mdlCreateStudent .alert-success');

    error.hide();
    success.hide();

    var loader = $("#Form_Student #loader");
    loader.hide();


    var loadGridUrl = baseApiUrl + "students/all_students";
    var editUrl = baseApiUrl + "students/find_student/";
    var saveUrl = baseApiUrl + "students/save";
    var deleteUrl = baseApiUrl + "students/delete";
    var listUrl = baseAppUrl + "students/index";
    var newUrl = baseApiUrl + "students/new_student";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        var dataSet = [];

        dataTable = StudentGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            columns: [
                //Table Column Header Collection

                {
                    data: null, render: function (data, type, row) {
                    return '<img src="' + baseAppImageUrl+ data.photo + '" style="width:30px;heigh:30px;" />';
                }
                },
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="#" class="editView" data-id="' + data.student_id + '">'+ data.first_name +' '+data.middle_name +', '+ data.last_name +'</a>';
                }
                },
                { data: "gender" },
                { data: "admission_no" },
                { data: "class_name" },
                { data: "batch_name" },
                { data: "class_roll_no" },
                {
                    data: null, render: function (data, type, row) {
                    // Combine the first and last names into a single table field
                    return '<a href="edit/'+ data.student_id +'" class="btn btn-default btn-xs purple"><i class="fa fa-key"></i> Manage</a>'+
                        '| <a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.student_id + '"><i class="fa fa-edit"></i> Edit</a>';
                        //'| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.student_id + '"><i class="fa fa-trash-o"></i> Delete</a>';

                    //return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.student_id + '"><i class="fa fa-edit"></i> Edit</a>';
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#StudentGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#StudentGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#StudentGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    StudentGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);
        error.hide();
        success.hide();

        var id = $(this).data('id');
        edit(id);
        $('.modal-title').html("Edit Student");
        ModalCreateStudent.modal('show');
    });

    // Delete record
    StudentGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        error.hide();
        success.hide();

        showDelete(id);
        ModalDeleteStudent.modal('show');

        //deleteData(id);
    });

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//

    function loadAll() {
        //Todo
        fillDropDownClasses();
    }
    StudentClassFld.on('change', function(){
        fillDropDownBatches();
    });
    function fillDropDownClasses() {

        var loadDDUrl = baseApiUrl + "classes/all_classes";

        StudentClassFld.empty();
        StudentClassFld.append($("<option     />").val(0).text("Select class"));
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
                    StudentClassFld.append($("<option />").val(this.class_id).text(this.name));
                });
            }
        });
    }

    function fillDropDownBatches() {
        var class_id = StudentClassFld.val();
        var loadDDUrl = baseApiUrl + "batches/all_class_batches/"+class_id;

        StudentBatchFld.empty();
        StudentBatchFld.append($("<option     />").val(0).text("Select batch"));
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
                    StudentBatchFld.append($("<option     />").val(this.batch_id).text(this.name));
                });

                StudentBatchFld.val(batch_id);
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

                admission_no: {
                    required: true
                },
                admission_date: {
                    required: true
                },

                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },

                batch_id: {
                    required: true
                },

                date_of_birth: {
                    required: true
                },

                address_line1: {
                    required: true
                },
                phone1: {
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

        debugger;

        //Get values

        var student = form1.serializefiles();
        //alert(student);
      /*  batch.batch_id = BatchIdFld.val();
        batch.class_id = ClassIdFld.val();
        batch.name = NameFld.val();
        batch.start_date = StartDateFld.val();
        batch.end_date = EndDateFld.val()
*/
        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : student,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                //debugger;
                loader.hide();

                if(result.status == "success"){
                    /*var photo = result.data['photo'];
                    if(photo != null)
                        PhotoFld.attr("src", baseAppImageUrl + photo);

                    ShowMessage("success", result.message);*/
                    reloadGrid();
                    ModalCreateStudent.modal('hide');
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

    function showEdit(data) {
        if (data == null) return;

        //This batch id will be set in dropdown list
        batch_id = data.batch_id;

        //Set values
        /*BatchIdFld.val(data.batch_id);
        NameFld.val(data.name);
        StartDateFld.val(GetDateFormatOnly(data.start_date));
        EndDateFld.val(GetDateFormatOnly(data.end_date));*/

        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#'+key).val(val);
        });

        //Fire class on change, fills the batches
        StudentClassFld.trigger('change');


        PhotoFld.attr("src",baseAppImageUrl+ data.photo);
        AdmissionDateFld.val(GetDateFormatOnly(data.admission_date));
        DateOfBirthFld.val(GetDateFormatOnly(data.date_of_birth));

        //Disabled some fields
        disabledField(true);
    }

    $('#btnDelete').click(function(){
        deleteData(StudentIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        //Set values
        StudentIdFld.val(id);
    }
    function showPopup() {

        //Get Auto increment Admission number

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
                AdmissionNumberFld.val(newRecord.new_student_id);
            },
            fail: function (result) {
            }
        });


        $('#Form_Student').trigger("reset");
        error.hide();
        success.hide();

        StudentIdFld.val("0");
        UserIdFld.val("0");
        batch_id = 0;
        var d = new Date();
        AdmissionDateFld.val(GetDateFormatOnly(d.yyyymmdd()));
        
        PhotoFld.attr("src", DEFAULT_STUDENT_IMAGE);
        //Enables some fields
        disabledField(false);


        $('.modal-title').html("Create Student");
        ModalCreateStudent.modal('show');
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
            StudentClassFld.attr('disabled','disabled');
            StudentBatchFld.attr('disabled','disabled');

        }else {
            StudentClassFld.removeAttrs('disabled');
            StudentBatchFld.removeAttrs('disabled');
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
    };
}();
