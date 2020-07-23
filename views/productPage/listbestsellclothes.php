<?php

    foreach($Clothes as $cloth){
        $p=number_format($cloth['price'],0,",",".");
        $str = "   
        <div class='col-lg-3 col-6 image-product'>
            <div  class='product sanpham' >
                <a href='../templates/productDetail.php?idType=$cloth[id_type]&&id=$cloth[id]'>
                    <div class='pic'>  
                        <img src='../image/image_product/$cloth[picture]' class='item' style='z-index:-1' >
                        <div class='view-detail' > <b>View Detail</b> </div>
                    </div>
                    <div class='frames'>
                        <p class='item-title' style='font-size: large;color:#575652;transform: translate(0px,10px);'>$cloth[name]</p>
                        <p class='item-price' style='color:#575652;'><b>$p <sup><u>đ</u></sup></b></p>
                    </div>
                </a>
            </div>
        </div>";
        echo $str;
    }
   

?>