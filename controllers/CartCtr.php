<?php
 
class CartCtr{
    public function addToCart($id,$quantity,$size){
        
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $i=>$val){
                $cart = $_SESSION['cart'][$i];
                if($cart['id']==$id){
                    $check = true;
                    break;
                }
                $check = false;
            }
            if($check === false){
                $item_array= array("id"=>$id, "quantity"=>$quantity, "size"=>$size);
                array_push($_SESSION['cart'],$item_array);
                print_r( $_SESSION['cart']);
            }
            else {
                echo -1;
            }
        }
        else{
            $item_array= array("id"=>$id, "quantity"=>$quantity, "size"=>$size);
            $_SESSION['cart'][0] = $item_array;
        }   
    }

    public function deleteFromCart($index){
        
        unset($_SESSION['cart'][$index]);
    }

    public function showCart(){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $i=>$val){
                $item = $_SESSION['cart'][$i];
                include_once('../models/ProductMdl.php');
                $ProductMdl = new ProductMdl();
                $product = $ProductMdl->getProduct($item['id']);
                include('../views/cartPage/listcart.php');
            }
        }else{
            $_SESSION['cart']=Array();
        }
    }

    public function updateQuantity($index,$quantity){
      
        $_SESSION['cart'][$index]['quantity']=$quantity;
    }

    public function updateSize($index,$size){
        
        $_SESSION['cart'][$index]['size']=$size;
    }
}


?>