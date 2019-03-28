<?php

    /**
     * Add the navigation bar
     */
    function addNavigationBar() {
        $code =
        '<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" hred="index.php">' . date('H:i') . '</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" data-label-expanded="Close" aria-expanded="false">
                        <span class="sr-only">(toggle)</span>
                        <span class="navbar-toggle-icon glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        ';
        $code = $code . addNavigationHome();
        $code = $code . '</ul>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Themes <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-theme="light" class="theme-link">Light</a></li>
                                    <li><a href="#" data-theme="dark"  class="theme-link">Dark</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>';
        echo $code;
    }

    /**
     * Add the navigation home item
     */
    function addNavigationHome() {
        $code = '<li';
        if (!isset($_GET["tab"]) || $_GET["tab"] == "") {
            $code = $code . ' class="active"';
        }
        $code = $code . '><a class="nav-link" href="index.php">Home</a></li>';
        return $code;
    }

    /**
     * Add an item in the navigation bar
     * @param String $item the item's name
     */
    function addNavigationItem($item) {
        $code = '<li';
        if (isset($_GET["tab"]) && $_GET["tab"] == $item) {
            $code = $code . ' class="active"';
        }
        $code = $code . '><a class="nav-link" href="index.php?tab=' . $item . '">' . $item . '</a></li>';
        return $code;
    }

?>
