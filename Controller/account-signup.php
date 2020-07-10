<?php
     //Chèn Model
     include_once("../Model/account.php");
     $name = $_POST['name'];
     $username = $_POST['username'];
     $cf_username = $_POST['cf_username'];
     $password =$_POST['password'];
     $cf_password =$_POST['cf_password'];

     $error_empty=false;
     $error_confirm=false;

     //Thực hiện Action tương ứng
     $acc = new Account();
     $error_empty=$acc->signupCheckEmpty($name,$username,$password,$error_empty);
     $error_confirm=$acc->signupCheckConfirm($username,$cf_username,$password,$cf_password,$error_confirm);
     if($error_empty==true){
         echo "<p>user's name/account/password is empty!</p>";
     }
     else if($error_confirm==true){
        echo "<p>confirm account/password is not match!</p>";
     }
     else{
        $error_user=false;
        $error_user = $acc -> signupCheckAcc($username,$password,$error_user);
        if($error_user==true){
            echo "<p>username already exists!</p>";
        }
        else{
            $result=$acc->signup($name,$username,$password);

             //gọi View hiển thị
            include_once("../View/account-signup.php");
        }
    }
?>