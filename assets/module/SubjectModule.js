var SubjectModule = function () {

    //Create Subject
    var Subject = { SubjectId: 0, Code: '', FirstName: '', LastName: '', DateOfBirth: '', Gender: '', DateOfJoining: '', DepartmentId: 0, DesignationId: 0, Qualification: '', TotalExperience: '', PresentAddress: '', PermanentAddress: '', Country: '', State: '', City: '', Mobile: '', Phone: '', Email: '', Photo: '', Status: '' };

    //Field Declaration Section
    
    var SubjectIdFld = $('#SubjectId');
    var CodeFld = $('#Code');
    var NameFld = $('#Name');
    var GradingSystemFld = $('#GradingSystem');
    

    var loadGridUrl = baseApiUrl + "Subject/List";
    var editUrl = baseApiUrl + "Subject/Find/";
    var saveUrl = baseApiUrl + "Subject/Save";
    var deleteUrl = baseApiUrl + "Subject/Delete/";
    var listUrl = baseAppUrl + "Subject/List";

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

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
                
                Code: {
                    required: true
                }, 
                Name: {
                    required: true
                }, 
                GradingSystem: {
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
                    .closest('.form-group').addSubject('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeSubject('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeSubject('has-error'); // set success class to the control group
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
       
        var Subject = Subject;
        debugger;

        //Get values
        
        Subject.SubjectId = SubjectIdFld.val();
        Subject.Code = CodeFld.val();
        Subject.Name = NameFld.val();
        Subject.GradingSystem = GradingSystemFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : Subject,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=Subject Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
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

        var error = $('.alert-danger');
        var success = $('.alert-success');

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

        var newTable = $('#SubjectGrid').DataTable({
            //dom: "Bfrtip",
            //ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection
                
                { data: "Code" }, 
                { data: "FirstName" }, 
                { data: "LastName" }, 
                { data: "DateOfBirth" }, 
                { data: "Gender" }, 
                { data: "DateOfJoining" }, 
                { data: "DepartmentId" }, 
                { data: "DesignationId" }, 
                { data: "Qualification" }, 
                { data: "TotalExperience" }, 
                { data: "PresentAddress" }, 
                { data: "PermanentAddress" }, 
                { data: "Country" }, 
                { data: "State" }, 
                { data: "City" }, 
                { data: "Mobile" }, 
                { data: "Phone" }, 
                { data: "Email" }, 
                { data: "Photo" }, 
                { data: "Status" }, 
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.Subject Id + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        //return '<a href="Edit/' + data.SubjectId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';

                        return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.SubjectId + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },

                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Subject");
                    $('#mdlCreateSubject').modal('show');
                });
            }
        });

        jQuery('#SubjectGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SubjectGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SubjectGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var loadGrid2 = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#SubjectGrid').DataTable({
        });

        jQuery('#SubjectGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SubjectGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SubjectGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
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
        
        SubjectIdFld.val(data.SubjectId);
        CodeFld.val(data.Code);
        FirstNameFld.val(data.FirstName);
        LastNameFld.val(data.LastName);
        DateOfBirthFld.val(data.DateOfBirth);
        GenderFld.val(data.Gender);
        DateOfJoiningFld.val(data.DateOfJoining);
        DepartmentIdFld.val(data.DepartmentId);
        DesignationIdFld.val(data.DesignationId);
        QualificationFld.val(data.Qualification);
        TotalExperienceFld.val(data.TotalExperience);
        PresentAddressFld.val(data.PresentAddress);
        PermanentAddressFld.val(data.PermanentAddress);
        CountryFld.val(data.Country);
        StateFld.val(data.State);
        CityFld.val(data.City);
        MobileFld.val(data.Mobile);
        PhoneFld.val(data.Phone);
        EmailFld.val(data.Email);
        PhotoFld.val(data.Photo);
        StatusFld.val(data.Status);
    }

    function showPopup() {
        $('#Form_Subject').trigger("reset");
        $('.modal-title').html("Create Subject");
        $('#mdlCreateSubject').modal('show');
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
        
    //    SubjectIdFld.text(data.SubjectId);
    //    CodeFld.text(data.Code);
    //    FirstNameFld.text(data.FirstName);
    //    LastNameFld.text(data.LastName);
    //    DateOfBirthFld.text(data.DateOfBirth);
    //    GenderFld.text(data.Gender);
    //    DateOfJoiningFld.text(data.DateOfJoining);
    //    DepartmentIdFld.text(data.DepartmentId);
    //    DesignationIdFld.text(data.DesignationId);
    //    QualificationFld.text(data.Qualification);
    //    TotalExperienceFld.text(data.TotalExperience);
    //    PresentAddressFld.text(data.PresentAddress);
    //    PermanentAddressFld.text(data.PermanentAddress);
    //    CountryFld.text(data.Country);
    //    StateFld.text(data.State);
    //    CityFld.text(data.City);
    //    MobileFld.text(data.Mobile);
    //    PhoneFld.text(data.Phone);
    //    EmailFld.text(data.Email);
    //    PhotoFld.text(data.Photo);
    //    StatusFld.text(data.Status);
        
    //    $(".edit").attr("href", "../Edit/" + data.SubjectId);
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
    //                window.location = listUrl + "?message=Subject Information Deleted";
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
        loadGrid2: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid2();
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
