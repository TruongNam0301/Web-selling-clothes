<?php
    include_once("DataProvider.php");
    class TypeClothesMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getTypeClothes(){
          
            $sql = "SELECT * FROM typeclothes";
            $types = $this->db->FetchAll($sql);
            $typeClothes = array();
            if($this->db->NumRows($sql)){
               foreach($types as $types){
                    $typeClothes[] = $types;
                }
                return $typeClothes;
            }
            else{
                return null;
            }
           
        }
    }


?>