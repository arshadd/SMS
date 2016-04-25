var BatchSummaryModule = function () {

    //Create Class
    var Class = { class_id: 0, code: '', name: '', section_name: ''};

    //Field Declaration Section
    
    var ClassIdFld = $('#Form_Class #class_id');
    var CodeFld = $('#Form_Class #code');
    var NameFld = $('#Form_Class #name');
    var SectionNameFld = $('#Form_Class #section_name');

    var loader = $("#Form_Class #loader");
    loader.hide();

    var loaderDelete = $("#loaderDelete");
    loaderDelete.hide();

    var loadGridUrl = baseApiUrl + "classes/all_classes";
    var editUrl = baseApiUrl + "classes/find_class/";
    var saveUrl = baseApiUrl + "classes/save";
    var deleteUrl = baseApiUrl + "classes/delete";
    var listUrl = baseAppUrl + "classes/index";


    //--------------------Grid Functions-----------------------//
    var dataTable = null;
    var loadGrid = function () {

        var dataSet = [];
        var i=0;

        dataTable = $('#ClassGrid').DataTable({
            //dom: "Bfrtip",
            aaSorting: [], //disabled initial sorting
            paginate: false,
            lengthChange: false,
            filter:false,
            info:false,
            
            ajax: loadGridUrl,
            columns: [
                //Table Column Header Collection

                {
                    data: null, render: function (data, type, row) {
                    return i+=1;
                }
                },
                { data: "code" },
                { data: "name" },
                /*{
                    data: null, render: function (data, type, row) {
                    return '<a href="../manage/batches/'+ data.class_id +'" >'+ data.name +'</a>';
                }
                },*/
                { data: "section_name" },
                { data: "section_name" },
                {
                     data: null, render: function (data, type, row) {
                        return 10;
                     }
                 },
                {
                    data: null, render: function (data, type, row) {
                    return 3;
                }
                },
                {
                    data: null, render: function (data, type, row) {
                    return 7;
                }
                },
                //{ data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$') }
            ],
        });

        jQuery('#ClassGrid_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#ClassGrid_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#ClassGrid_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
    }



    var reloadGrid = function(){
        //debugger;
        dataTable.ajax.reload(null, false);
    }
    //--------------------End Grid Functions-----------------------//



    //--------------------End Form Validation Functions-----------------------//
    return {
        //main function to initiate the module
        init : function(){
            //Form validation
            //Grid loading
            if (!jQuery().dataTable) {
                return;
            }
            loadGrid();
        },
    };
}();
