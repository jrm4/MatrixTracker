<?php
session_start();
if ($_SESSION['is_logged_in'] != "yes"){
     header("Location: unauth.php");
}
      

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
//echo "root doc is $root";
require_once("../allrequires.php");


//var_dump($_POST);

if (count($_POST) > 0){
  //  echo "post is > 0";
    
    // put validation here, but for now, we'll just assume no errors'
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
 

    $curr_loc = new Location($name);
    
    echo $curr_loc->getName();
    echo " has been created in memory";
    
    $locationmapper->createLocation($curr_loc);
    
    echo " and on db";
    }
    
    
    $_POST = null;

    
   echo '<a href="addnew.php"> Back to add menu </a>';
    exit();
    
    
    
}  
?>


