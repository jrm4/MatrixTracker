<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "../allrequires.php";

//var_dump($_POST);

if (count($_POST) > 0){
    //echo "post is > 0";
    
    // put validation here, but for now, we'll just assume no errors'
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
        
        if ($name == ''){
            echo "no name given, try again";
            exit ();
        }
        
        $is_functional = $_POST['is_functional'];
        
        if ($is_functional == "TRUE")
            $is_functional_bool = 1;
        elseif ($is_functional == "FALSE")
            $is_functional_bool = 0;
        else
            $is_functional_bool = NULL;
        
       
        
        $id_location = $_POST['id_location'];

        

    $curr_hov = new Hovercraft($name);
    $curr_hov->setId_location($id_location);
    $curr_hov->setIs_functional($is_functional_bool);
    
    
    echo "<br>Hovercraft created in memory";
    
    $hovercraftmapper->createHovercraft($curr_hov);
    
    echo "<br>and on db";
    }
    
    
    $_POST = null;
    session_destroy();
    
   echo '<a href="addnew.php"> Back to add menu </a>';
    exit();
    
    
    
}  