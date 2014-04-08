<?php
     
        function fullhumanreport(Human $humanObj){
            echo "<h1>Full report for " . $humanObj->getName() . "</h1>";
           echo "PK id is" . $humanObj->getId();
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
             
           
           if ($humanObj->getHovercraft() === NULL){
               echo "No hovercraft assigned<br>";
           }
              else {
                  echo "<br>";               
                  echo $humanObj->getName() . " has been assigned to the ";
                  echo $humanObj->getHovercraft()->getName();            
                  echo "<br>";
                  echo "<br>";
              }
        }
        
        
        
               //probably break this up into something prettier?
     
        function fullhovercraftreport(Hovercraft $hovercraft){
            echo "<h1> Full Status for: " . $hovercraft->getName() . "</h1>";
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
                $curr_loc = $hovercraft->getId_Location();   
            echo "<br>";
            echo "Current Location is: " . $curr_loc->getName();
            echo "<br>";
            }
            
         


            echo "<br>-------------<br>";
         
            
           
        }  

