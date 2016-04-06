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

var baseApiUrl = "http://localhost/myschool/sms/index.php/api/";
var baseAppUrl = "http://localhost/myschool/sms/index.php/";

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