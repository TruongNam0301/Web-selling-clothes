<?php
    include_once('../models/TypeMdl.php');
    include_once("TypeClothesCtr.php");
    class TypeCtr{
        public function getType(){
            $TypeMdl = new TypeMdl();
            $typeArr = $TypeMdl->getType();
            $TypeClothesCtr = new TypeClothesCtr();
            foreach($typeArr as $type){
                $typeClothes = $TypeClothesCtr->getTypeClothesByType($type);
            }
        }
    }


?>