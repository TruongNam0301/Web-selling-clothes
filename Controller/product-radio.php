<?php
    //Chèn Model
    include_once("../Model/product.php");
    //Thực hiện Action tương ứng
    $radio = new Product();
    $result = $radio -> getTypeClothes();
    //gọi View hiển thị
    
    include_once("../View/product-radio.php");
?>