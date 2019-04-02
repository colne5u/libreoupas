
    var themes = {
        "light" : "assets/css/light/bootstrap.css",
        "dark"  : "assets/css/dark/bootstrap.css"
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function getXhr(){
        var xhr = null;
        if(window.XMLHttpRequest) // Firefox et autres
           xhr = new XMLHttpRequest();
        else if (window.ActiveXObject) { // Internet Explorer
           try {
               xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else { // XMLHttpRequest non supporté par le navigateur
           alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
           xhr = false;
        }
        return xhr;
    }

    function authentify() {
        var xhr = getXhr();
    	xhr.onreadystatechange = function() {
    		if (xhr.readyState == 4 && xhr.status == 200) {
    			document.getElementById("content").innerHTML = xhr.responseText;
    		}
    	}
    	xhr.open("GET","assets/php/action/admin.php?pwd=" + document.getElementById("pwd").value, true);
    	xhr.send(null);
    }

    function addOnlyLinux() {
        if ($("#onlyLinux").prop('checked')) {
            $("#onlyWindows").prop('checked', false);
            document.cookie = "ONLY_WIN=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
            document.cookie = "ONLY_LINUX=1; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        } else {
            document.cookie = "ONLY_LINUX=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        window.location.reload();
    }

    function addOnlyWindows() {
        if ($("#onlyWindows").prop('checked')) {
            $("#onlyLinux").prop('checked', false);
            document.cookie = "ONLY_WIN=1; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
            document.cookie = "ONLY_LINUX=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        } else {
            document.cookie = "ONLY_WIN=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        window.location.reload();
    }

    function addOnlyFree() {
        if ($("#onlyFree").prop('checked')) {
            document.cookie = "ONLY_FREE=1; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        } else {
            document.cookie = "ONLY_FREE=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        window.location.reload();
    }

    function addGrid() {
        if ($("#grid").prop('checked')) {
            document.cookie = "GRID=1; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        } else {
            document.cookie = "GRID=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        window.location.reload();
    }

    function initializeCookie() {
        if (getCookie("ONLY_LINUX") == "1") {
            $("#onlyLinux").prop("checked", true);
        } else {
            $("#onlyLinux").prop("checked", false);
        }
        if (getCookie("ONLY_WIN") == "1") {
            $("#onlyWindows").prop("checked", true);
        } else {
            $("#onlyWindows").prop("checked", false);
        }
        if (getCookie("ONLY_FREE") == "1") {
            $("#onlyFree").prop("checked", true);
        } else {
            $("#onlyFree").prop("checked", false);
        }
        if (getCookie("GRID") == "1" || getCookie("GRID") == "") {
            $("#grid").prop("checked", true);
        } else {
            $("#grid").prop("checked", false);
        }
    }

    function reloadBar() {
        var dt = new Date();
        var hourSize = $(".edtCol").width() + 11.5;
        var minSize = hourSize / 60.0;
        var start = $(".edtRow").position().left + 15;
        var min = 8;
        var max = 20;
        var nbCol = dt.getHours() - min;
        var current = start + nbCol * hourSize;
        current += minSize * dt.getMinutes();
        if (dt.getHours() >= max) {
            current = start + (max - min) * hourSize;
        }
        if (dt.getHours() < min) {
            current = start + min * hourSize;
        }
        $("#floatingbar").css("left", current + "px");
        $("#floatingbar").css("height", ($("#content-body").height() + 2 * parseInt($("#content-body").css("padding-top"))) + "px");
    }

    $(function(){
        var cookie = getCookie("theme");
        if (cookie == "") {
            document.cookie = "theme=light; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        var currentCSS = $('<link href="'+ themes['default'] + '" rel="stylesheet" />');
        currentCSS.appendTo('head');
        $('.theme-link').click(function() {
           var newCSS = themes[$(this).attr('data-theme')];
           currentCSS.attr('href', newCSS);
           document.cookie = "theme=" + $(this).attr('data-theme') + "; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
           window.location.reload();
        });
        initializeCookie();
        reloadBar();
        $(window).on('resize', function(e) {
            reloadBar();
        });
    });
