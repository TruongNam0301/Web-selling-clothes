<?php
    include_once("DataProvider.php");
    class TypeClothesMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getTypeClothes($type){
            $sql = "SELECT * FROM typeclothes WHERE type= $type";
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
        public function getTypeClothesByType($typeId){
            $conn = mysqli_connect("localhost","root","","sellclothes");
            $sql = "SELECT * FROM typeclothes WHERE type = $typeId";
            $result = mysqli_query($conn,$sql);
            $typeClothes = array();
            if(mysqli_num_rows($result)>0){
                while($type = mysqli_fetch_assoc($result)){
                    $typeClothes[] = $type;
                }
                return $typeClothes;
            }
            else{
                return null;
            }
           
        }

    }


?>