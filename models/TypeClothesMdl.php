<?php
    class TypeClothesMdl{
        public function getTypeClothes(){
            $conn = mysqli_connect("localhost","root","","sellclothes");
            $sql = "SELECT * FROM typeclothes";
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