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
             
           
           if ($humanObj->getId_hovercraft() == NULL){
               echo "No hovercraft assigned";
           }
              else {
                  "Hovercraft assignment: "; // query magic here
              }
        }
              
              ?>
