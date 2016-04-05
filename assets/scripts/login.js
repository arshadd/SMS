var Login = function () {

    var handleLogin = function () {
        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    minlength: 5,
                    required: true
                },
                password: {
                    minlength: 5,
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-error', $('.login-form')).show();
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                //Validate data
                //RegisterAdmin();
                
                form.submit();
                //validate();
            }
        });

        $('.login-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit();
                }
                return false;
            }
        });
    }

    var handleForgetPassword = function () {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                //form.submit();
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
            }
        });

        $('.forget-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function () {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function () {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    }

    var handleRegister = function () {

        function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='/assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }


        $("#select2_sample4").select2({
            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
            allowClear: true,
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function (m) {
                return m;
            }
        });


        $('#select2_sample4').change(function () {
            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });



        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                

                username: {
                    required: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    equalTo: "#register_password"
                }
                //tnc: {
                //    required: true
                //}
            },

            messages: { // custom messages for radio buttons and checkboxes
                //tnc: {
                //    required: "Please accept TNC first."
                //}
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                //form.submit();
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
            }
        });

        $('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function () {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function () {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    }

    function ShowMessage(type, message) {
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

    //var validate = function () {

    //    var UserNameFld = $('#username');
    //    var PasswordFld = $('#password');
    //    debugger;
    //    var url = "http://localhost/School.Api/api/User/Validate";
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'POST',
    //        data: { Username: UserNameFld.val(), Password: PasswordFld.val() },
    //        dataType: 'jsonp',
    //        complete: function (result) {
    //            debugger;
    //            // Handle the complete event
    //            var obj = JSON.parse(result.responseText);

    //            if (obj.Success == true) {
    //                //Create session 
    //                SessionModule.CreateSession(UserNameFld.val(), UserNameFld.val(), obj.data.UserTypeId, obj.data.Role);

    //                window.location = "http://localhost/School.Web/Dashboard/Index";
    //            } else {
    //                ShowMessage("error", obj.Message);
    //            }
    //        }
    //    });
    //}
    //var RegisterInstitute = function () {
    //    var institute = {Name:'Test Institute', Description:'Test desc', Address:'Test addr', Phone:'12121', EmailAddress:'Test@test.com', Website:'www.testschool.com', Username:'testschool', Password:'123456', Status:'Enabled'};

    //    debugger;
    //    var url = "http://localhost/School.Api/api/Institute/Save";
    //    $.ajax({
    //        url: url,
    //        accepts: 'application/json',
    //        cache: false,
    //        type: 'POST',
    //        data: institute,
    //        dataType: 'jsonp',
    //        complete: function (result) {
    //            debugger;
    //            // Handle the complete event
    //            var obj = JSON.parse(result.responseText);

    //            if (obj.Success == true) {
    //                //Create session 
    //                alert('success');
    //            } else {
    //                alert('failed');
    //            }
    //        }
    //    });
    //}


    var RegisterAdmin = function () {
        var institute = { AdminId:0, Name: 'Admin', EmailAddress: 'admin@admin.com', Username: 'admin', Password: 'admin123!', Status: 'Enabled' };

        debugger;
        var url = "http://localhost/School.Api/api/Admin/Save";
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data: institute,
            dataType: 'jsonp',
            complete: function (result) {
                debugger;
                // Handle the complete event
                var obj = JSON.parse(result.responseText);

                if (obj.Success == true) {
                    //Create session 
                    alert('success');
                } else {
                    alert('failed');
                }
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        },
        //validate: function (username, password) {
        //    validate(username, password);
        //}
    };

}();