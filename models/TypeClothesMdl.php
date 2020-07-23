<?php
    include_once("DataProvider.php");
    class TypeClothesMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        function __destruct(){
            return $this->db->__destruct();
        }
        public function getTypeClothes($type){
            $sql = "SELECT * FROM typeclothes WHERE type= $type";
            if($this->db->NumRows($sql)){
                return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
           
        }
        public function getAllTypeClothes(){
            $sql = "SELECT * FROM typeclothes ";
            if($this->db->NumRows($sql)){
                return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
           
        }
        public function getOneTypeClothes($idType){
            $sql = "SELECT * FROM typeclothes WHERE id_type=$idType";
            if($this->db->NumRows($sql)){
                return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
           
        }


    }


?>