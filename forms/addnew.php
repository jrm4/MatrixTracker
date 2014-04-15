<?php

session_start();


//$_SESSION['is_logged_in'] = "yes";

if ($_SESSION['is_logged_in'] != "yes"){
     header("Location: unauth.php");
     exit();
}


?>

<h1> Add/Update page. What would you like to do?</h1>

<a href="addlocation.php"> Add New Location</a>
<br>
<a href="addhovercraft.php"> Add New Hovercraft</a>
<br>
<a href="addhuman.php"> Add New Human</a>
<br>
<br>
<a href="updatehovercraft.php"> Update existing Hovercraft </a>
<br>
<a href="updatehuman.php"> Update Human <a/>
    <br>
    <br>
<a href="../recursivereport.php"> Issue full report </a>
<br><br><br>
<a href="logout.php"> logout <a/>

