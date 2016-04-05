var SessionModule = function () {
    
    var COOKIE_NAME = "SCHOOL_MANAGEMENT";
    var MySession = { Username: "", Name: "", UserId:"", Role: "" };

    var LoginUrl = "http://localhost/School.Web/Account/Login";

    var CreateSession = function (username, name, id, role) {
        var session = MySession;
        session.Username = username;
        session.Name = name;
        session.UserId = id;
        session.Role = role;

        var str = JSON.stringify(session);
        debugger;
        //Create Cookie
        $.cookie(COOKIE_NAME, str, { expires: 7, path: '/' });
        console.log('Session Created...' + str);
        //debugger;
    }
    var RemoveSession = function () {
        //Remove Cookie
        var ret = $.removeCookie(COOKIE_NAME, { path: '/' }); // => true
        //$.cookie(COOKIE_NAME, null); // => true
        if (ret == true)
            console.log('Session Removed...');
        else
            console.log('Session Removed Failed...');
    }
    var ReadSession = function () {
        //Read Cookie
        var session = $.cookie(COOKIE_NAME);

        //debugger;
        console.log('Session ...' + session);

        //debugger;
        if (session == undefined)
            return null;
        else
            return JSON.parse(session);
    }
    var SessionExist = function () {
        var session = $.cookie(COOKIE_NAME);
        debugger;

        if (session == undefined){
            window.location.href = LoginUrl;
        }
    }

    var init = function () {
        var session = ReadSession();
        //debugger;
        if (session != null) {
            $('.username').text(session.Username);
        }
        $('.logout').click(function () {
            SessionModule.RemoveSession();
            window.location.href = LoginUrl;
        });


        var viewRole = $('.viewRole');
        var role = viewRole.attr("data-role");

        console.log(session.Role + ', ' + role);

        if (session.Role == role) {
            console.log('show');
            viewRole.show();
        } else {
            console.log('hide');
            viewRole.hide();
        }
    }
    return {
        init : function(){
            init();
        },
        //main function to initiate the module
        CreateSession: function (username, name, id, role) {
            CreateSession(username, name, id, role);
        },
        RemoveSession: function () {
            RemoveSession();
        },
        ReadSession: function () {
            return ReadSession();
        },
        SessionExist: function () {
            SessionExist();
        }
    };
}();
