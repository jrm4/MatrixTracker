<?php
session_start();
if ($_SESSION['is_logged_in'] != "yes"){
     header("Location: unauth.php");
}

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once("../allrequires.php");


      


if (count($_POST) > 0){
   // echo "post is > 0";
    
    // put validation here, but for now, we'll just assume no errors'
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
        
        $is_functional = $_POST['is_functional'];
        if ($is_functional == "TRUE")
            $is_functional_bool = 1;
        elseif ($is_functional == "FALSE")
            $is_functional_bool = 0;
        else
            $is_functional_bool = NULL;
       
        
      $is_jackedin = $_POST['is_jackedin'];
        if ($is_jackedin == "TRUE")
            $is_jackedin_bool = 1;
        elseif ($is_jackedin == "FALSE")
            $is_jackedin_bool = 0;
        else
            $is_jackedin_bool = NULL;
        
        $id_hovercraft = $_POST['id_hovercraft'];
        $id_location = $_POST['id_location'];

        
        
       $rhovmapper = new HovercraftMapper($db);
    $curr_hov = $rhovmapper->retrieveHovercraft($id_hovercraft);
    
   // var_dump($curr_hov);
    
    
    $rlocmapper = new LocationMapper($db);
    
    $old_loc = $rlocmapper->retrieveLocation($curr_hov->getId_location());
    
    $curr_hov->setId_location($id_location);
    $curr_hov->setIs_functional($is_functional_bool);
    $curr_hov->setIs_jackedin($is_jackedin_bool);
    
    $currlocation = $rlocmapper->retrieveLocation($id_location);
    
    
    if ($old_loc->getId_location() == $currlocation->getId_location ()){
        echo "Hovercraft not moved";
    }
    else {
    echo " Moving " . $curr_hov->getName();
    echo " from ";
    echo $old_loc->getName();
    echo " to ";

    
    echo $currlocation->getName();
    }

    
   // var_dump($curr_hov);
    
   $hovresult =  $hovercraftmapper->updateHovercraft($curr_hov);
    
  // echo"<br>result is $hovresult";
   
   
   
   

    }
    
    
    $_POST = null;
    session_destroy();
    
   echo '<a href="addnew.php"> Back to add menu </a>';
    exit();
    
    
    
}  