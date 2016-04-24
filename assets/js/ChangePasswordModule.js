var ChangePasswordModule = function () {
    
    //Create Class
    var ChangePassword = { UserName: '', CurrentPassword: '', NewPassword: '' };

    //Field Declaration Section

    var UsernameFld = $('#Username');
    var CurrentPasswordFld = $('#CurrentPassword');
    var NewPasswordFld = $('#NewPassword');


    //var loadGridUrl = baseApiUrl + "Institute/List";
    //var editUrl = baseApiUrl + "Institute/Find/";
    var saveUrl = baseApiUrl + "User/ChangePassword";
    //var listUrl = baseAppUrl + "Institute/List";

    var handleValidation = function () {

        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#Form_Password');
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
                CurrentPassword: {
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
    }

    function save() {
       
        var changePassword = ChangePassword;
        debugger;

        //Get values

        changePassword.UserName = UsernameFld.val();
        changePassword.CurrentPassword = CurrentPasswordFld.val();
        changePassword.NewPassword = NewPasswordFld.val();

        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: changePassword,
            dataType: 'jsonp',
            complete: function (result) {
                // Handle the complete event
                var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    ShowMessage("success", obj.Message);
                } else {
                    ShowMessage("error", obj.Message);
                }
            }
        });
    }

    function ShowMessage(type, message) {
        if (message == 'undefined') return;

        var error = $('#mdlChangePassword .alert-danger');
        var success = $('#mdlChangePassword .alert-success');

        message = '<button data-close="alert" class="close"></button>' + message;

        error.hide();
        success.hide();

        if (type == "error") {
            error.html(message);
            error.show();
        } else if (type == "success") {
            success.html(message);
            success.show();
        }
    }

    function changePassword(panelId) {
        var username = $(panelId + ' #Username').val();

        $('#mdlChangePassword .modal-title').html("Change Password");

       // $('#Form_Password').trigger("reset");
        $('#mdlChangePassword #Username').val(username);
        $('#mdlChangePassword').modal('show');
    }
    return {
        //main function to initiate the module
        validate : function(){
            handleValidation();
        },
        changePassword: function (panelId) {
            changePassword(panelId);
        }
    };
}();
