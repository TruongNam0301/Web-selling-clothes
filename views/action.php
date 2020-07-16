<?php
    include_once('../controllers/ClothesCtr.php');
    include_once('../controllers/CartCtr.php');
    session_start();
    $ClothesCtr = new ClothesCtr();
    #showlistclothes
    if($_POST['action']=='show'){
        if($_POST['type']!=0){
            $ClothesCtr->getClothesByType($_POST['type'],$_POST['page'],$_POST['num'],$_POST['limit']); 
            $ClothesCtr->getNumRowsById($_POST['type'],$_POST['limit'],$_POST['idType']);  
              
        }
        else{
            $ClothesCtr->getClothes($_POST['page'],$_POST['num'],$_POST['limit'],$_POST['idType']);
            $ClothesCtr->getNumRows($_POST['limit'],$_POST['idType']);
        }
    }#addcart
    else if($_POST['action']=='add'){
        if(isset($_POST['id'])){
            $CartCtr = new CartCtr();
            $CartCtr->addToCart($_POST['id'],$_POST['quantity'],$_POST['size']);
        }
    } #deletecart
    else if($_POST['action']=='delete'){
        if(isset($_POST['index'])){
            $CartCtr = new CartCtr();
            $CartCtr->deleteFromCart($_POST['index']);
        }
    }
    else if($_POST['action']=='bestsell'){
        $ClothesCtr->getBestSell();
    }
    else { #updatecart
        if(isset($_POST['index'])){
            $CartCtr = new CartCtr();
            if(isset($_POST['quantity']))$CartCtr->updateQuantity($_POST['index'],$_POST['quantity']);
            if(isset($_POST['size'])) $CartCtr->updateSize($_POST['index'],$_POST['size']);
        }
    }
    
?>