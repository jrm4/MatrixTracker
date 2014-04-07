<?php



   function checkAcceptableCharacters($str)
   {
        $allowedChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWYZabcdefghijlkmnopqrstuvwxyz -'";
    
        for($i = 0; $i < strlen($str); $i++) {

            $currChar = $str{$i};
            $isValid = (strpos($allowedChars, $currChar) !== false);

            if ($isValid === false) {
                return false;
            }
        }
        
        //If made it here
        return true;
   }

   // -------------------------------------------------------------
   
   function checkStringLengthGreaterThan($str, $checkLength = 2)
   {
       return (strlen($str) > $checkLength);
   }

      
   function checkStringLengthLessThan($str, $checkLength = 75)
   {
       return (strlen($str) < $checkLength);
   }
   
   function checkrangeinclusive($int, $lower, $upper){
       
      if ($int >= $lower && $int <= $upper) {
          return true;
      } 
     else {
          return false;
          
      }
   }