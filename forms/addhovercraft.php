<?php


include('formfunctions.php');
require('../hovercraft.php');
 
 $validationErrors = array();
 
 if (count($_POST) > 0 ){
     
     // Check to see if $humanname is a valid name
     $result = checkAcceptableCharacters($_POST['name']);
        if ($result === false){
            $validationErrors[] = "Error! Weird Characters! Try Again";
        }
     
      $result = checkStringLengthGreaterThan($_POST['name']);
        if ($result === false){
            $validationErrors[] = "Error! Too short. Try again.";
        }
     
      $result = checkStringLengthLessThan($_POST['name']);
        if ($result === false){
            $validationErrors[] = "Error! Too LONG. Try again.";
        }
        

  if (count($validationErrors) == 0) {   
      

     $name = $_POST['name'];
     $is_functional = $_POST['is_functional'];
 
     $curr_hovercraft = new Hovercraft($name);
    
     $curr_hovercraft->fullhovercraftreport();
     
     
      exit();
  }

  foreach($validationErrors as $err){
    echo "<p> " . $err . " </p>";
}
  }
?>
        
<h4> Add new Hovercraft </h4>
        <form action="addhovercraft.php" method="post">
            Please enter a name: <input name="name" type="text" />
            <br>
            Is the craft currently functional?<br> 
            <input type="radio" name="is_functional" value="TRUE"> Yes <br>
            <input type="radio" name="is_functional" value="FALSE"> No <br>
            
            
          
            <br>
            <input type="submit" />
        </form>
    </body></html> 