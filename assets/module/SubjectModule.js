var SubjectModule = function () {

    //Create Subject
    var Subject = { subject_id:0, batch_id: 0, code:'', name: '', max_weekly_classes: '', credit_hours: ''};

    //Field Declaration Section

    var SubjectIdFld = $('#Form_Subject #subject_id');
    var BatchIdFld = $('#Form_Subject #batch_id');

    var CodeFld = $('#Form_Subject #code');
    var NameFld = $('#Form_Subject #name');
    var MaxWeeklyClassesFld = $('#Form_Subject #max_weekly_classes');
    var CreditHoursFld = $('#Form_Subject #credit_hours');

    var SubjectClassesFld = $('#Form_Subject_Search #subject_classes')
    var SubjectBatchesFld = $('#Form_Subject_Search #subject_batches');

    var SubjectGrid = $('#SubjectGrid');
    var ModalCreateSubject = $('#mdlCreateSubject');
    var ModalDeleteSubject = $('#mdlDeleteSubject');

    var loader = $("#Form_Subject #loader");
    loader.hide();


    var loadGridUrl = baseApiUrl + "subjects/all_batch_subjects/";
    var editUrl = baseApiUrl + "subjects/find_subject/";
    var saveUrl = baseApiUrl + "subjects/save";
    var deleteUrl = baseApiUrl + "subjects/delete";
    var listUrl = baseAppUrl + "subjects/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function (batch_id) {
        //ShowSuccessMessage();
        //debugger;
        // var batch_id = BatchIdFld.val();

        loadGridUrl = loadGridUrl + batch_id;
        var dataSet = [];

        dataTable = SubjectGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            //bDestroy: true,

            /*language: {
             emptyTable: "No records available - Got it?",
             },*/
            columns: [
                //Table Column Header Collection
                {data: "code"},
                {data: "name"},
                {data: "max_weekly_classes"},
                {data: "credit_hours"},
                {
                    data: null, render: function (data, type, row) {
                    // Combine the first and last names into a single table field
                    return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.subject_id + '"><i class="fa fa-edit"></i> Edit</a>' +
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.subject_id + '"><i class="fa fa-trash-o"></i> Delete</a>';
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#SubjectGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SubjectGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SubjectGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    SubjectGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);

        var id = $(this).data('id');
        edit(id);
        $('.modal-title').html("Edit Subject");
        ModalCreateSubject.modal('show');
    });

    // Delete record
    SubjectGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        showDelete(id);
        ModalDeleteSubject.modal('show');

        //deleteData(id);
    });

    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//


    //--------------------Form Validation Functions-----------------------//
    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        //debugger;
        var form1 = $('#Form_Subject');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

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
                max_weekly_classes: {
                    required: true
                },
                credit_hours: {
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

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
    }

    function save() {
        loader.show();

        var subject = Subject;
        debugger;

        //Get values

        subject.subject_id = SubjectIdFld.val();
        subject.batch_id = fetchBatchId();
        subject.code = CodeFld.val();
        subject.name = NameFld.val();
        subject.max_weekly_classes =MaxWeeklyClassesFld.val();
        subject.credit_hours = CreditHoursFld.val()

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : subject,
            dataType: 'jsonp',
            success : function(result){
                debugger;
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

    /*function loadAll() {
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
     }*/


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
                debugger;
                showEdit(data.data[0]);
            },
            fail: function (result) {
            }
        });
    }

    function showEdit(data) {
        if (data == null) return;

        //Set values
        SubjectIdFld.val(data.subject_id);
        CodeFld.val(data.code);
        NameFld.val(data.name);
        MaxWeeklyClassesFld.val(data.max_weekly_classes);
        CreditHoursFld.val(data.credit_hours);
    }

    $('#Form_Subject #btnDelete').click(function(){
        deleteData(SubjectIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        //Set values
        SubjectIdFld.val(id);
    }
    /*$('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });*/
    function showPopup() {
        $('#Form_Subject').trigger("reset");
        SubjectIdFld.val("0");
        $('.modal-title').html("Create Subject");
        ModalCreateSubject.modal('show');
    }

    function deleteData(id) {
        loader.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var subject = Subject;
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
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.subject_id;
                     //alert(save_id);
                     SubjectIdFld.val(save_id);*/

                    reloadGrid();
                    ModalDeleteSubject.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }
    /*var del = function () {
     $(".delete").on("click", function () {

     if (confirm("Are you sure want to delete?")) {
     deleteData();
     }
     });
     };*/

    //--------------------End Form Validation Functions-----------------------//

    function loadAll() {
        //Todo
        fillDropDownClasses();
        fillDropDownBatches();
    }

    function fillDropDownClasses() {
        var class_id = fetchClassId();
        var loadDDUrl = baseApiUrl + "classes/all_classes/";

        SubjectClassesFld.empty();
        SubjectClassesFld.append($("<option     />").val(0).text("Select class"));
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
                    if(this.class_id == class_id){
                        SubjectClassesFld.append($("<option selected='selected'/>").val(this.class_id).text(this.name));
                    }else {
                        SubjectClassesFld.append($("<option />").val(this.class_id).text(this.name));
                    }
                });
            }
        });
    }
    function fillDropDownBatches() {
        var class_id = fetchClassId();
        var loadDDUrl = baseApiUrl + "batches/all_class_batches/"+class_id;

        SubjectBatchesFld.empty();
        SubjectBatchesFld.append($("<option     />").val(0).text("Select batch"));
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
                    SubjectBatchesFld.append($("<option     />").val(this.batch_id).text(this.name));
                });
            }
        });
    }



    function disabledField(mark){
        if(mark){
            $('#btnAddSubject').attr('disabled','disabled');
        }else {
            $('#btnAddSubject').removeAttrs('disabled');
        }
    }
    SubjectBatchesFld.on('change', function(){
        var batch_id = this.value;

        if(batch_id==0){
            disabledField(true);
        }else {
            disabledField(false);
        }
        var url = loadGridUrl + batch_id;

        //alert();
        dataTable.ajax.url(url).load();

        //loadGrid(batch_id);
    });

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

    var fetchBatchId = function(){
        /*var pathname = window.location.pathname;
        var params = pathname.split('/');
        var class_id = params[params.length - 1];*/
        //ClassIdFld.val(class_id);
        //BatchIdFld.val("1");
        batch_id = SubjectBatchesFld.val();
        if(batch_id =='' || batch_id == null)
            batch_id="0";

        //batch_id = "1";
        return batch_id;
    }
    var fetchClassId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');
        var class_id = params[params.length - 1];
        if(class_id =='' || class_id == null)
            class_id=0;

        return class_id;
    }


    return {
        //main function to initiate the module
        init : function(){
            handleDateTime();
            handleValidation();
            loadAll();

            //initially load grid
            disabledField(true);
            loadGrid(0);
        },
        addView: function () {
            showPopup();
        },
        refreshBatchDropDown : function(){
            fillDropDownBatches();
            SubjectBatchesFld.change();
        },
    };
}();
