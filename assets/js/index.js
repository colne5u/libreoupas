
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
    });
