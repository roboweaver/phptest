<?php
require_once('lib/Listener.php');
/**
 * Chat room
 *
 * @author robweaver
 */
class Client{
    private $_name = "";
    private $_listener;
    /**
     * Constructor
     */
    function __construct($name) {
        $this->_name = $name;
        $this->_listener = new Listener();
    }
    
    function addListener($listener){
        $this->_listener = $listener;
    }
    
    function getListener(){
        return $this->_listener;
    }
}
