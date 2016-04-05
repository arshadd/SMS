var SchoolModule = function () {

    //Create Class
    var School = { SchoolId: 0, Name: '', Description: '', Address: '', Phone: '', Email:'', Website:'', Photo: ''};

    //Field Declaration Section
    
    var SchoolIdFld = $('#SchoolId');
    var NameFld = $('#Name');
    var DescriptionFld = $('#Description');
    var AddressFld = $('#Address');
    var PhoneFld = $('#Phone');
    var EmailFld = $('#Email');
    var WebsiteFld = $('#Website');
    var PhotoFld = $('#Photo');
    var LogoFld = $('#Logo');


    var loadGridUrl = baseApiUrl + "School/List";
    var editUrl = baseApiUrl + "school/item";
    var saveUrl = baseApiUrl + "school/save";
    var deleteUrl = baseApiUrl + "School/Delete/";
    var listUrl = baseAppUrl + "School/List";


    

    var handleValidation = function () {
        //load All dropdowns
        //loadAll();
        //alert('dd')
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        

        var form = $('#Form_School');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                //Personal Info
                Photo: {
                    required: true
                }


            },

            messages: { // custom messages for radio buttons and checkboxes
                'payment[]': {
                    required: "Please select at least one option",
                    minlength: jQuery.format("Please select at least one option")
                }
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#form_gender_error");
                } else if (element.attr("name") == "payment[]") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#form_payment_error");
                } else if (element.attr("type") == "file") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#fileupload");
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                    label
                        .closest('.form-group').removeClass('has-error').addClass('has-success');
                    label.remove(); // remove error label here
                } else { // display success icon for other inputs
                    label
                        .addClass('valid') // mark the current input as valid and display OK icon
                    .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                }
            },
            submitHandler: function (form) {
                success.show();
                error.hide();

                form.submit();

                //save();
                //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
            }
        });
        
        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form).change(function () {
            form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
    }


    function save() {
        //alert(saveUrl);
        var school = School;
        debugger;

        //Get values

        school.SchoolId = SchoolIdFld.val();
        school.Name = NameFld.val();
        school.Description = DescriptionFld.val();
        school.Address = AddressFld.val();
        school.Phone = PhoneFld.val();
        school.Email = EmailFld.val();
        school.Website = WebsiteFld.val();
        school.Photo = PhotoFld.val();

        //alert(school.Photo);

        var form = $("#Form_School");
        form.attr("action", saveUrl);
        form.post();


        var url = saveUrl;
        /*$.getJSON({
            type: "POST",
            crossDomain: true,
            dataType: "jsonp",
            url: url,
            data: school,
            success: function(data)
            {
                alert("workings");
            }
        });
*/

   /* $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            dataType: 'json',
            data : school,
            success: function (data) {
                alert('Result:'+data.message);
                //alert('Result:'+data.data);
                debugger;
                // Handle the complete event
                /!*var obj = JSON.parse(result.responseText);
                debugger;
                if (obj.Success == true) {
                    window.location = listUrl + "?message=School Information Saved";
                } else {
                    ShowMessage("error", obj.Message);
                }*!/
            },
            fail:function(){
                alert('failed');
            },
        });*/


    }

    function loadAll() {
        //Todo
        
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

        var newTable = $('#SchoolGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection
                
                { data: "RegisterNumber", defaultContent: "" },
                { data: "FirstName", defaultContent: "" },
                { data: "LastName", defaultContent: "" },
                { data: "Gender", defaultContent: "" },
                { data: "BloodGroup", defaultContent: "" },
                { data: "GuardianName", defaultContent: "" },
                { data: "GuardianMobile", defaultContent: "" },
                { data: "FatherMobile", defaultContent: "" },
                { data: "Status", defaultContent: "" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        //return '<a href="Edit/' + data.School Id + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>' +
                        //    '| <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>';

                        return '<a href="Edit/' + data.SchoolId + '" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>';

                        //return '<a href="#" class="btn btn-default btn-xs purple editView" data-id="' + data.SchoolId + '"><i class="fa fa-edit"></i> Edit</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".editView").click(function () {
                    var id = $(this).data('id');
                    edit(id);
                    $('.modal-title').html("Edit School");
                    $('#mdlCreateSchool').modal('show');
                });
            }
        });

        jQuery('#SchoolGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SchoolGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SchoolGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var loadGrid2 = function () {
        ShowSuccessMessage();

        var dataSet = [];

        var newTable = $('#SchoolGrid').DataTable({
            filter: false
            ,lengthChange:false
        });

        jQuery('#SchoolGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SchoolGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SchoolGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


    var edit = function (id) {
        //alert(id);

        var url = editUrl + id;

        //debugger;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'GET',
            dataType: 'jsonp',
            success: function (data) {
                //debugger;
                showEdit(data.data[0]);
            },
            fail: function (result) {
            }
        });
    }

    

    function showEdit(data) {
        if (data == null) return;
        
        //Set values
        //alert(data.Logo);

        var Logo = baseAppUrl + data.Logo;

        SchoolIdFld.val(data.SchoolId);
        NameFld.val(data.Name);
        DescriptionFld.val(data.Description);
        LogoFld.attr("src",Logo);
    }


    function showPopup() {
        $('#Form_School').trigger("reset");
        $('.modal-title').html("Create School");
        $('#mdlCreateSchool').modal('show');
    }
   
    var handleDateTime = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                //format: 'dd-MM-yyyy',
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
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
        loadGrid2: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid2();
        },
        addView: function () {
            showPopup();
        },
        edit: function () {
            //var pathname = window.location.pathname;
            //var params = pathname.split('/');
            //var id = params[params.length - 1];

            edit('');
        },
    };
}();
