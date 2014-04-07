<?php

include('formfunctions.php');
require('../human.php');
 
 $validationErrors = array();
 
 if (count($_POST) > 0 ){
     
     // Check to see if $humanname is a valid name
     $result = checkAcceptableCharacters($_POST['humanname']);
        if ($result === false){
            $validationErrors[] = "Error! Weird Characters! Try Again";
        }
     
      $result = checkStringLengthGreaterThan($_POST['humanname']);
        if ($result === false){
            $validationErrors[] = "Error! Too short. Try again.";
        }
     
      $result = checkStringLengthLessThan($_POST['humanname ']);
        if ($result === false){
            $validationErrors[] = "Error! Too LONG. Try again.";
        }
        

  if (count($validationErrors) == 0) {   
      

     $humanname = $_POST['humanname'];
     $is_redpill = $_POST['is_redpill'];
     $rank = $_POST['rank'];
     $health = $_POST['health'];
      
     #convert string to boolean
     $is_redpill = filter_input($is_redpill, FILTER_VALIDATE_BOOLEAN);
     
     #will almost certainly need some validation here, guessing accessing post directly is naughty
     $curr_human = new Human($humanname);
     
     $curr_human->setIs_redpill($is_redpill);
     
     // all this input needs way more validation.
     $curr_human->setRank($rank);
     $curr_human->setHealth($health);

     $curr_human->fullhumanreport();
    
    
     
     
      exit();
  }

  foreach($validationErrors as $err){
    echo "<p> " . $err . " </p>";
}
  }
?>
        
<h4> Add new human </h4>
        <form action="addhuman.php" method="post">
            Please enter a name: <input name="humanname" type="text" />
            <br>
            Birthtype:<br> 
            <input type="radio" name="is_redpill" value="TRUE"> Redpill <br>
            <input type="radio" name="is_redpill" value="FALSE"> Natural-Born <br>
            <br>
            Rank: 
            <!-- <input type="text" name="rank" /><br> -->
            <select name="rank">
                <?php
                for ($rank = 0; $rank <= 10; $rank++){
                        echo "<option value='$rank'> $rank </option>";
                }
                        ?>
            </select>
            Health:  
            <select name="health">
                <?php
                for ($health = 0; $health <= 10; $health++){
                        echo "<option value='$health'> $health </option>";
                }
                        ?>
            </select>
            <select>
            Hovercraft assignment?
            <?php
               echo "<option value=''> None Assigned </option>";
               //this should be easy:
               
               $db = new Dbconn('localhost','Matrix','root','p|||p');
               $hmapper = new HovercraftMapper($db);
               
               $allhovercrafts = $hmapper->retrieveAllHovercrafts();
               

               
               foreach($allhovercrafts as $hovercraft){
                   echo "<option value=$hovercraft> $hovercraft->getName() </option>";
               }
            ?>
            </select>
          
            <br>
            <input type="submit" />
        </form>
    </body></html>