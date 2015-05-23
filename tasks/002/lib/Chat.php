<?php
require_once('lib/Client.php');
require_once('lib/Room.php');

/**
 * Chat controller class
 *
 * @author robweaver
 */
class Chat {
    
    /**
     * Constructor
     */
    function __construct() {
        
    }

    /**
     * Set the file name
     * 
     * @param String $name
     */
    function createClient($name) {
        return new Client($name);
    }
    
    function createChatRoom($roomName = "Unnamed"){
        return new Room($roomName);
    }

}
