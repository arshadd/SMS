var ClassStudentModule = function () {

    //Create Batch
    var School = { school_id: 0};


    //Global
    var class_id=0;
    var batch_id=0;

    //Field Declaration Section


    var StudentGrid = $('#StudentGrid');

    var ClassFld = $('#Form_Class_Student_Search #class_id');
    var BatchFld = $('#Form_Class_Student_Search #batch_id');


    var loadGridUrl = baseApiUrl + "students/all_batch_students/";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function (batch_id) {
        //ShowSuccessMessage();

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
                    return '<a href="edit/'+ data.student_id +'" >'+ data.first_name +' '+data.middle_name +', '+ data.last_name +'</a>';
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

    function loadAll() {
        //Todo
        fillDropDownClasses();
    }
    ClassFld.on('change', function(){
        class_id = ClassFld.val();
        fillDropDownBatches();
    });
    function fillDropDownClasses() {

        var loadDDUrl = baseApiUrl + "classes/all_classes";

        ClassFld.empty();
        ClassFld.append($("<option     />").val(0).text("Select class"));
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
                    ClassFld.append($("<option />").val(this.class_id).text(this.name));
                });

                class_id = fetchClassId();
                ClassFld.val(class_id);
                ClassFld.trigger('change');
            }
        });
    }

    function fillDropDownBatches() {
        var loadDDUrl = baseApiUrl + "batches/all_class_batches/"+class_id;

        BatchFld.empty();
        BatchFld.append($("<option     />").val(0).text("Select batch"));
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
                    BatchFld.append($("<option     />").val(this.batch_id).text(this.name));
                });
            }
        });
    }

    var fetchClassId = function(){
        var pathname = window.location.pathname;
        var params = pathname.split('/');
        var class_id = params[params.length - 1];
        if(class_id =='' || class_id == null)
            class_id=0;

        return class_id;
    }


    BatchFld.on('change', function(){
        var batch_id = this.value;

        var url = loadGridUrl + batch_id;

        //alert();
        dataTable.ajax.url(url).load();

        //loadGrid(batch_id);
    });


    return {
        //main function to initiate the module
        init : function(){
            loadAll();

            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid(0);
        }
    };
}();
