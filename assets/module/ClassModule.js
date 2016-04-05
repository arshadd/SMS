var ClassModule = function () {

    //Create Class
    var Class = { class_id: 0, code: '', name: '', section_name: ''};

    //Field Declaration Section
    
    var ClassIdFld = $('#Form_Class #class_id');
    var CodeFld = $('#Form_Class #code');
    var NameFld = $('#Form_Class #name');
    var SectionNameFld = $('#Form_Class #section_name');
    

    var loadGridUrl = baseApiUrl + "classes/all_classes";
    var editUrl = baseApiUrl + "classes/find_class/";
    var saveUrl = baseApiUrl + "classes/save";
    var deleteUrl = baseApiUrl + "classes/delete/";
    var listUrl = baseAppUrl + "classes/all_classes";

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Class');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
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
       
        var cls = Class;
        debugger;

        //Get values

        cls.class_id = ClassIdFld.val();
        cls.code = CodeFld.val();
        cls.name = NameFld.val();
        cls.section_name = SectionNameFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : cls,
            dataType: 'jsonp',
            success : function(result){
                debugger;
                if(result.status == "success"){
                    ShowMessage("success", result.message);
                }else {
                    ShowMessage("error", result.message);
                }
                //alert('success'+result);
            },
            failed : function(result){
                if(result.status == "failed") {
                    ShowMessage("error", result.message);
                }
            },
            /*complete: function (result) {
                debugger;
                alert('complete'+result);
                // Handle the complete event
                /!*var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=Class Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }*!/
            }*/
        });
    }

    function loadAll() {
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
    }
    

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('#mdlCreateClass .alert-danger');
        var success = $('#mdlCreateClass .alert-success');

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

    function ShowSuccessMessage() {
        var message = decodeURIComponent(getUrlVars()["message"]);
        ShowMessage("success", message);
    }
   
    var loadGrid = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#ClassGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection
                
                { data: "code" },
                { data: "name" },
                { data: "section_name" },
                { data: "section_name" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.Class Id + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        //return '<a href="Edit/' + data.ClassId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';

                        return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.class_id + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },

                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Class");
                    $('#mdlCreateClass').modal('show');
                });
            }
        });

        jQuery('#ClassGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#ClassGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#ClassGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }
/*

    var loadGrid2 = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#ClassGrid').DataTable({
        });

        jQuery('#ClassGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#ClassGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#ClassGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }
*/


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
        ClassIdFld.val(data.class_id);
        CodeFld.val(data.code);
        NameFld.val(data.name);
        SectionNameFld.val(data.section_name);
    }

    function showPopup() {
        $('#Form_Class').trigger("reset");
        $('.modal-title').html("Create Class");
        $('#mdlCreateClass').modal('show');
    }
   
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
    //                window.location = listUrl + "?message=Class Information Deleted";
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

    return {
        //main function to initiate the module
        validate : function(){
            handleValidation();
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
