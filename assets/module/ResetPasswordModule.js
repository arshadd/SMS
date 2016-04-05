var ResetPasswordModule = function () {

    //Create Class
    var ResetPasswordLock = { Id: 0, Username : '', Email: '', NewPassword: '' };

    //Field Declaration Section
    
    var UserIdFld = $('#Id');
    var UsernameFld = $('#mdlResetPasswordAccount #Username');
    var NewPasswordFld = $('#mdlResetPasswordAccount #NewPassword');

    var editUrl = baseApiUrl + "User/Find/";
    var saveUrl = baseApiUrl + "User/RestPassword";
    
    function ShowMessage(type, message){
        if (message == 'undefined') return;

        var error = $('.alert-danger');
        var success = $('.alert-success');

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

    var handleValidation = function () {

        var form = $('#Form_ResetPassword');
        var error = $('#mdlResetPasswordAccount .alert-danger', form);
        var success = $('#mdlResetPasswordAccount .alert-success', form);

        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                //Field Validation Rule
                Username: {
                    minlength: 5,
                    required: true
                },
                NewPassword: {
                    minlength: 5,
                    required: true
                },
                ConfirmPassword: {
                    minlength: 5,
                    required: true,
                    equalTo: "#NewPassword"
                }
            },
            submitHandler: function (form) {
                success.show();
                error.hide();

                save();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            }
        });
    }

    function save() {

        var user = ResetPasswordLock;
        debugger;

        //Get values

        user.Id = UserIdFld.val();
        user.Username = UsernameFld.val();
        user.NewPassword = NewPasswordFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: user,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    ShowMessage("success", obj.Message);
                    
                    //parent.location.reload();
                    //$('#UserGrid').DataTable().ajax.reload();
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
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
        debugger;
        //Set values
        UserIdFld.val(data.Id);
        UsernameFld.val(data.UserName);
    }
    //-------------------------------//

    return {
        //main function to initiate the module
        validate: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            handleValidation();
        },
        edit: function (id) {
            edit(id);
        }
    };
}();
