<?php

include '../Site.php';
include '../components/Menu.php';

//$index1 = new Index();
//$index2 = new Index();
//$index3 = new Index();
//$site1 = new Site($index1);
//$site2 = new Site();
//echo $index1->getId() . '</br>';
//echo $index2->getId() . '</br>';
//echo $index3->getId() . '</br>';

$menu = new Menu();
echo $menu->getMenu();