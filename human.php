<?php

class Human

{
    //Properties
   
    protected $id_human;
    protected $name;
    protected $is_redpill;  // boolean
    protected $health;      // integer, 10 is healthy, 0 is dead
    protected $rank;        // integer, 10 is Council elder, 0 is brand new redpill, etc. 
    protected $is_jackedin;  // boolean
    

    
    public function __construct($name = null) {
      
        if ($name !== null) {
            $this->setName($name);
        }
        
        
        //sane defaults
        $this->setIs_redpill(TRUE);
        $this->setHealth(10);
        $this->setRank(0);
        $this->setIs_jackedin(FALSE);

    }
        
        public function getId(){
            return $this->id_human;
        }
        
        public function setName($name) {
            $this->name = $name;
        }
        
        public function getName() {
            return $this->name;
        }


        public function setIs_redpill($is_redpill){
            $this->is_redpill = $is_redpill;
        }
        
        public function getIs_redpill(){
            return $this->is_redpill;
        }
        
       public function setRank($rank){
            $this->rank = $rank;
        }
        
        public function getRank(){
            return $this->rank;
        }
        
        public function setHealth($health){
            $this->health = $health;
        }
        
        public function getHealth(){
            return $this->health;
        }
        
        public function setIs_jackedin($is_jackedin){
            $this->is_jackedin = $is_jackedin;
        }
 
        public function getIs_jackedin(){
            return $this->is_jackedin;
        }
        
        
        
        // MORE LOGIC
        
        public function fullhumanreport(){
            echo "<h1>Full report for " . $this->name . "</h1>";
            echo "<br>";
            
            if ($this->is_redpill){
                echo "Origin: Redpill";
            }
            else {
                echo "Origin: Natural-born";
            }
            
            echo "<br>";
            
            if ($this->health == 0){
                echo "DECEASED";
                }
            else {
                echo "Health Level = $this->health";
            }  
            
            echo "<br>";
            
            echo "Rank = $this->rank";
            echo "<br>";
            
            if ($this->is_jackedin){
                echo "PROCEED WITH CAUTION: JACKED IN";
            }
            
            
            
        }
        
        
    }


 // abstract class threat composed of robot or weather? 