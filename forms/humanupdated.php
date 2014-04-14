<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "$root/allrequires.php"; 


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
      
     //      echo "yes post count";
      
           
           
           
     $id_human = $_POST['id_human'];
     //$name = $_POST['name'];

     
     $is_jackedin = $_POST['is_jackedin'];
     
        if ($is_jackedin == "TRUE")
            $is_jackedin_bool = 1;
        elseif ($is_jackedin == "FALSE")
            $is_jackedin_bool = 0;
        else
            $is_jackedin_bool = NULL;
     
     var_dump($_POST);
     
       
     if ($_POST['rank'] != '')
        $rank = $_POST['rank'];
     
     if ($_POST['health'] != '')
        $health = $_POST['health'];
  
     
   $curr_human = $humanmapper->retrieveHuman($id_human);
   echo "curr human on retrieval <br>"  ;
   
   var_dump($curr_human);
   echo "done";
   
   $old_hov = $hovercraftmapper->retrieveHovercraft($curr_human->getId_hovercraft());
   
  
     
     if ($_POST['id_hovercraft'] != '' ){
        $id_hovercraft = $_POST['id_hovercraft'];
        $curr_human->setId_hovercraft($id_hovercraft);
     }
       else {
        echo "<br>Hovercraft unchanged<br>";
        $is_hovercraft_changed = "FALSE";
    }

 
  echo "<br> First dump <br>" ;
    var_dump($_POST);
    
   
    
    
    
     // all this input needs way more validation.
    
     var_dump($rank);
    
    if ($rank != ''){
    $curr_human->setRank($rank);
    }
    
    if ($health != ''){
    $curr_human->setHealth($health);
    }
    
    $curr_human->setIs_jackedin($is_jackedin_bool);

     echo "<br>";
     var_dump($curr_human);
     
       echo "<Br><br>curr human on modification <br>"  ;
   
   var_dump($curr_human);
   echo "done";
   
     
     
  if ($is_hovercraft_changed == "FALSE"){
      echo "Hovercraft assignment unchanged";
  }
  else {   
    
      echo "Reassiging ";
     echo $curr_human->getName();
     echo " from ";
     echo $old_hov->getName();
     echo " to ";
     

     $currhovercraft = $hovercraftmapper->retrieveHovercraft($id_hovercraft);
     
     echo $currhovercraft->getName();
     
   
  }    echo "<br>human updated<br>";
    
  
  $humanmapper->updateHuman($curr_human);
    
   echo '<a href="addnew.php"> Back to add menu </a>';
      exit();
  }

  foreach($validationErrors as $err){
    echo "<p> " . $err . " </p>";
}
  }
     session_destroy();
    
   echo '<a href="addnew.php"> Back to add menu </a>';
     
     