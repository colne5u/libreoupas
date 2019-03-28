
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
        if ($("#onlyWindows").prop('checked')) {
            document.cookie = "ONLY_FREE=1; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        } else {
            document.cookie = "ONLY_FREE=0; expires=Fri, 31 Dec 2100 23:59:59 GMT; path=/";
        }
        window.location.reload()
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
           window.location.reload()
        });
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
    });
