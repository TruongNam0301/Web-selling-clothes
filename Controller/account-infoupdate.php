<?php
     //Chèn Model
    include_once("../Model/account.php");
    $info =$_POST['info'];
    $address =$_POST['address'];
    $phone=$_POST['phone'];
    $empty_error=false;

     //Thực hiện Action tương ứng
    $acc = new Account();
    $empty_error=$acc->infoEmptyCheck($address,$phone,$empty_error);
    if($empty_error==true){
        echo "<p> your address/phone number is empty!</p>";
    }
    else{
       
        $result=$acc->infoUpdate($info,$address,$phone);
        //gọi View hiển thị
        include_once("../View/account-infoupdate.php");
    }
?>