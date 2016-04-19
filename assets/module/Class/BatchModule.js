var BatchModule = function () {

    var Batch = { batch_id:0 };

    //Global
   /* var class_id=0;
    var batch_id=0;*/

    var ClassBatchFld = $('#class_batch_name');
    var ClassFld = $('#class_name');


    //Field Declaration Section
    var ClassIdFld = $('#Form_Batch #class_id');
    var BatchIdFld = $('#Form_Batch #batch_id');

    var StartDateFld = $('#Form_Batch #start_date');
    var EndDateFld = $('#Form_Batch #end_date')

    /*var BatchIdFld = $('#Form_Batch #batch_id');
    var ClassIdFld = $('#Form_Batch #class_id');
    var NameFld = $('#Form_Batch #name');
    var StartDateFld = $('#Form_Batch #start_date');
    var EndDateFld = $('#Form_Batch #end_date');*/


    var BatchGrid = $('#BatchGrid');
    var ModalCreateBatch = $('#mdlCreateBatch');
    var ModalDeleteBatch = $('#mdlDeleteBatch');


    var form1 = $('#Form_Batch');
    var error = $('#mdlCreateBatch .alert-danger');
    var success = $('#mdlCreateBatch .alert-success');

    error.hide();
    success.hide();


    var loader = $("#Form_Batch #loader");
    loader.hide();

    var loaderDelete = $("#mdlDeleteBatch #loader");
    loaderDelete.hide();


    var loadGridUrl = baseApiUrl + "batches/all_class_batches/";
    var editUrl = baseApiUrl + "batches/find_batch/";
    var saveUrl = baseApiUrl + "batches/save";
    var deleteUrl = baseApiUrl + "batches/delete";
    var listUrl = baseAppUrl + "batches/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        var class_id = fetchClassId();

        loadGridUrl = loadGridUrl + class_id;
        var dataSet = [];

        dataTable = BatchGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            /*language: {
                emptyTable: "No records available - Got it?",
            },*/

            columns: [
                //Table Column Header Collection
                {
                    data: null, render: function (data, type, row) {
                    return '<a href="../../classes/edit/'+ data.batch_id +'" >'+ data.name +'</a>';
                }
                },
                {
                    data: "start_date", render: function (data, type, row) {
                        return (moment(data).format("DD-MMM-YYYY"));
                    }
                },
                {
                    data: "end_date", render: function (data, type, row) {
                        return (moment(data).format("DD-MMM-YYYY"));
                    }
                },
                {data:'roll_no_prefix'},
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
    BatchGrid.on( 'click', 'a.editView', function (e) {
        //alert('my edit'+id);

        var id = $(this).data('id');
        edit(id);
        $('#mdlCreateBatch .modal-title').html("Edit Batch");
        ModalCreateBatch.modal('show');
    });

    // Delete record
    BatchGrid.on( 'click', 'a.deleteView', function (e) {
        var id = $(this).data('id');

        showDelete(id);
        ModalDeleteBatch.modal('show');

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
        var form1 = $('#Form_Batch');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message batch
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                //Field Validation Rule

                name: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_date: {
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

        var batch = form1.serializefiles();

        debugger;
        //fetchClassId();

        //Get values
        /* batch.batch_id = BatchIdFld.val();
         batch.class_id = ClassIdFld.val();
         batch.name = NameFld.val();
         batch.start_date = StartDateFld.val();
         batch.end_date = EndDateFld.val()*/

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: batch,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success: function (result) {
                debugger;
                loader.hide();

                if (result.status == "success") {

                    reloadGrid();
                    ModalCreateBatch.modal('hide');
                } else {
                    ShowMessage("error", result.message);
                }
            },
        });

    }

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('#mdlCreateBatch .alert-danger');
        var success = $('#mdlCreateBatch .alert-success');

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


        //This batch id will be set in dropdown list
        //BatchIdFld.val(data.batch_id);

        //Set values

        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#Form_Batch #'+key).val(val);
        });

        StartDateFld.val(GetDateFormatOnly(data.start_date));
        EndDateFld.val(GetDateFormatOnly(data.end_date));

        //Set values
        /*BatchIdFld.val(data.batch_id);
        NameFld.val(data.name);
        StartDateFld.val(GetDateFormatOnly(data.start_date));
        EndDateFld.val(GetDateFormatOnly(data.end_date));*/
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
        $('#Form_Batch').clearForm();
        ClassIdFld.val(fetchClassId());
        BatchIdFld.val("0");

        $('#mdlCreateBatch .modal-title').html("Create Batch");

        ModalCreateBatch.modal('show');
    }

    function deleteData(id) {
        loaderDelete.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        //var batch = Batch;
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
                loaderDelete.hide();

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

    //--------------------End Form Validation Functions-----------------------//


    //--------------------Other Functions-----------------------//
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

    var fetchClassId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');

        //set in global
        var class_id = params[params.length - 1];
        return class_id;
    }
    //--------------------End Other Functions-----------------------//



    //--------------------Edit functionality-----------------------//
    var fetchBatchId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');

        //set in global
        var batch_id = params[params.length - 1];
        return batch_id;
    }
    function setBatchName(){
        //debugger;
        var batch_id = fetchBatchId();

        var loadDDUrl = baseApiUrl + "batches/find_batch/"+batch_id;

        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                var data = result.data[0];
                ClassBatchFld.text(data.class_name +' - '+data.name+' ('+ GetDateFormatOnly(data.start_date) +' to '+ GetDateFormatOnly(data.end_date) +' )');
            }
        });
    }

    function setClassName(){
        debugger;
        var class_id = fetchClassId();

        var loadDDUrl = baseApiUrl + "classes/find_class/"+class_id;

        var url = loadDDUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (result) {
                // Handle the complete event
                var data = result.data[0];
                ClassFld.text(data.name);
            }
        });
    }
    //--------------------End Edit functionality-----------------------//

    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            handleDateTime();
            handleValidation();

            setClassName();
            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
        edit : function(){
            setBatchName();
        },
        addView: function () {
            showPopup();
        },
    };
}();
