var BatchModule = function () {

    //Create Batch
    var Batch = { batch_id: 0, code: '', name: '', section_name: ''};

    //Field Declaration Section

    var BatchIdFld = $('#Form_Batch #batch_id');
    var CodeFld = $('#Form_Batch #code');
    var NameFld = $('#Form_Batch #name');
    var SectionNameFld = $('#Form_Batch #section_name');

    var loader = $("#Form_Batch #loader");
    loader.hide();

    var loadGridUrl = baseApiUrl + "batches/all_class_batches/";
    var editUrl = baseApiUrl + "batches/find_batch/";
    var saveUrl = baseApiUrl + "batches/save";
    var deleteUrl = baseApiUrl + "batches/delete";
    var listUrl = baseAppUrl + "batches/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        //Get class id from parameter
        var pathname = window.location.pathname;
        var params = pathname.split('/');
        var class_id = params[params.length - 1];

        loadGridUrl = loadGridUrl + class_id;
        var dataSet = [];

        dataTable = $('#BatchGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            /*language: {
                emptyTable: "No records available - Got it?",
            },*/
            columns: [
                //Table Column Header Collection
                {data: "name"},
                {data: "start_date"},
                {data: "end_date"},
                {
                    data: null, render: function (data, type, row) {
                    // Combine the first and last names into a single table field
                    return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.batch_id + '"><i class="fa fa-edit"></i> Edit</a>' +
                        '| <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="' + data.batch_id + '"><i class="fa fa-trash-o"></i> Delete</a>';

                    //return '<a href="#" batch="btn btn-default btn-xs purple editView" data-id="' + data.batch_id + '"><i batch="fa fa-edit"></i> Edit</a>';
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#BatchGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#BatchGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#BatchGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    // Edit record
    $('#BatchGrid').on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);

        var id = $(this).data('id');
        edit(id);
        $('.modal-title').html("Edit Batch");
        $('#mdlCreateBatch').modal('show');
    });

    // Delete record
    $('#BatchGrid').on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        showDelete(id);
        $('#mdlDeleteBatch').modal('show');

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

        var form1 = $('#Form_Batch');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message batch
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
                section_name: {
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
                    .closest('.form-group').addBatch('has-error'); // set error batch to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeBatch('has-error'); // set error batch to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeBatch('has-error'); // set success batch to the control group
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

        var batch = Batch;
        debugger;

        //Get values

        batch.batch_id = BatchIdFld.val();
        batch.code = CodeFld.val();
        batch.name = NameFld.val();
        batch.section_name = SectionNameFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : batch,
            dataType: 'jsonp',
            success : function(result){
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.batch_id;
                     //alert(save_id);
                     BatchIdFld.val(save_id);*/

                    reloadGrid();
                    $('#mdlCreateBatch').modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
                //parent.location.reload();
                //alert('success'+result);
            },
            /*failed : function(result){
             alert('failed');
             loader.hide();
             /!*if(result.status == "failed") {
             ShowMessage("error", result.message);
             }*!/
             }*/
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

        var error = $('#mdlCreateBatch .alert-danger');
        var success = $('#mdlCreateBatch .alert-success');

        message = '<button data-close="alert" batch="close"></button>'+ message;

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
        BatchIdFld.val(data.batch_id);
        CodeFld.val(data.code);
        NameFld.val(data.name);
        SectionNameFld.val(data.section_name);
    }

    $('#btnDelete').click(function(){
        deleteData(BatchIdFld.val());
    });


    function showDelete(id) {
        if (id == null) return;

        //Set values
        BatchIdFld.val(id);
    }

    function showPopup() {
        $('#Form_Batch').trigger("reset");
        $('.modal-title').html("Create Batch");
        $('#mdlCreateBatch').modal('show');
    }

    function deleteData(id) {
        loader.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var batch = Batch;
        //debugger;

        //Get values
        batch.batch_id = id;

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : batch,
            dataType: 'jsonp',
            success : function(result){
                //debugger;
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.batch_id;
                     //alert(save_id);
                     BatchIdFld.val(save_id);*/

                    reloadGrid();
                    $('#mdlDeleteBatch').modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }

                //$('#mdlCreateBatch').modal('hide');
                //alert(result.message);
                /*if(result.status == "success"){
                 window.location = listUrl + "?message="+result.message;
                 }*/
                /*else {
                 ShowMessage("error", result.message);
                 }*/
                //alert('success'+result);
            },
            /*failed : function(result){
             loader.hide();
             alert(result.message);

             /!*if(result.status == "failed") {
             ShowMessage("error", result.message);
             }*!/
             },*/
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

    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                //format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    return {
        //main function to initiate the module

        validate : function(){
            handleValidation();

            handleDateTime();
        },
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
        /*loadGrid2: function () {
         if (!jQuery().dataTable) {
         return;
         }
         loadGrid2();
         },*/
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
