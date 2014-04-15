<?php

session_start();



 if (count($_POST) > 0) {
     // we;ve been here before
     if ($_POST['un'] == "user" && $_POST['pw'] == "pass") {
         // password correct
         echo "passwords correct";
         $_SESSION['is_logged_in'] = "yes";
         header("Location: addnew.php");
         
     }
     else
     {
         echo "Sorry, try again";
         
     }
 }
 else {
     echo "hey, looks like you're new here";
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessions!</title>
    </head>
    <body>
        
        <h1>Login Page - Can login here.  Available to everyone.</h1>    
        
        <form method='post' action='login.php'>
        
            <p>
                <label for='un'>Username</label>
                <input type='text' name='un' id='un' />
            </p>
            
            <p>
                <label for='pw'>Password</label>
                <input type='password' name='pw' id='pw' />
            </p>
            
            <p>
                <button type='submit'>Log Me In!</button>
            </p>
        
        </form>
    </body>
</html>

