<?php

class Dbconn
{
    protected $dbname;
    protected $dbhost;
    protected $dbuser;
    protected $dbpass;
    
    protected $conn;
    
    public function __construct($dbhost, $dbname, $dbuser, $dbpass)
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        
        $this->connect();
        
    }

    // -----------------------------------------
        
    public function getConnection()
    {
        return $this->conn;
    }
    
    // -----------------------------------------
    
    protected function connect()
    {
        //Connect to database by creating PDO object
        $this->conn = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}", $this->dbuser, $this->dbpass);
         
    }

}

?>

