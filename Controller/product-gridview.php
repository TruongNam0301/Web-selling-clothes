<?php
     //Chèn Model
     include_once("../Model/product.php");
     $idType = $_POST['idType'];
     $page = $_POST['page'];
     //Thực hiện Action tương ứng
     $productList = new Product();
     
     $result = $productList -> getClothes($idType,$page);
     //gọi View hiển thị
     include_once("../View/product-gridview.php");
?>