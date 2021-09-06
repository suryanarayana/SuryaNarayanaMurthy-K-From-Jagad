<?php
/**
 * @trait       G
 * @tutorial    It will return the object of the given class
 */

trait G {
    
    /**
     * @method  Obj
     * @return  object of the given input class
     */
    static function Obj($class_name) {
    	global ${$class_name."Obj"};
    	
    	if(!isset(${$class_name."Obj"})) {
    	    ${$class_name."Obj"} = new $class_name;
    	}
    	
    	return ${$class_name."Obj"};
    }
    
}
?>