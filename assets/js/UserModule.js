var UserModule = function () {

    //Create Class
    var ResetPasswordLock = { Id: 0, Username:'', Email: '', NewPassword: '' };

    //Field Declaration Section
    
    var UserIdFld = $('#Id');
    var UsernameFld = $('#Username');
    var IsLockedFld = $('#IsLocked');

    var loadGridUrl = baseApiUrl + "User/List";
    var editUrl = baseApiUrl + "User/Find/";
    var saveUrl = baseApiUrl + "User/UpdateLockAccount";
    var listUrl = baseAppUrl + "User/List";
    
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

    var loadGrid = function () {

        var dataSet = [];

        var newTable = $('#UserGrid').DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection

                { data: "Username", defaultContent: "" },
                {
                    data: null, render: function (data, type, row) {

                        if (data.IsLocked == true)
                            return '<span class="label label-danger">' + data.IsLocked + '</span>';
                        else
                            return '<span class="label label-success">' + data.IsLocked + '</span>';
                    }
                },
                { data: "RoleName", defaultContent: "" },
                {
                    data: null, render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        return '<a href="#" class="btn btn-default btn-xs purple lockView" data-id="' + data.Id + '"><i class="fa fa-lock"></i> Lock / Unlock</a> |';//+
                               //'<a href="#" class="btn btn-default btn-xs purple resetPasswordView" data-id="' + data.Id + '"><i class="fa fa-key"></i> Reset Password</a>';
                    }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
            "fnInitComplete": function () {
                $(".lockView").click(function () {
                    var id = $(this).data('id');
                    LockAccountModule.edit(id);
                    $('.modal-title').html("Lock / Unlock Account");
                    $('#mdlLockAccount').modal('show');
                });
                $(".resetPasswordView").click(function () {
                    var id = $(this).data('id');
                    ResetPasswordModule.edit(id);
                    $('.modal-title').html("Reset Password");
                    $('#mdlResetPasswordAccount').modal('show');
                });
            }
        });

        jQuery('#UserGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#UserGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#UserGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }
    return {
        //main function to initiate the module
        loadGrid: function () {
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        }
    };
}();
