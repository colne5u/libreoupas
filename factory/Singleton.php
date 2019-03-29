<?php
/**
 * Created by PhpStorm.
 * User: colne5u
 * Date: 29/03/19
 * Time: 13:27
 */


class singleton {

    private static $instance = null;
    private static $id;


    /**
     * idFactory private constructor
     */
    private function __construct() {
        // The constructor is private
        // to prevent initiation with outer code
        $this->id = 0;
    }

    /**
     * @return Singleton instance
     */
    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;

    }

    /**
     * @return int id from the Singleton
     */
    public function getId() {
        return $this->id++;
    }

}