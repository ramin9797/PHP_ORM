<?php

namespace App\Providers;

/**
 * Description of index
 *
 */
class Registry {
    
    public static $objects = [];

    private $for_public = [];

    
    protected static $instance;
    
    protected function __construct() {

        $this->for_public = require "RegistryData.php";

        foreach($this->for_public as $name => $component){
            $object = new $component[0];
            $action = $component[1];
            $object = $object->$action()->get();

            self::$objects[$name] =$object;
        }
    }
    
    public static function instance() {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function __get($name) {
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }
    
    public function __set($name, $object) {
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }
    }
    
    public function start(){
        return self::$objects;
    }
    
}
