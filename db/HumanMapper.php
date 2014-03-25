<?php

class HumanMapper
{
    protected $dbconn;

    function __construct($dbconn) {
        $this->dbconn = $dbconn;
    }
    
    function createHuman($humanObj) {
        //Connect to database by creating PDO Object
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO human (name, is_redpill, is_jackedin, health, rank) VALUES (:name, :red, :jack, :health, :rank)");
        
        $stmt->bindParam(':name', $humanObj->getName());
        $stmt->bindParam(':red', $humanObj->getIs_redpill());
        $stmt->bindParam(':jack', $humanObj->getIs_jackedin());
        $stmt->bindParam(':health', $humanObj->getHealth());
        $stmt->bindParam(':name', $humanObj->getRank());
        
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
       
    }
    
    function retrieveHumans(){
    
     
        $conn = $this->dbconn->getConnection();
        
        $result = $conn->query('SELECT * from human');
        
        //test stuff
        
    
        
       $result->setFetchMode(PDO::FETCH_CLASS, 'human');
       $humans = $result->fetchAll();
        
        return $humans;
      
    }
    /*
    function updateHuman(){
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare("UPDATE human SET ")
        
    }
    */
    }