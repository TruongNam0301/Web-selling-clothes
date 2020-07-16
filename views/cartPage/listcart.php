<?php
    $money=number_format($product['price'],0,",",".");
    $check_size=array("M","SM","L","XL");
    echo "<div class= 'cart-row'>";
    echo "<div class='cart-item cart-column'>";
    echo "<img class='cart-item-image' src='../image/image_product/$product[picture]' width='100' height='100'>";
    echo "<span class='cart-item-title'>$product[name]</span>";
    echo "</div>";
    echo "<span class='cart-price cart-column'><b>$money</b></span>";
    echo "<div class='cart-quantity cart-column'>";
    echo "<input class='cart-quantity-input' type='number' data-index=$i min='1' value='$item[quantity]'> ";
    echo "</div>";
    echo "<div class='cart-quantity cart-column'>";
    echo "<select name='size' data-index=$i class='size' style='margin-right: 14px;'> ";
    foreach($check_size as $x){
        if($x==$item['size']){
        echo "<option value='$x' selected='selected'>$x</option>";
        }
        else{
            echo "<option value='$x'>".$x."</option>";
        }
    }
    echo "</select>";
    echo "<button class='btn btn-danger remove-item' data-index=$i  type='button'>REMOVE</button>";
    echo "</div>";
    echo "</div>";


?>