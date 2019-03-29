<?php
/**
 * Created by PhpStorm.
 * User: colne5u
 * Date: 29/03/19
 * Time: 14:29
 */

class Menu {

    private $menu;

    public function Menu() {
        $this->menu = $this->setMenu();
    }

    public function setMenu() {
        $code =
            '
            <link href="../assets/css/dark/bootstrap.css" rel="stylesheet">
            <nav class="navbar navbar-default">
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
        $code = $code . '
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
        $code = $code . '
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/index.js"></script>';

        return $code;
    }

    public function getMenu() {
        return $this->menu;
    }

}