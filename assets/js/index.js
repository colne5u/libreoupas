
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

    $(function(){
        var cookie = getCookie("theme");
        if (cookie == "") {
            document.cookie = "theme=dark; path=/";
        }
        var currentCSS = $('<link href="'+ themes['default'] + '" rel="stylesheet" />');
        currentCSS.appendTo('head');
        $('.theme-link').click(function() {
           var newCSS = themes[$(this).attr('data-theme')];
           currentCSS.attr('href', newCSS);
           document.cookie = "theme=" + $(this).attr('data-theme') + "; path=/";
           window.location.reload()
        });
    });
