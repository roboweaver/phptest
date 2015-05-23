<?php

/**
 * Chat room
 *
 * @author robweaver
 */
class Room{
    private $_name = "";
    private $_clients = [];
    /**
     * Constructor
     */
    function __construct($name) {
        $this->_name = $name;
    }
    
    function addClient($client){
        array_push($this->_clients, $client);
    }
    
    function send($client, $message){
        foreach ($this->_clients as $myClient){
            if ($myClient != $client){
                $myClient->getListener()->receive($client, $this, $message);
            }
            
        }  
    }
    
    function getOccupants(){
        return $this->_clients;
    }
}
