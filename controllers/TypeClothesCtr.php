<?php
include_once('../models/TypeClothesMdl.php');
class TypeClothesCtr{
    public function getTypeClothes(){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getTypeClothes();
        include_once('../views/productPage/listtypeclothes.php');
    }
}
?>