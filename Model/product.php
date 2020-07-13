<?php 
    include_once("../Model/DataProvider.php");
    class Product{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getTypeClothes(){
            return $this->db->FetchAll("SELECT * FROM typeclothes");
        }
        public function getClothes($idType,$page){
            $start = ($page-1)*6;
            if($idType == 0){
                $sql="SELECT id,name,price,picture FROM clothes LIMIT $start,12";
            }
            else{
                $sql = "SELECT id,name,price,picture FROM clothes WHERE id_type = $idType LIMIT $start,6" ;
            }
            return $this->db->FetchAll($sql);
        }
        public function getPagination($idType,$page){
            if($idType == 0){
                $sql2="SELECT id FROM clothes ";
            }
            else{
                $sql2 = "SELECT id FROM clothes WHERE id_type = $idType " ;
            }
            return $this->db->NumRows($sql2);
        }
    }
    
?>