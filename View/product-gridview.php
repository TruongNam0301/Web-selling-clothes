<?php
     foreach($result as $row){
        OutputDataGridView($idType,$row['id'],$row['name'],$row['price'],$row['picture']);
    }
    function OutputDataGridView ($idType,$id,$name,$price,$image){
        $p=number_format($price,0,",",".");
        $str = "
          <div class='col-lg-4'>
              <div class='product sanpham'>
              <a href='product.php?idType=$idType&&id=$id'>
                  <div class='image-item'>
                      <img src='../image/image_product/$image' class='item' style='z-index:-1' >
                      <div class='view-detail' >
                          <b>View Detail</b>
                    </div>
                  </div>
                  
                  <div class='item-detail' align='center'>
                      
                      <p class='item-title' style='font-size: large;color:#575652;transform: translate(0px,10px);'>$name</p>
                      <p class='item-price' style='color:#575652;'><b>$p <sup><u>đ</u></sup></b></p>
                  </div>
                  </a>
              </div>
          </div>";
        
        echo $str;
      }
?>