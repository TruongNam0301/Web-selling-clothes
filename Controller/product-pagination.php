<?php
    //Chèn Model
    include_once("../Model/product.php");
    $idType = $_POST['idType'];
    $page = $_POST['page'];
    //Thực hiện Action tương ứng
    $productPagination = new Product();
     
    $totalSP = $productPagination -> getPagination($idType,$page);
    $numSP = 12;
    $numPage = ceil($totalSP / $numSP) ;
    $currentPage = $_POST['page'];
    $idType = $_POST['idType'];
     //gọi View hiển thị
     include_once("../View/product-pagination.php");
?>