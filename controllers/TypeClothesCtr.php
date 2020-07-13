<?php
include_once('../models/TypeClothesMdl.php');
class TypeClothesCtr{
    public function getTypeClothes(){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getTypeClothes();
        include_once('../views/productPage/listtypeclothes.php');
    }
    public function getTypeClothesByType($type){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getTypeClothesBy($type['id']);
        include_once('../views/homePage/clothing.php');
    }
}
?>