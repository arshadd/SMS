var ClassStudentModule = function () {

    //Create Batch
    var School = { school_id: 0};

    //Field Declaration Section
    var StudentGrid = $('#StudentGrid');

    var ClassFld = $('#Form_Class_Student_Search #class_id');
    var BatchFld = $('#Form_Class_Student_Search #batch_id');
    //Global
    var class_id=0;
    var batch_id=0;

    var loadGridUrl = baseApiUrl + "students/all_batch_students/";

    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {
        //ShowSuccessMessage();

        var batch_id = fetchBatchId();
        var dataSet = [];

        loadGridUrl = loadGridUrl + batch_id;

        dataTable = StudentGrid.DataTable({
            //dom: "Bfrtip",
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            columns: [
                //Table Column Header Collection

                {
                    data: null, render: function (data, type, row) {
                    return '<img src="' + baseAppImageUrl+ data.photo + '" style="width:30px;heigh:30px;" />';
                }
                },
                {
                    data: null, render: function (data, type, row) {
                    return data.first_name +' '+data.middle_name +', '+ data.last_name;
                }
                },
                { data: "gender" },
                { data: "admission_no" },
                { data: "class_name" },
                { data: "batch_name" },
                { data: "class_roll_no" }

                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#StudentGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#StudentGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#StudentGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    //--------------------End Grid Functions-----------------------//

    //--------------------Other Functions-----------------------//
    var fetchBatchId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');

        //set in global
        var batch_id = params[params.length - 1];
        return batch_id;
    }
    //--------------------End Other Functions-----------------------//


    return {
        //main function to initiate the module
        init : function(){

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        }
    };
}();
