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
        
    }
    
    function retrieveLocation($id_location){
                $conn = $this->dbconn->getConnection();
        
        //Run a query
        $result = $conn->query("SELECT * FROM location WHERE id_location = $id_location;");      
        
        //Results from the databse will be converted into Student objects
        $result->setFetchMode(PDO::FETCH_CLASS, 'Location');           
        $locations = $result->fetch(); 
        
        return $locations;
        }
    
        
    function retrieveAllLocations(){
    
     
        $conn = $this->dbconn->getConnection();
        
        $result = $conn->query('SELECT * from location');
        
        //test stuff
        
    
        
       $result->setFetchMode(PDO::FETCH_CLASS, 'Location');
       $locations = $result->fetchAll();
        
        return $locations;
      
    }
      
    function retrieveLocationByName($locationname){
                $conn = $this->dbconn->getConnection();
        
        //Run a query
        $result = $conn->query("SELECT * FROM location WHERE name = $locationname;");      
        
        //Results from the databse will be converted into Student objects
        $result->setFetchMode(PDO::FETCH_CLASS, 'Location');           
        $locations = $result->fetch(); 
        
        return $locations;
        }
        
        
       
     /*
       if (count($locations) = 1) {
           return $locations[0];
       }
       elseif (count($locations) = 0) {
           echo "THAT LOCATION NOT FOUND";
       }
       else {
           echo "weird ass error";
       }
        
       */
    }
       
    
