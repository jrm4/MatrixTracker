<?php
session_start();

var_dump($_POST);
if ($_SESSION['is_logged_in'] != "yes"){
     header("Location: unauth.php");
}

//$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once("../allrequires.php"); 


      
 if (count($_POST) > 0 ){
     

     /* Check to see if $humanname is a valid name
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
       */
     
     
     // do this later, yo
     $validationErrors = 0;

    if (count($validationErrors == 0)) {
      
           echo "yes post count";
        
     $name = $_POST['name'];
     $is_redpill = $_POST['is_redpill'];
     $rank = $_POST['rank'];
     $health = $_POST['health'];
     
     if ($_POST['id_hovercraft' != ''])
     $id_hovercraft = $_POST['id_hovercraft'];
      
     
     
     if ($is_redpill == "TRUE"){
         $is_redpill_boolean = 1;
         echo "redpill is true";
     }
     elseif ($is_redpill == "FALSE"){
         $is_redpill_boolean = 0;
         echo "redpill is false";
     }
     else{
         echo "ERROR. Redpill or natural?";
         exit();
     }
        

     #will almost certainly need some validation here, guessing accessing post directly is naughty
     $curr_human = new Human($name);
     
     $curr_human->setIs_redpill($is_redpill_boolean);
     
     // all this input needs way more validation.
     $curr_human->setRank($rank);
     $curr_human->setHealth($health);

     $curr_human->setId_hovercraft($id_hovercraft);
     
     $humanmapper->createHuman($curr_human);
     echo "human added<br>";
    
        
   echo '<a href="addnew.php"> Back to add menu </a>';
      exit();
  }

  foreach($validationErrors as $err){
    echo "<p> " . $err . " </p>";
}
  }
     
    
   echo '<a href="addnew.php"> Back to add menu </a>';
     
     