<?php

include 'factory/Singleton.php';

abstract class Page {

    private $id;

    /**
     * Page constructor
     */
    public function Page() {
        $singleton = Singleton::getInstance();
        $this->id = $singleton->getId();}

    public function getId() {
        return $this->id;
    }

    /**
     * Load used class
     * @param $classe class to load
     */
    function loadClass($classe) {
        require $classe . '.php';
    }

}