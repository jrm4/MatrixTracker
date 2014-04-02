<?php

class LocationMapper
{
    protected $dbconn;

    function __construct($dbconn) {
        $this->dbconn = $dbconn;
    }
    
    function createLocation(Location $locationObj) {
        //Connect to database by creating PDO Object
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO location (name) VALUES (:name)");
        
        $stmt->bindParam(':name', $locationObj->getName());
        
        
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
        
        //locations, maybe they do change or update or get deleted, but not sure on that one...
       
    }
}