<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "$root/allrequires.php";

var_dump($_POST);

if (count($_POST) > 0){
    echo "post is > 0";
    
    // put validation here, but for now, we'll just assume no errors'
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
        
        $is_functional = $_POST['is_functional'];
        $is_functional = filter_input($is_functional, FILTER_VALIDATE_BOOLEAN);
        
        $id_location = $_POST['id_location'];

        

    $curr_hov = new Hovercraft($name);
    $curr_hov->setId_location($id_location);
    $curr_hov->setIs_functional($is_functional);
    
    
    echo "<br>Hovercraft created in memory";
    
    $hovercraftmapper->createHovercraft($curr_hov);
    
    echo "<br>and on db";
    }
    
    
    $_POST = null;
    session_destroy();
    
   echo '<a href="addnew.php"> Back to add menu </a>';
    exit();
    
    
    
}  