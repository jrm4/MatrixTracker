<?php

 class Hovercraft {
     
     protected $id_hovercraft;
     protected $name;
     protected $is_functional;
     protected $is_jackedin;

     
     //class location
     protected $id_location;
     
     // class human
     //protected $captain;
     //protected $operator;
     
     
    public function __construct($name = NULL) {
       
      if ($name !== null) {
            $this->setName($name);
        }
        
        //sensible defaults
        
        $this->setIs_functional(TRUE);
        $this->setIs_jackedin(FALSE);        
       //$this->setLocation("Zion")
        
    }

   
       public function getId_hovercraft(){
           return $this->id_hovercraft;
       }
   
       public function setName($name) {
            $this->name = $name;
        }
        
        public function getName() {
            return $this->name;
    
        }
        
       
        public function setIs_jackedin($is_jackedin){
            $this->is_jackedin = $is_jackedin;
        }
 
        public function getIs_jackedin(){
            return $this->is_jackedin;
        }
        
        
       
        public function setIs_functional($is_functional){
            $this->is_functional = $is_functional;
        }
 
        public function getIs_functional(){
            return $this->is_functional;
        }
        
        public function setId_location($id_location){ #move the ship
            $this->id_location = $id_location;
       
        }
        
        public function getId_location(){ #where's the ship?
            return $this->id_location;
        }
        /*
         public function setCaptain(Human $captain) {
            $this->captain = $captain;
        }
        
        public function getCaptain() {
            return $this->Captain;
    
        }
        
         public function setOperator(Human $operator) {
            $this->operator = $operator;
        }
        
        public function getOperator() {
            return $this->operator;
    
        }
        
   */
     
        
      

        
 }

   ?>
 
        
   
     

    
    
 

