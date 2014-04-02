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
        $stmt->bindParam(':rank', $humanObj->getRank());
        
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
       
    }
    
    function retrieveAllHumans(){
    
     
        $conn = $this->dbconn->getConnection();
        
        $result = $conn->query('SELECT * from human');
        
        //test stuff
        
    
        
       $result->setFetchMode(PDO::FETCH_CLASS, 'human');
       $humans = $result->fetchAll();
        
        return $humans;
      
    }
    
    function retrieveHuman($id_human)
    {
                //Connect to database by creating PDO object
        $conn = $this->dbconn->getConnection();
        
        //Run a query
        $result = $conn->query("SELECT * FROM human WHERE id_human = $id_human;");      
        
        //Results from the databse will be converted into Student objects
        $result->setFetchMode(PDO::FETCH_CLASS, 'human');           
        $humans = $result->fetch(); 
        
        return $humans;  
    }
    
    function updateHuman($humanObj){
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare('UPDATE human SET name = :name, is_redpill = :red, is_jackedin = :jack, health = :health, rank = :rank WHERE id_human = :id');
        
        $stmt->bindParam(':id', $humanObj->getId());
        $stmt->bindParam(':name', $humanObj->getName());
        $stmt->bindParam(':red', $humanObj->getIs_redpill());
        $stmt->bindParam(':jack', $humanObj->getIs_jackedin());
        $stmt->bindParam(':health', $humanObj->getHealth());
        $stmt->bindParam(':rank', $humanObj->getRank());
        
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
    }
        
    function deleteHuman($id_human){
            
            $conn = $this->dbconn->getConnection();
            
            $stmt = $conn->prepare('DELETE FROM human WHERE id_human = :id');
            
            $stmt->bindParam(':id', $id_human);
            
             $result = $stmt->execute();
        
        if ($result === false){
            echo "throwin the error";
            var_dump($conn->errorCode());
        }
            
            
        }
    }   
    
    