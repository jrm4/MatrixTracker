<?php

///is full report broken?
     
function fullreport(){  
    
echo "<br><i>let's tell a story. The big ass update, if the sentinels get this info GOD HELP US ALL</i>";

echo "------------------------------------------------------------------";

//get all locations
$locationsarray = $locationmapper->retrieveAllLocations();

foreach ($locationsarray as $this_loc){
    echo "<h1> Location: ";
    echo $this_loc->getName();
    echo "</h1>";
    
    //get all hovercrafts at that location
    $hovercraftsarray = $hovercraftmapper->retrieveHovercraftsByColumn("id_location", $this_loc->getId_location());
    
    
    foreach ($hovercraftsarray as $hovercraft){
        echo "<h2> Hovercraft: ";
        echo $hovercraft->getName();
        echo "</h2>";
        
        //get all humans at that hovercraft
        $humansarray = $humanmapper->retrieveAllHumans();
        
        foreach ($humanarray as $human){
            echo "<h3> Crew member: ";
            echo $human->getName();
            echo "</h2>";
        }
       
    }
    
}
}



    function fullhumanreport(Human $humanObj){
            echo "<h1>Full report for " . $humanObj->getName() . "</h1>";
            echo "<br>"; 
         
            if ($humanObj->getIs_redpill()){
                echo "Origin: Redpill";
            }
            else {
                echo "Origin: Natural-born";
            }
            
            echo "<br>";
            
            if ($humanObj->getHealth() == 0){
                echo "DECEASED";
                }
            else {
                echo "Health Level = " . $humanObj->getHealth();
            }  
            
            echo "<br>";
            
            echo "Rank = " . $humanObj->getRank();
            echo "<br>";
            
            if ($humanObj->getIs_jackedin()){
                echo "PROCEED WITH CAUTION: JACKED IN";
           
               }
             
           
           if ($humanObj->getId_hovercraft() === NULL){
               echo "No hovercraft assigned<br>";
           }
              else {
                  echo "<br>";               
                  echo $humanObj->getName();
                  echo " has been assigned to the hovercraft id'd by ";
                  echo $humanObj->getId_hovercraft();            
                  echo "<br>";
                  echo "<br>";
              }
        }
        
        
        
               //probably break this up into something prettier?
     
        function fullhovercraftreport(Hovercraft $hovercraft){
            echo "<h1> Full Status for: " . $hovercraft->getName() . "</h1>";
            echo "<br> HOVERCRAFT id is " . $hovercraft->getId_hovercraft();
            echo "<br>";
            
//           if ($this->crew == NULL){
//               echo "Empty ship: Please add personnel<br>";
//            }
            
            if ($hovercraft->getIs_functional()){
            
                echo "Craft is functional<br>";
            }
            else {
                echo "There is a problem with the craft<br>";
            }    
         
            if ($hovercraft->getIs_jackedin()){
                echo "PROCEED WITH CAUTION: CRAFT IS BROADCASTING TO MATRIX<br>";
            }
            
        
            if ($hovercraft->getId_Location() == NULL){
                echo "ERROR: NO LOCATION SPECIFIED FOR CRAFT<br>";
            }           
        
        
            else {
                echo "grabbing location";
             
              
             
              
            echo "<br>";
            echo "Current Location is";
            echo "<br>";
            }
            
         


            echo "<br>-------------<br>";
         
            
           
        }  

