<?php
    include_once("DataProvider.php");
    class TypeClothesMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
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
        public function getTypeClothesByType($typeId){
           
            $sql = "SELECT * FROM typeclothes WHERE type = $typeId";
            
            if($this->db->NumRows($sql)){
              
                return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
           
        }

    }


?>