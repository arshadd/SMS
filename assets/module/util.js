function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getIdParam() {
    var pathname = window.location.pathname;
    var params = pathname.split('/');
    var id = params[params.length - 1];
    return id;
}
/*
var baseApiUrl = "http://localhost/myschool/sms/index.php/api/";
var baseAppUrl = "http://localhost/myschool/sms/index.php/";
var baseAppImageUrl = "http://localhost/myschool/sms/";
*/

var baseApiUrl = window.location.href.substring(0, window.location.href.indexOf("index"))+"index.php/api/";
var baseAppUrl = window.location.href.substring(0, window.location.href.indexOf("index"))+"index.php/api/";
var baseAppImageUrl = window.location.href.substring(0, window.location.href.indexOf("index"));

var DEFAULT_SCHOOL_IMAGE = baseAppImageUrl + "/assets/resource/default/school.png";
var DEFAULT_STUDENT_IMAGE = baseAppImageUrl + "/assets/resource/default/student.png";
var DEFAULT_EMPLOYEE_IMAGE = baseAppImageUrl + "/assets/resource/default/employee.png";


Date.prototype.yyyymmdd = function() {
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
    var dd  = this.getDate().toString();
    return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
};

function GetDateFormatOnly(date) {
    //debugger
    //var dateSplit = date.substring(0, 4) + "/" + date.substring(5, 7) + "/" + date.substring(8, 10);
    var yy = date.substring(0, 4);
    var mm = date.substring(5, 7);
    var dd = date.substring(8, 10);

    //var now = new Date(dateSplit);
    var now = new Date(yy, mm, dd);


    //var now = new Date(date), // current date
    //months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
    months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    var days = now.getDay();


    // a cleaner way than string concatenation
    date = now.getDate();
    currentMonth = months[now.getMonth() - 1];
    currentDayOfWeek = dayOfWeek[now.getDay()];
    currentYear = now.getFullYear();

    // set the content of the element with the ID time to the formatted string
    //var formatDate = date + '-' + currentMonth + '-' + currentYear;
    var formatDate = date + '-' + currentMonth + '-' + currentYear;
    return formatDate;
}

function RadioMarkedChecked(radioName, checkedValue) {
    var radio = $("input[type='radio'][name=" + radioName + "][value=" + checkedValue + "]");
    //debugger;
    if (radio != null) {
        radio.attr('checked', 'checked');
    }
}

function RadioCheckedValue(radioName) {
    var radio = $("input[type='radio'][name=" + radioName + "]:checked");
    if (radio != null) {
        return radio.val();
    } else {
        return null;
    }
}


$.fn.clearForm = function() {
    debugger;
    return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || type=="hidden" || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};


(function($) {
    $.fn.serializefiles = function() {
        var obj = $(this);
        /* ADD FILE TO PARAM AJAX */
        var formData = new FormData();
        //debugger;
        $.each($(obj).find("input[type='file']"), function(i, tag) {
            $.each($(tag)[0].files, function(i, file) {
                formData.append(tag.name, file);
            });
        });
        var params = $(obj).serializeArray();
        $.each(params, function (i, val) {
            //debugger;
            formData.append(val.name, val.value);
        });
        //debugger;
        return formData;
    };
})(jQuery);

jQuery(document).ready(function() {

    function MenuSelection() {
        var path = window.location.pathname;
        var uri = path.split("/");

        //debugger
        var controller = uri[uri.length - 2];
        var action = uri[uri.length - 1];

        $('li[data-menu]').attr("class", "");
        $('li[data-menu] span[class="title"]').attr("class", "title arrow down");

        $('li[data-menu="' + controller + '"]').attr("class", "active");
        $('li[data-menu="' + controller + '"] span[class="title arrow down"]').attr("class", "title arrow open selected");

        $('li[data-menu-item="' + action + '"]').attr("class", "active");
    }

    MenuSelection();
});
