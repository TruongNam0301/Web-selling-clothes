<?php
    include_once("DataProvider.php");
    class ProductMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }

        public function getProduct($id){
            $sql="SELECT * FROM clothes WHERE id= $id";
            return $this->db->Fetch($sql);
        }
    }

?>