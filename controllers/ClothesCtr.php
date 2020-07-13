<?php
include_once('../models/ClothesMdl.php');
class ClothesCtr{
    public function getClothes ($page,$num,$limit){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getClothes($page,$limit);
        include_once('../views/productPage/listclothes.php');
    } 
    public function getClothesByType ($val,$page,$num,$limit){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getClothesByType($val,$page,$limit);
        include_once('../views/productPage/listclothes.php');
    }
    public function getNumRows($limit){
        $ClothesMdl = new ClothesMdl();
        $NumRows = $ClothesMdl -> getNumRows();
        include_once('../views/productPage/pagination.php');
    }
    public function getNumRowsById($val,$limit){
        $ClothesMdl = new ClothesMdl();
        $NumRows = $ClothesMdl -> getNumRowsById($val);
        include_once('../views/productPage/pagination.php');
    }
    public function Search($key){
        $num =3;
        if($key=='')
            echo '<div align="center" class="error-search">NO RESULT</div>';
        else{    
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> Search($key);
        if($Clothes==-1){
            echo '<div align="center" class="error-search">NO RESULT</div>';
        }
        else{
            include_once('../views/productPage/listclothes.php');
    }
    }
    }
}

?>