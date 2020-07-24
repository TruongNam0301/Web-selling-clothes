<?php
    include_once('./models/TypeMdl.php');
    include_once("TypeClothesCtr.php");
    class TypeCtr{
        public function getType(){
            $TypeMdl = new TypeMdl();
            $typeArr = $TypeMdl->getType();
            $TypeClothesCtr = new TypeClothesCtr();
            foreach($typeArr as $type){
                $typeClothes = $TypeClothesCtr->getTypeClothesByType($type);
                include_once("./views/homePage/clothing.php");
            }
        }
        public function getOneType($id){
            $TypeMdl = new TypeMdl();
            $type = $TypeMdl->getOneType($id);
            echo $type[0]['nametype'];
        }

        public function getTypeIpad(){
            $TypeMdl = new TypeMdl();
            $typeArr = $TypeMdl->getType();
            $TypeClothesCtr = new TypeClothesCtr();
            foreach($typeArr as $type){
                $typeClothes = $TypeClothesCtr->getTypeClothesByTypeIpad($type);
             
            }
        }
        
    }


?>