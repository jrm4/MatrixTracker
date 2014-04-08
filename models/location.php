<?php

// Note, for now, this class is included largely as a placeholder.
// You would probably not create a separate class if it were just "name", since that's a simple string.
// BUT, if I get ambitious, I might do something crazy like add GPS coordinates.

// Either way, I've "future-proofed' my code by doing it like this. 


class Location

{
    protected $id_location;
    protected $name;
    
        public function __construct($name = null) {
      
        if ($name !== null) {
            $this->setName($name);
        }
        }
    
        public function getId_location(){
            return $this->id_location;
        }
        
        public function setName($name) {
            $this->name = $name;
        }
        
        public function getName() {
            return $this->name;
        }
}

?>