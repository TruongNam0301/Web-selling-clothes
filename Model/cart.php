<?php 
    include_once("../Model/DataProvider.php");
    class Cart{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getItem($match){
            return $this->db->Fetch("SELECT * FROM clothes WHERE id=$match");
        }
    }
    
?>