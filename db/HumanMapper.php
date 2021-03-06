<?php

class HumanMapper
{
    protected $dbconn;

    function __construct($dbconn) {
        $this->dbconn = $dbconn;
    }
    
    function createHuman(Human $humanObj) {
        //Connect to database by creating PDO Object
        
        $conn = $this->dbconn->getConnection();

        
        $stmt = $conn->prepare("INSERT INTO human (name, is_redpill, is_jackedin, health, rank, id_hovercraft) VALUES (:name, :red, :jack, :health, :rank, :hov)");

        
        $stmt->bindParam(':name', $humanObj->getName());
        $stmt->bindParam(':red', $humanObj->getIs_redpill());
        $stmt->bindParam(':jack', $humanObj->getIs_jackedin());
        $stmt->bindParam(':health', $humanObj->getHealth());
        $stmt->bindParam(':rank', $humanObj->getRank());
        $stmt->bindParam(':hov', $humanObj->getId_hovercraft());
        
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
        
    
        
       $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'human');
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
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'human');           
        $humans = $result->fetch(); 
        
        return $humans;  
    }
    
    function updateHuman($humanObj){
        
        $conn = $this->dbconn->getConnection();
        
        $stmt = $conn->prepare('UPDATE human SET name = :name, is_redpill = :red, is_jackedin = :jack, health = :health, rank = :rank, id_hovercraft = :hov WHERE id_human = :id');
        
        $stmt->bindParam(':id', $humanObj->getId_human());
        $stmt->bindParam(':name', $humanObj->getName());
        $stmt->bindParam(':red', $humanObj->getIs_redpill());
        $stmt->bindParam(':jack', $humanObj->getIs_jackedin());
        $stmt->bindParam(':health', $humanObj->getHealth());
        $stmt->bindParam(':rank', $humanObj->getRank());
        $stmt->bindParam(':hov', $humanObj->getId_hovercraft());
        
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
        
        
        function retrieveHumanByName($name){
         $conn = $this->dbconn->getConnection();
         
         $stmt = $conn->prepare("SELECT * FROM `human` WHERE name = :name;");
         $stmt->bindParam(':name', $name);
         
         $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'human'); 
         $result = $stmt->fetchAll();
         
         return $result;
         
         
      
         
    }
    
        function retrieveHumansByColumn($column, $value){
            
         

            $whitelist = array('name','is_redpill','is_jackedin','health','rank','id_hovercraft');
 
            if (array_search($column, $whitelist) === false){
                echo "bad query";
                return NULL;
            }
            else {
                         $conn = $this->dbconn->getConnection();
         
         $stmt = $conn->prepare("SELECT * FROM `human` WHERE $column = :value;");
         $stmt->bindParam(':value', $value);
         
         $stmt->execute();
         
         //THIS IS MIND BOGGLINGLY stupid and I have no idea why the default behavior 
         // works this way. But lets explain: without the FETCH_PROPS_LATE bit below
         // the function FIRST grabs the data and THEN runs the constructor, which
         // means that any default constructor data will OVERWRITE what you've pulled
         // from the db.  insane. 
        
         
         $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'human'); 
         $result = $stmt->fetchAll();
         
         return $result;
                
                
            }
            
            
            
        }
        
        
}


    