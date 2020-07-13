<?php
     //Chèn Model
    include_once("../Model/account.php");
    $lg_name=$_POST['lg_name'];
    $lg_password=$_POST['lg_password'];
    $empty_error=false;
     //Thực hiện Action tương ứng
     $acc = new Account();
     $empty_error=$acc->loginCheckEmpty($lg_name,$lg_password,$empty_error);
     if($empty_error==true){
         echo "<p>account/password is empty!</p>";
     }
     else{
        $user = $acc -> login($lg_name,$lg_password,$empty_error);
        $hashed_password= $user['password'];
        //gọi View hiển thị
        include_once("../View/account-login.php");
    }
?>