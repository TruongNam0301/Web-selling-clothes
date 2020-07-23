<?php
include_once('../models/ClothesMdl.php');
class ClothesCtr{
    public function getClothes ($page,$num,$limit,$type){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getClothes($page,$num,$limit,$type);
        include_once('../views/productPage/listclothes.php');
    } 
    public function getClothesByType ($val,$page,$num,$limit){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getClothesByType($val,$page,$num,$limit);
        include_once('../views/productPage/listclothes.php');
    }
    public function getNumRows($limit,$type){
        $ClothesMdl = new ClothesMdl();
        $NumRows = $ClothesMdl -> getNumRows($type);
        include_once('../views/productPage/pagination.php');
    }
    public function getNumRowsById($val,$limit,$type){
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
    public function getBestSell(){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getBestSellClothes();
        include_once('../views/productPage/listbestsellclothes.php');
    }
    public function getRelativeClothes($id){
        $ClothesMdl = new ClothesMdl();
        $Clothes = $ClothesMdl -> getRelativeClothes($id);
        include_once('../views/productPage/listbestsellclothes.php');
    }
    public function insertClothes(){
        if(isset($_POST["add-clothes"])){
            $file = $_FILES['file'];
            print_r($file);
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];
            $type = $_POST['types_clothes'];
            $name = $_POST['name'];
            $price = $_POST['price'];
                #ADD CLOTHES
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','pnj','jpeg');
                if(in_array($fileActualExt,$allowed)){
                    if($fileError==0){
                        if($fileSize<1000000){
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $fileDestination = '../image/image_product/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $db=new DataProvider();
                            $image = $fileNameNew;
                            $sql = "INSERT INTO `clothes`(id_type, name, price, picture) VALUES ('$type','$name','$price','$image')";
                                if ($db->ExecuteQuery($sql)) {
                                    echo "<script>New record created successfully</script>";
                                } else {
                                    echo "Error: " . $sql . "<br>" ;
                                }
                        }
                        else{
                            echo "file too big";
                        }
                    } 
                    else{
                        echo "error upload file";
                    }
                }
                else{
                    echo "";
                }
        }
    }
    public function updateClothes(){
        if(isset($_POST["update-clothes"])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
                if($fileSize==0&&$fileName==''){
                    #just update name
                    $db=new DataProvider();
                    $id = $_POST['id'];
                    $type = $_POST['types_clothes'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $sell = $_POST['sell'];
                    $sql = "UPDATE `clothes` SET id_type='$type',name='$name', price='$price',best_sell='$sell' WHERE id = '$id' ";
                    if ($db->ExecuteQuery($sql)) {
                        echo "<script>alert('New record created successfully')</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" ;
                    }
                }else{
                    #update name & image
                    $fileExt = explode('.',$fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed = array('jpg','pnj','jpeg');
                    if(in_array($fileActualExt,$allowed)){
                        if($fileError==0){
                        if($fileSize<1000000){
                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                $fileDestination = '../image/image_product/'.$fileNameNew;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $db=new DataProvider();
                                $id = $_POST['id'];
                                $type = $_POST['types_clothes'];
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $image = $fileNameNew;
                                $sql = "UPDATE `clothes` SET id_type='$type',name='$name' ,price='$price', picture='$image' ,best_sell='$sell'  WHERE id = '$id' ";
                                    if ($db->ExecuteQuery($sql)) {
                                        echo "New record created successfully";
                                    } else {
                                        echo "Error: " . $sql . "<br>" ;
                                    }
                            }
                            else{
                                echo "file too big";
                            }
                        } 
                        else{
                            echo "error upload file";
                        }
                    }
                    else{
                        echo "can't up this file";
                    }
                }
            }
    }
    public function deleteClothes(){
        if(isset($_POST['action'])){
            if($_POST['action'] === 'delete'){
                $db=new DataProvider();
                $delete_id = $_POST["id"];
                $sql = "DELETE FROM clothes WHERE id=$delete_id ; SET @num := 0; UPDATE clothes SET id = @num := (@num+1); ALTER TABLE clothes AUTO_INCREMENT = 1";
                $db->ExecuteMultiQuery($sql);
            }
        }
    }
}   

?>