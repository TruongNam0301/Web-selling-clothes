<?php
    session_start();
    if(isset($_SESSION['cart'])){
        $num=sizeof($_SESSION['cart']);
        echo $num;
    }
    else{
        echo 0;
    }
?>