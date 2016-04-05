var FormValidation = function () {

    var handleValidation1 = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#form_sodbalances');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "AccountSODBalances.ASB_Date": {
                    required: true
                },
                "AccountSODBalances.asb_multiplier": {
                    required: true
                },
                "AccountSODBalances.asb_TAV": {
                    number: true
                },
                "AccountSODBalances.asb_DTBP": {
                    number: true
                },
                "AccountSODBalances.asb_MBP": {
                    number: true
                },
                "AccountSODBalances.asb_ONBP": {
                    number: true
                },
                "AccountSODBalances.asb_FreeCash": {
                    number: true
                },
                "AccountSODBalances.asb_MMF": {
                    number: true
                },
                "AccountSODBalances.asb_HeldInMargin": {
                    number: true
                },
                "AccountSODBalances.asb_HeldInCash": {
                    number: true
                },
                "AccountSODBalances.asb_HeldInShort": {
                    number: true
                },
                "AccountSODBalances.asb_NYSECALL": {
                    number: true
                },
                "AccountSODBalances.asb_DTC": {
                    number: true
                },
                "AccountSODBalances.asb_DBP": {
                    number: true
                },
                "AccountSODBalances.asb_FedCall": {
                    number: true
                },
                "AccountSODBalances.asb_house_call": {
                    number: true
                },
                "AccountSODBalances.asb_QCall": {
                    number: true
                },
                "AccountSODBalances.asb_DCall": {
                    number: true
                },
                "AccountSODBalances.asb_maintenance_Call": {
                    number: true
                },
                "AccountSODBalances.asb_margin_BP_adjustment": {
                    number: true
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
                form.submit();
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
        }
    };
}();

jQuery(document).ready(function () {
    FormValidation.init();
    FormComponents.init();
    $('.date-picker').datepicker();
});