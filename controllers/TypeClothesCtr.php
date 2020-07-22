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
        $TypeClothes = $TypeClothesMdl->getTypeClothes($type['id']);
        if($TypeClothes == null) echo "<li class='first' type-id=$type[id]> <a style='font-size:20px;font-weight: bold' href='#'> $type[nametype] </a>  <div class='second'></div></li>";
        else{
            include('../views/homePage/clothing.php');
        }
       
    }
    public function getAllTypeClothes(){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getAllTypeClothes();
        include('../views/homePage/type-square.php');
    }

    public function getOneTypeClothes(){
        $TypeClothesMdl = new TypeClothesMdl();
        $TypeClothes = $TypeClothesMdl->getOneTypeClothes($_GET['idType']);
        echo $TypeClothes[0]['name_type'];
    }

}
?>