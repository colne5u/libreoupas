<?php

include 'Index.php';

class Site {

    protected $index;
    protected $pages;
    protected $menu;

    /**
     * Site constructor
     */
    public function Site() {
        // array with all the pages of the website
        $this->pages = array();
        $this->menu = null;
        // we evaluate the number of arguments in the constructor
        switch(func_num_args()) {
            case 0 :
                // there is 0 arguments : default constructor called
                $this->constructorWithoutArgs();
                break;
            case 1 :
                // there is 1 argument : 1 argument constructor called
                $this->constructorWithArgs(func_get_args()[0]);
                break;
            default :
                break;
        }
    }

    /**
     * function called by the constructor without arguments
     */
    private function constructorWithoutArgs() {
    }

    /**
     * function called by the constructor with 1 argument
     * @param Index $index index to add to the main page
     */
    private function constructorWithArgs(Index $index) {
        // main page of the website
        $this->setIndex($index);

    }

    /**
     * @return Index of the website
     */
    public function getIndex() {
        return $this->index;
    }

    /**
     * set the index page of the website
     * @param Index $index page to set as index
     */
    public function setIndex(Index $index) {
        $this->index = $index;
    }

    /**
     * add a new page to the website
     * @param Page $page page to add
     */
    public function addPage(Page $page) {
        $this->pages[$page->getIdPage()] = $page;
    }

    /**
     * @param $idPage id of the page to return
     * @return the page corresponding of the id
     */
    public function getPage($idPage) {
        return $this->pages[$idPage];
    }

    /**
     * set a new Menu in all pages
     * @param Menu $menu menu to set
     */
    public function setMenu(Menu $menu) {
        $this->menu = $menu;
    }

    /**
     * @return the menu of the pages
     */
    public function getMenu(Index $index) {
        return $index->getMenu();
    }

}
