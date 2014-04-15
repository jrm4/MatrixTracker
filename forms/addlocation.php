<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php


//-------------------------------------------------------------------------------------------
 session_start();


if ($_SESSION['is_logged_in'] != "yes"){ 
    header("Location: unauth.php");
     exit();
}
      




?>


<h4> Add Location </h4>

<form action="locationadded.php" method="post">
    Please identify new location: <input name="name" type="text" />
    <input type="submit" value="add new location">
    
</form>




    </body>
</html>