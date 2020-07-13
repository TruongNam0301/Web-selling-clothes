<?php
include_once('../models/TypeClothesMdl.php');
class TypeClothesCtr{
    public function getTypeClothes(){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getTypeClothes($_GET['type']);
        include_once('../views/productPage/listtypeclothes.php');
    }
    public function getTypeClothesByType($type){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getTypeClothesByType($type['id']);
        if($TypeClothes == null) echo "<li class='first' type-id=$type[id]> $type[nametype]  <div class='second'></div></li>";
        else{
            include('../views/homePage/clothing.php');
        }
       
    }
}
?>