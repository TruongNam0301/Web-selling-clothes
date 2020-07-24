<?php
    include_once("DataProvider.php");
    class ConTactMdl {
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function UpContactToAdmin($user,$string){
           $sql="INSERT INTO contact VALUES (NULL,)"
        }
    }
?>