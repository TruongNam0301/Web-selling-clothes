<?php
    echo "<div class= 'row gridView' > ";
    foreach($Clothes as $cloth){
        $p=number_format($cloth['price'],0,",",".");
        $str = "   
          <div class='col-lg-$num'>
              <div class='product sanpham'>
              <a href='../templates/productDetail.php?id=$cloth[id]'>
                  <div class='image-item'>
                      <img src='../image/image_product/$cloth[picture]' class='item' style='z-index:-1' >
                      <div class='view-detail' >
                          <b>View Detail</b>
                    </div>
                  </div>
                  <div class='item-detail' align='center'>
                      <p class='item-title' style='font-size: large;color:#575652;transform: translate(0px,10px);'>$cloth[name]</p>
                      <p class='item-price' style='color:#575652;'><b>$p <sup><u>đ</u></sup></b></p>
                  </div>
                </a>
              </div>
          </div>";
        echo $str;
    }
    echo " </div>";

?>