<?php



 class Crew {
     protected $id_crew;
     protected $hovercraftName; //hovercraft 
     protected $captain;  // Human
     protected $operator; // Human
     protected $crewlist;  // Array of humans
     
     
    
    
    
     public function __construct($hovercraftName){
         
         if ($hovercraftName == NULL){
             echo "ERROR, NO CRAFT SPECIFIED";
         }
         else {
            
            $this->setHovercraftName($hovercraftName);
            echo "Crew list for $hovercraftName intialized.";
            $this->crewlist = array();
         }
     }
     
   #Some sort of indicator of adding crew to ship? Guess that's the name
     
   #Setter Getter
     
    public function setHovercraftName($hovercraftName){
        $this->hovercraftName = $hovercraftName;
    }
     
    public function getHovercraftName(){
        return $this->hovercraftName;
    }
    
    
    
    
     #board somebody
    
     public function addHuman(Human $human){
           
         $this->crewlist[] = $human;
         
         
     }
     
     
    #PF - assign as captain
    #PF - assign as operator
     
    #PF - calculate rank? or just do automatically?
     
     
     
     
     
     
    # Probably will change the below to something nice
     public function fullcrewreport(){
         
         echo "<h3>Full Crew Report:</h3>";
         
         if ($this->crewlist == NULL ){
             echo "<br>Empty crew. Assign Personnel";
         }
         else {
         
        
         echo "<br>.";
         echo "Your crew:";
         
         foreach ($this->crewlist as $crewmember){
             echo "<li>" . $crewmember->getName() . "</li>";
         }
     }
     
     }
 

 }