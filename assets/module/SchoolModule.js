var SchoolModule = function () {

    //Create Batch
    var School = { school_id: 0, code: '', name: '', description: '', address: '', phone:'', email:'', website:'', logo:''};

    //Field Declaration Section

    var SchoolIdFld = $('#Form_School #school_id');
    var CodeFld = $('#Form_School #code');
    var NameFld = $('#Form_School #name');
    var DescriptionFld = $('#Form_School #description');
    var AddressFld = $('#Form_School #address');
    var PhoneFld = $('#Form_School #phone');
    var EmailFld = $('#Form_School #email');
    var WebsiteFld = $('#Form_School #website');
    var LogoFld = $('#Form_School #logo');

    var loader = $("#Form_School #loader");
    loader.hide();


    var ModalUploadFile = $('#mdlFileUpload');

    var editUrl = baseApiUrl + "schools/find_school";
    var saveUrl = baseApiUrl + "schools/save";
    var deleteUrl = baseApiUrl + "schools/delete";
    var listUrl = baseAppUrl + "schools/index";


    //--------------------Grid Functions-----------------------//

    //--------------------End Grid Functions-----------------------//
    var form1 = $('#Form_School');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    //--------------------Form Validation Functions-----------------------//
    var handleValidation = function () {
        //load All dropdowns
        //loadAll();

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        //debugger;


        if (form1.validate == null) return;
        //debugger;
        form1.validate({
            errorElement: 'span', //default input error message container
            errorBatch: 'help-block', // default input error message school
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
                address: {
                    required: true
                },
                phone: {
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
                    .closest('.form-group').addClass('has-error'); // set error school to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error school to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success school to the control group
            },

            submitHandler: function (form) {
                //success1.show();
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

        //var school = School;


        //Get values

       /* school.school_id = SchoolIdFld.val();
        school.code = CodeFld.val();
        school.name = NameFld.val();
        school.description = DescriptionFld.val();
        school.address = AddressFld.val()
        school.phone = PhoneFld.val();
        school.email = EmailFld.val()
        school.website = WebsiteFld.val();
        school.logo = LogoFld.val()
*/
        //var school = $("#Form_School").serialize();

        //USAGE: $("#form").serializefiles();
        var school = $("#Form_School").serializefiles();



        /*var files = $('#file')[0].files;
        //debugger;
        $.each(files, function(i, fl) {
            //debugger;
            try {
                school.append('file[]', fl);
            }catch(ex){
                alert(ex.toString());
            }
        });*/

        //var data = new FormData( this);
        //debugger;

        /*$.each( obj, function( key, value ) {
            alert( key + ": " + value );
        });*/

        //var data = new FormData(jQuery('form')[0]);

        //var data = new FormData($("#Form_School"));

        //debugger;
        //alert(school);
        var url = saveUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : school,
            dataType: 'jsonp',
            processData: false,
            contentType: false, //'multipart/form-data',

            success : function(result){
                debugger;
                loader.hide();

                //alert(result.data);

                if(result.status == "success"){
                    var logo = result.data['logo'];
                    if(logo != null)
                        LogoFld.attr("src", baseAppImageUrl+ logo);

                    ShowMessage("success", result.message);
                }else {
                    //alert(result.message);
                    ShowMessage("error", result.message);
                }

                App.scrollTo($('.page-title'));
                //parent.location.reload();
                //alert('success'+result);
            },
            failed : function(result){
                alert('failed');
            }
        });
    }

    function ShowMessage(type, message){
        if (message == 'undefined') return;

        /*var error = $('#Form_School .alert-danger');
        var success = $('#Form_School .alert-success');*/

        message = '<button data-close="alert" class="close"></button>'+ message;

        if (type == "error") {
            error1.html(message);
            error1.show();
        }else if(type=="success")
        {
            success1.html(message);
            success1.show();
        }

    }

    var edit = function () {
        //alert(id);

        var url = editUrl;
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

        $.each(data, function(key, val){
            //console.log("key:"+key, ", val:"+val);
            $('#'+key).val(val);
        });

        LogoFld.attr("src",baseAppImageUrl+ data.logo);

        //Set values
        /*SchoolIdFld.val(data.school_id);
        CodeFld.val(data.code);
        NameFld.val(data.name);
        DescriptionFld.val(data.description);
        AddressFld.val(data.address);
        PhoneFld.val(data.phone);
        EmailFld.val(data.email);
        WebsiteFld.val(data.website);*/
    }

    $('#btnUpload').click(function(){
        ModalUploadFile.modal('show');
    });


   /* function showDelete(id) {
        if (id == null) return;

        //Set values
        BatchIdFld.val(id);
    }
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });*/
    function showPopup() {
        $('#Form_School').trigger("reset");
        BatchIdFld.val("0");
        $('.modal-title').html("Create Batch");
        ModalCreateBatch.modal('show');
    }

    /*function deleteData(id) {
        loader.show();
        //var pathname = window.location.pathname;

        //var params = pathname.split('/');
        //var id = params[params.length - 1];

        //alert(id);

        var school = Batch;
        //debugger;

        //Get values
        school.school_id = id;

        var url = deleteUrl;
        $.ajax({
            url: url,
            accepts: 'application/json',
            cache: false,
            type: 'POST',
            data : school,
            dataType: 'jsonp',
            success : function(result){
                //debugger;
                loader.hide();

                if(result.status == "success"){
                    /!*var save_id = result.data.school_id;
                     //alert(save_id);
                     BatchIdFld.val(save_id);*!/

                    reloadGrid();
                    ModalDeleteBatch.modal('hide');
                }else {
                    ShowMessage("error", result.message);
                }
            },
        });
    }*/
    /*var del = function () {
     $(".delete").on("click", function () {

     if (confirm("Are you sure want to delete?")) {
     deleteData();
     }
     });
     };*/

    //--------------------End Form Validation Functions-----------------------//

    /*var handleDateTime = function () {
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
*/
    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            handleValidation();
            edit();
        },
        addView: function () {
            showPopup();
        },
    };
}();
