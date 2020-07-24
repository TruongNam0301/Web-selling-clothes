<?php
include_once('./models/ClothesMdl.php');
class ClothesCtr{
    public function getClothes ($page,$num,$limit,$type,$sort){
        $ClothesMdl = new ClothesMdl();
<<<<<<< HEAD
        $Clothes = $ClothesMdl -> getClothes($page,$num,$limit,$type,$sort);
        include_once('../views/productPage/listclothes.php');
=======
        $Clothes = $ClothesMdl -> getClothes($page,$num,$limit,$type);
        include_once('./views/productPage/listclothes.php');
>>>>>>> d501ccbe013bae1fadda7002ac9fdba4e5fc6c31
    } 
    public function getClothesByType ($val,$page,$num,$limit,$sort){
        $ClothesMdl = new ClothesMdl();
<<<<<<< HEAD
        $Clothes = $ClothesMdl -> getClothesByType($val,$page,$num,$limit,$sort);
        include_once('../views/productPage/listclothes.php');
=======
        $Clothes = $ClothesMdl -> getClothesByType($val,$page,$num,$limit);
        include_once('./views/productPage/listclothes.php');
>>>>>>> d501ccbe013bae1fadda7002ac9fdba4e5fc6c31
    }
    public function getNumRows($limit,$type,$sort){
        $ClothesMdl = new ClothesMdl();
<<<<<<< HEAD
        $NumRows = $ClothesMdl -> getNumRows($type,$sort);
        include_once('../views/productPage/pagination.php');
=======
        $NumRows = $ClothesMdl -> getNumRows($type);
        include_once('./views/productPage/pagination.php');
>>>>>>> d501ccbe013bae1fadda7002ac9fdba4e5fc6c31
    }
    public function getNumRowsById($val,$limit,$type,$sort){
        $ClothesMdl = new ClothesMdl();
<<<<<<< HEAD
        $NumRows = $ClothesMdl -> getNumRowsById($val,$sort);
        include_once('../views/productPage/pagination.php');
=======
        $NumRows = $ClothesMdl -> getNumRowsById($val);
        include_once('./views/productPage/pagination.php');
>>>>>>> d501ccbe013bae1fadda7002ac9fdba4e5fc6c31
    }
    public function Search($key,$sort){
        $num =3;
        if($key=='')
            echo '<div align="center" class="error-search">NO RESULT</div>';
        else{    
            $ClothesMdl = new ClothesMdl();
            $Clothes = $ClothesMdl -> Search($key,$sort);
            if($Clothes==-1){
                echo '<div align="center" class="error-search">NO RESULT</div>';
            }
            else{
                include_once('./views/productPage/listclothes.php');
            }
        }
    }
    public function getBestSell(){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getBestSellClothes();
        include_once('./views/productPage/listbestsellclothes.php');
    }
    public function getRelativeClothes($id){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getRelativeClothes($id);
        include_once('./views/productPage/listbestsellclothes.php');
    }
}

?>