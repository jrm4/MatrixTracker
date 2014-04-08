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
    protected $hovercraft; // HOVERCRAFT
    
    //properties dependent on other classes
    
    
    

    
    public function __construct($name = null) {
      
        if ($name !== null) {
            $this->setName($name);
        }
        
        
        //sane defaults
        $this->setIs_redpill(TRUE);
        $this->setHealth(10);
        $this->setRank(0);
        $this->setIs_jackedin(FALSE);
        $this->setHovercraft(NULL);
       

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
        
        public function setHovercraft($hovercraft){
            $this->hovercraft = $hovercraft;
        }
 
        public function getHovercraft(){
            return $this->hovercraft;
        }
        
        
        // MORE LOGIC
 
            }
            ?>
