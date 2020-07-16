<?php
include_once('../models/ProductMdl.php');
class ProductCtr{
    public function getProduct($id=1){
        $ProductMdl = new ProductMdl();
        $product = $ProductMdl->getProduct($id);
        include_once('../views/productPage/product.php');
    }
    
}
?>