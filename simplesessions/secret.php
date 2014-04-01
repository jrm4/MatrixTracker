<?php

    //Tell PHP we are going to be using sessions
   session_start();

    if (isset($_SESSION['is_logged_in'])) {
      
      echo "welcome <br>";
      session_destroy();
    }
    else{
        //header("Location: login.php");
        echo "sneaky fool. you're not supposed to be here.";
        session_destroy();
        exit();
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessions!</title>
    </head>
    <body>
        
        <h1>Secret Page - Only Avaiable to those who have logged in</h1>        
    </body>
    
    
    <?php
    echo "destroying session now";
    session_destroy();
    ?>
    
    </html>

