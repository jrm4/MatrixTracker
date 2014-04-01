<?php

 class Hovercraft {
     
     protected $id_hovercraft;
     protected $name;
     protected $is_functional;
     protected $is_jackedin;

     
     //class location
     protected $location;
     
     //crew is an array of humans
     protected $crew;
 
     // class human
     protected $captain;
     protected $operator;
     
     
    public function __construct($name = NULL) {
       
      if ($name !== null) {
            $this->setName($name);
        }
        
        //sensible defaults
        
        $this->setIs_functional(TRUE);
        $this->setIs_jackedin(FALSE);        
        $this->setLocation("Zion");
        $this->setCrew(NULL);
        

        
       
        
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
        
        public function setLocation($location){ #move the ship
            $this->location = $location;
       
        }
        
        public function getLocation(){ #where's the ship?
            return $this->location;
        }
        
       
        public function setCrew($crew){ #Assign crew to ship
            $this->crew = $crew;
        }
        
        public function getCrew(){ 
            return $this->crew;
        }
       
         public function setCaptain($captain) {
            $this->captain = $captain;
        }
        
        public function getCaptain() {
            return $this->Captain;
    
        }
        
         public function setOperator($name) {
            $this->operator = $name;
        }
        
        public function getOperator() {
            return $this->operator;
    
        }
        
        
        
        # CREW
        
     public function addHuman(Human $human){
           
         $this->crew[] = $human;
         
         
     }
        
     public function removeHuman(Human $human){
         
         //I dont know how to do this?
     }
     
     
        
       //probably break this up into something prettier?
     
        public function fullhovercraftreport(){
            echo "<h1> Full Status for: " . $this->name . "</h1>";
            echo "<br>";
            
 
            
//           if ($this->crew == NULL){
//               echo "Empty ship: Please add personnel<br>";
//            }
            
            if ($this->is_functional){
                echo "Craft is functional<br>";
            }
            else {
                echo "There is a problem with the craft<br>";
            }    
            
            if ($this->is_jackedin){
                echo "PROCEED WITH CAUTION: CRAFT IS BROADCASTING TO MATRIX";
            }
            
            echo "<br>";
            echo "Current Location is: " . $this->location ;
            echo "<br>";
            
            echo "<h3>Crew report</h3>";
            echo "<br>";
            
            if ($this->crew == NULL){
                echo "No crew ASSIGNED yet.";
            }
            else { 
                echo "crew assigned";
            }
            

            echo "<br>-------------<br>";
            
            
           
        }        

        
             public function fullcrewreport(){
         
         echo "<h3>Full Crew Report:</h3>";
         
         if ($this->crew == NULL ){
             echo "<br>Empty crew. Assign Personnel";
         }
         else {
         
        
         echo "<br>.";
         echo "Your crew:";
         
         foreach ($this->crew as $crewhuman){
             echo "<li>" . $crewhuman->getName() . "</li>";
         }
     }
     
     }
        
 }

   ?>
 
        
   
     

    
    
 

