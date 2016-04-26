var BatchSummaryModule = function () {

    var SubjectGrid = $('#SubjectGrid');
    var EmployeeGrid = $('#EmployeeGrid');
    var StudentGrid = $('#StudentGrid');


    var loadGridSubjectUrl = baseApiUrl + "subjects/all_batch_subjects/";
    var loadGridEmployeeUrl= baseApiUrl + "employees_subjects/all_batch_employees_subjects/";
    var loadGridStudentUrl = baseApiUrl + "students/all_batch_students/";

    //--------------------Grid Functions-----------------------//

    var dataTableSubject = null;
    var loadGridSubject = function (batch_id) {

        var loadGridUrl = loadGridSubjectUrl + batch_id;

        dataTableSubject = SubjectGrid.DataTable({
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            displayLength:25,
            /*language: {
             emptyTable: "No records available - Got it?",
             },*/

            columns: [
                //Table Column Header Collection
                {data: "code"},
                {data: "name"},
                {data: "max_weekly_classes"},
                {data: "credit_hours"},
            ],
        });

        jQuery('#SubjectGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#SubjectGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#SubjectGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }

    var dataTableEmployee = null;
    var loadGridEmployee = function (batch_id) {

        var loadGridUrl = loadGridEmployeeUrl + batch_id;

        dataTableEmployee = EmployeeGrid.DataTable({
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            displayLength:25,
            /*language: {
             emptyTable: "No records available - Got it?",
             },*/

            columns: [
                //Table Column Header Collection
                {data: "employee_name"},
                {data: "subject_name"},
            ],
        });

        jQuery('#EmployeeGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#EmployeeGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }


    var dataTableStudent = null;
    var loadGridStudent = function (batch_id) {

        var loadGridUrl = loadGridStudentUrl + batch_id;

        dataTableStudent = StudentGrid.DataTable({
            ajax: loadGridUrl,
            aaSorting: [], //disabled initial sorting
            displayLength:25,
            /*language: {
             emptyTable: "No records available - Got it?",
             },*/

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

        if(isNaN(batch_id)){
            batch_id = 0;
        }

        return batch_id;
    }
    //--------------------End Other Functions-----------------------//

    //--------------------Fill dropdown Functions-----------------------//
    $("#batch_id").on('change', function(){
        var batch_id = $(this).val();

        var url = loadGridSubjectUrl + batch_id;
        dataTableSubject.ajax.url(url).load();

        url = loadGridEmployeeUrl + batch_id;
        dataTableEmployee.ajax.url(url).load();

        url = loadGridStudentUrl + batch_id;
        dataTableStudent.ajax.url(url).load();

    });
    function fillDropDownBatches() {
        var loadDDUrl = baseApiUrl + "batches/all_batches";

        $("#batch_id").empty();
        $("#batch_id").append($("<option     />").val("0").text("Select..."));
        $("#batch_id").select2('val','0');

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
                    $("#batch_id").append($("<option     />").val(this.batch_id).text(this.full_name));
                });

                $("#batch_id").select2('val', fetchBatchId());
                $("#batch_id").trigger('change');

            }
        });
    }

    //--------------------End Fill dropdown Functions-----------------------//


    //--------------------End Edit functionality-----------------------//

    return {
        //main function to initiate the module
        init : function(){
            //Form validation

            fillDropDownBatches();


            //setClassName();
            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGridSubject(0);
            loadGridEmployee(0);
            loadGridStudent(0);
        }
    };
}();
