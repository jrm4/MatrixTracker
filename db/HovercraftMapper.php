<?php

class HovercraftMapper
{
    protected $dbconn;

    function __construct($dbconn) {
        $this->dbconn = $dbconn;
    }
    
    function createHovercraft(Hovercraft $hovercraftObj) {
        //Connect to database by creating PDO Object
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO hovercraft (name, is_functional, is_jackedin, id_location) "
                . "                             VALUES (:name, :func, :jack, :loc)");
        
        $stmt->bindParam(':name', $hovercraftObj->getName());
        $stmt->bindParam(':func', $hovercraftObj->getIs_functional());
        $stmt->bindParam(':jack', $hovercraftObj->getIs_jackedin());
        $stmt->bindParam(':loc', $hovercraftObj->getId_location());
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
       
        }
    
    function retrieveAllHovercrafts(){
    
     
        $conn = $this->dbconn->getConnection();
        
        $result = $conn->query('SELECT * from hovercraft');
        
        //test stuff
        
    
        
       $result->setFetchMode(PDO::FETCH_CLASS, 'hovercraft');
       $hovercrafts = $result->fetchAll();
        
        return $hovercrafts;
      
    }
    
    function retrieveHovercraft($id_hovercraft)
    {
                //Connect to database by creating PDO object
        $conn = $this->dbconn->getConnection();
        
        //Run a query
        $result = $conn->query("SELECT * FROM hovercraft WHERE id_hovercraft = $id_hovercraft;");      
        
        //Results from the databse will be converted into Student objects
        $result->setFetchMode(PDO::FETCH_CLASS, 'hovercraft');           
        $hovercrafts = $result->fetch(); 
        
        return $hovercrafts;  
    }
    
    function updateHovercraft($hovercraftObj){
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare("UPDATE hovercraft SET name = :name, is_functional = :func, 
                            is_jackedin = :jack, id_location = :loc WHERE id_hovercraft = :id");
        
        $stmt->bindParam(':name', $hovercraftObj->getName());
        $stmt->bindParam(':func', $hovercraftObj->getIs_functional());
        $stmt->bindParam(':jack', $hovercraftObj->getIs_jackedin());
        $stmt->bindParam(':loc', $hovercraftObj->getId_location());
        $stmt->bindParam(':id', $hovercraftObj->getId_hovercraft());
        $result = $stmt->execute();
        
        if ($result === false){
            var_dump($conn->errorCode());
        }
        
        return $result;
    }
        
    function deleteHovercraft($id_hovercraft){
            
            $conn = $this->dbconn->getConnection();
            
            $stmt = $conn->prepare('DELETE FROM hovercraft WHERE id_hovercraft = :id');
            
            $stmt->bindParam(':id', $id_hovercraft);
            
             $result = $stmt->execute();
        
        if ($result === false){
            echo "throwin the error";
            var_dump($conn->errorCode());
        }
            
            
        }
        
   function retrieveHovercraftsByColumn($column, $value){
            
            $whitelist = array('name','is_functional','is_jackedin','id_location');
 
            if (array_search($column, $whitelist) === false){
                echo "bad query";
                return NULL;
            }
            else {
                         $conn = $this->dbconn->getConnection();
         
         $stmt = $conn->prepare("SELECT * FROM `hovercraft` WHERE $column = :value;");
         $stmt->bindParam(':value', $value);
         
         $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_CLASS, 'hovercraft'); 
         $result = $stmt->fetchAll();
         
         return $result;
                
                
            }
    }   
}
    