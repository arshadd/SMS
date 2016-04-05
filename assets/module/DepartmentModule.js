var DepartmentModule = function () {
  
    //Create Class
    var Department = { DepartmentId: 0, Code: '', Name: '', Description: '', Status: '' };

    //Field Declaration Section

    var DepartmentIdFld = $('#DepartmentId');
    var CodeFld = $('#Code');
    var NameFld = $('#Name');
    var DescriptionFld = $('#Description');
    var StatusFld = $('#Status');


    var loadGridUrl = baseApiUrl + "Department/List";
    var editUrl = baseApiUrl + "Department/Find/";
    var saveUrl = baseApiUrl + "Department/Save";
    var deleteUrl = baseApiUrl + "Department/Delete/";
    var listUrl = baseAppUrl + "Employee/Department";

    var handleValidation = function () {

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Department');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        //debugger;
        if (form1.validate == null) return;

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                //Field Validation Rule

                Code: {
                    required: true
                },
                Name: {
                    required: true
                },
                Description: {
                    required: true
                },
                Status: {
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

        var course = Department;
        debugger;

        //Get values

        course.DepartmentId = DepartmentIdFld.val();
        course.Name = NameFld.val();
        course.Description = DescriptionFld.val();
        course.Status = StatusFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: course,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);

                if (obj.Success == true) {
                    window.location = listUrl + "?message=Department Information Saved";
                    //ShowMessage("success", "Department Information Saved");
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }

    
    function ShowMessage(type, message) {
        if (message == 'undefined') return;

        var error = $('.alert-danger');
        var success = $('.alert-success');

        message = '<button data-close="alert" class="close"></button>' + message;

        if (type == "error") {
            error.html(message);
            error.show();
        } else if (type == "success") {
            success.html(message);
            success.show();
        }
    }
   

    var loadGrid = function () {

        //Show success message
        var message = decodeURIComponent(getUrlVars()["message"]);
        ShowMessage("success", message);

        var dataSet = [];

        var newTable = $('#example2').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection

                { data: "Name" },
                { data: "Description" },
                { data: "Status" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.DepartmentId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        //return '<a href="View/' + data.DepartmentId + '" class="btn btn-default btn-xs purple"><i class="fa fa-eye"></i> View</a>' +
                        //        '| <a href="Edit/' + data.DepartmentId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';

                        return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.DepartmentId + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Department");
                    $('#mdlCreateDepartment').modal('show');
                });
            }
        });

        jQuery('#example2_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#example2_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#example2_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


    var edit = function (id) {
    
        var url = editUrl + id;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (data) {
                //debugger;
                showEdit(data.data);
            },
            fail: function (result) {
            }
        });
    }

    function showEdit(data) {
        if (data == null) return;

        //Set values

        DepartmentIdFld.val(data.DepartmentId);
        NameFld.val(data.Name);
        DescriptionFld.val(data.Description);
        StatusFld.val(data.Status);
    }

    //var view = function () {
    //    var pathname = window.location.pathname;

    //    var params = pathname.split('/');
    //    var id = params[params.length - 1];

    //    //alert(id);

    //    var url = editUrl + id;
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'GET',
    //        dataType: 'jsonp',
    //        success: function (data) {
    //            //debugger;
    //            showView(data.data);
    //        },
    //        fail: function (result) {
    //        }
    //    });
    //}

    //function showView(data) {
    //    debugger;
    //    if (data == null) return;

    //    //Set values

    //    DepartmentIdFld.text(data.DepartmentId);
    //    NameFld.text(data.Name);
    //    DescriptionFld.text(data.Description);
    //    StatusFld.text(data.Status);

    //    $(".edit").attr("href", "../Edit/" + data.DepartmentId);
    //};

    //function deleteData() {
    //    var pathname = window.location.pathname;

    //    var params = pathname.split('/');
    //    var id = params[params.length - 1];

    //    //alert(id);

    //    var url = deleteUrl + id;
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'POST',
    //        dataType: 'jsonp',
    //        complete: function (result) {
    //            // Handle the complete event
    //            var obj = JSON.parse(result.responseText);

    //            if (obj.Success == true) {
    //                window.location = listUrl + "?message=Information Deleted";
    //            } else {
    //                ShowMessage("error", obj.Message);
    //            }
    //        }
    //    });
    //}
    //var del = function () {
    //    $(".delete").on("click", function () {
    //        if (confirm("Are you sure want to delete?")) {
    //            deleteData();
    //        }
    //    });
    //};


    function showPopup() {
        $('#Form_Department').trigger("reset");
        $('.modal-title').html("Create Department");
        $('#mdlCreateDepartment').modal('show');
    }

    return {
        //main function to initiate the module
        validate: function () {
            handleValidation();
        },
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
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
