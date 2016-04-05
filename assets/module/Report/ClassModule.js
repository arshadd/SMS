var ClassModule = function () {

    var list = $('#list');
    var detail = $('#detail');
    var attendance = $('#attendance');

    var type = $('#type');

    
    hideAll();


    function hideAll() {
        list.hide();
        detail.hide();
        attendance.hide();
    }
    var init = function () {
        


        $('#btnGenerateReport').click(function () {

            hideAll();

            if (type.val() == "list") {
                list.show();
            }

            if (type.val() == "detail") {
                detail.show();
            }

            if (type.val() == "attendance") {
                attendance.show();
            }


        });
    }

    return {
        //main function to initiate the module
        init: function () {
            init();
        }
       
    };
}();
