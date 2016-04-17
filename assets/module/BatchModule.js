var BatchModule = function () {

    //Create Batch
    var Batch = { batch_id: 0, class_id: 0, name: '', start_date: '', end_date: ''};

    //Field Declaration Section

    var BatchIdFld = $('#Form_Batch #batch_id');
    var ClassIdFld = $('#Form_Batch #class_id');
    var NameFld = $('#Form_Batch #name');
    var StartDateFld = $('#Form_Batch #start_date');
    var EndDateFld = $('#Form_Batch #end_date');


    var BatchGrid = $('#BatchGrid');
    var ModalCreateBatch = $('#mdlCreateBatch');
    var ModalDeleteBatch = $('#mdlDeleteBatch');


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

        var class_id = ClassIdFld.val();

        loadGridUrl = loadGridUrl + class_id;
        var dataSet = [];

        dataTable = BatchGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            /*language: {
                emptyTable: "No records available - Got it?",
            },*/
            "columnDefs": [
                { "visible": false, "targets": 0 }
            ],

            columns: [
                //Table Column Header Collection
                {data: "class_name"},
                {data: "name"},
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

            /*"fnDrawCallback": function ( settings ) {
                console.log("hello");
                var api = this.api();//Had to change this from this.api();
                var rows = api.rows({page:'current'}).nodes(); // Giving an error
                var last = null;

                debugger;
                api.column(0, {page:'current'} ).data().each( function ( group, i ) {

                    //debugger;
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="4">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            },*/

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
            errorBatch: 'help-block', // default input error message batch
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

        var batch = Batch;

        fetchClassId();

        //Get values

        batch.batch_id = BatchIdFld.val();
        batch.class_id = ClassIdFld.val();
        batch.name = NameFld.val();
        batch.start_date = StartDateFld.val();
        batch.end_date = EndDateFld.val()

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : batch,
            dataType: 'jsonp',
            success : function(result){
                debugger;
                loader.hide();

                if(result.status == "success"){
                    /*var save_id = result.data.batch_id;
                     //alert(save_id);
                     BatchIdFld.val(save_id);*/

                    reloadGrid();
                    SubjectModule.refreshBatchDropDown();
                    ModalCreateBatch.modal('hide');
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

        //Set values
        BatchIdFld.val(data.batch_id);
        NameFld.val(data.name);
        StartDateFld.val(GetDateFormatOnly(data.start_date));
        EndDateFld.val(GetDateFormatOnly(data.end_date));
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
                format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    var fetchClassId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');
        var class_id = params[params.length - 1];
        ClassIdFld.val(class_id);
    }

    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            handleDateTime();
            fetchClassId();
            handleValidation();

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            fetchClassId();
            loadGrid();
        },
        addView: function () {
            showPopup();
        },
    };
}();
