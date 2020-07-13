<?php
session_start();
if(isset($_POST['id'])&&$_POST['action']=='add'){
    if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
       for ($i=0;$i<sizeof($_SESSION['cart']);$i++){
           $cart = $_SESSION['cart'][$i];
            if($cart['id']==$_POST['id']){
                $check = true;
                break;
            }
            $check = false;
       }
        if($check === false){
            $item_array= array("id"=>$_POST['id'], "quantity"=>$_POST['quantity'], "size"=>$_POST['size']);
            array_push($_SESSION['cart'],$item_array);
        }
        else {
            echo -1;
        }
    }
    else{
        $item_array= array("id"=>$_POST['id'], "quantity"=>$_POST['quantity'], "size"=>$_POST['size']);
        $_SESSION['cart'][0] = $item_array;
    }
} 
else if($_POST['action']=='delete'){
    if(isset($_POST['index'])){
        $index=$_POST['index'];
         unset($_SESSION['cart'][$index]);
    
}
}
?>