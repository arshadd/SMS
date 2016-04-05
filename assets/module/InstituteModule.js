var InstituteModule = function () {

    //Create Class
    var Institute = { InstituteId: 0, Name: '', Description: '', Address: '', Phone: '', EmailAddress: '', Website: '', Status: '', ApplicationUserId:'', Username:'', Password:'' };

    //Field Declaration Section
    
    var InstituteIdFld = $('#InstituteId');
    var NameFld = $('#Name');
    var UsernameFld = $('#Username');
    var PasswordFld = $('#Password');
    var DescriptionFld = $('#Description');
    var AddressFld = $('#Address');
    var PhoneFld = $('#Phone');
    var EmailAddressFld = $('#EmailAddress');
    var WebsiteFld = $('#Website');
    var StatusFld = $('#Status');
    var ApplicationUserIdFld = $('#ApplicationUserId');

    var EditPanelUsernameFld = $('#EditPanel #Username');
    var ConfirmPasswordFld = $('#ConfirmPassword');
    

    var CreatePanel = $('#CreatePanel');
    var EditPanel = $('#EditPanel');


    var loadGridUrl = baseApiUrl + "Institute/List";
    var editUrl = baseApiUrl + "Institute/Find/";
    var saveUrl = baseApiUrl + "Institute/Save";
    var listUrl = baseAppUrl + "Institute/List";

    var handleValidation = function () {

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Institute');
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
                
                Username: {
                    minlength: 5,
                    required: true
                },
                Password: {
                    minlength: 5,
                    required: true
                },
                ConfirmPassword: {
                    minlength: 5,
                    required: true,
                    equalTo: "#Password"
                },

                Name: {
                    required: true
                }, 
                Description: {
                    required: true
                }, 
                Address: {
                    required: true
                }, 
                Phone: {
                    required: true
                }, 
                EmailAddress: {
                    required: true,
                    email: true
                }, 
                Website: {
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
       
        var institute = Institute;
        debugger;

        //Get values
        
        institute.InstituteId = InstituteIdFld.val();
        institute.Name = NameFld.val();
        institute.Username = UsernameFld.val();
        institute.Password = PasswordFld.val();
        institute.Description = DescriptionFld.val();
        institute.Address = AddressFld.val();
        institute.Phone = PhoneFld.val();
        institute.EmailAddress = EmailAddressFld.val();
        institute.Website = WebsiteFld.val();
        institute.Status = StatusFld.val();
        institute.ApplicationUserId = ApplicationUserIdFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: institute,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    //window.location = listUrl + "?message=Institute Information Saved";
                    ShowMessage("success", "Institute Information Saved");
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

    function ShowSuccessMessage() {
        var message = decodeURIComponent(getUrlVars()["message"]);
        ShowMessage("success", message);
    }
   
    var loadGrid = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#InstituteGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection

                { data: "Name", defaultContent: "" },
                { data: "Username", defaultContent: "" },
                { data: "Address", defaultContent: "" },
                { data: "Phone", defaultContent: "" },
                { data: "EmailAddress", defaultContent: "" },
                { data: "Website", defaultContent: "" },
                {
                    data: null, render: function (data, type, row) {

                        if (data.Status == 'Enabled')
                            return '<span class="label label-success">' + data.Status + '</span>';
                        else
                            return '<span class="label label-danger">' + data.Status + '</span>';
                    }
                },
                {
                    data: null, render: function (data, type, row) {

                        return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.InstituteId + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit Institute");
                    $('#mdlCreateInstitute').modal('show');
                });
            }
        });

        jQuery('#InstituteGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#InstituteGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#InstituteGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
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
        
        $('#Form_Institute').trigger("reset");

        //Set values
        
        InstituteIdFld.val(data.InstituteId);
        NameFld.val(data.Name);
        UsernameFld.val(data.Username);
        DescriptionFld.val(data.Description);
        AddressFld.val(data.Address);
        PhoneFld.val(data.Phone);
        EmailAddressFld.val(data.EmailAddress);
        WebsiteFld.val(data.Website);
        StatusFld.val(data.Status);
        ApplicationUserIdFld.val(data.ApplicationUserId);

        EditPanelUsernameFld.val(data.Username);

        EditPanel.show();
        CreatePanel.hide();
        DisabledCreatePanel();
    }

    function DisabledCreatePanel() {
        CreatePanel.find(':input').attr("disabled", "disabled");
    }

    function showPopup() {
        $('#Form_Institute').trigger("reset");
        $('.modal-title').html("Create Institute");
        $('#mdlCreateInstitute').modal('show');

        EditPanel.hide();
        CreatePanel.show();

        //var url = baseApiUrl + "Institute/Test";

        ////var testObj = { Name: "Noman", Testing: [{ ID: 0, First: "TestFirst", Last: "TestLast" }, { ID: 0, First: "TestFirst", Last: "TestLast" }] };
        //var testObj = { "Name": "Myname", "persons": [{ "ID": 1, "First": "First1", "Last": "Last1" }, { "ID": 2, "First": "First2", "Last": "Last2" }] };

        //$.ajax({
        //    url: url,
        //    accepts: 'application/json',
        //    cache: false,
        //    type: 'POST',
        //    data: testObj,
        //    dataType: 'jsonp',
        //    complete: function (result) {
        //        // Handle the complete event

        //        debugger;

        //        var obj = JSON.parse(result.responseText);
        //        alert(obj.Message + '--' + obj.data);
        //    }
        //});
    }

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
        addView: function () {
            showPopup();
        },
    };
}();
