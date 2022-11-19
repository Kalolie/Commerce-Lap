<?php
// PDO DATA BASE CONNECTE CLASS

class PDODB{
      protected $HostName ;
      protected $UserName ;
      protected $Password ;
      protected $DBName ;
      protected $port ;
     
    public function __construct($HostName,$UserName,$Password,$DBName ,$port=null){
          $this->HostName = $HostName;
          $this->UserName = $UserName;
          $this->Password = $Password;
          $this->DBName = $DBName;
          $this->port = $port;
    
    }
   
    public function PDOConnecte(){
        try {
            $Host = $this->HostName;
            $DBNamed =  $this->DBName;
            $UserDB = $this->UserName;
            $mdp = $this->Password;
            $db = new PDO("mysql:host=$Host;dbname=$DBNamed",$UserDB,$mdp);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
         } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
       }

    }
    
}
// PDO DATA BASE CONNECTE CLASS
