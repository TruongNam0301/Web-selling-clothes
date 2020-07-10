<?php
     //Chèn Model
     include_once("../Model/cart.php");
    $cart=new Cart();
     //Thực hiện Action tương ứng
    
     foreach(@$_SESSION['cart'] as $i=>$val){
        $item = @$_SESSION['cart'][$i];
        $match=$item['id'];
        
        $row = $cart->getItem($match);
        //gọi View hiển thị
        cartItem($row['picture'],$row['name'],$row['price'],$item['quantity'],$item['size'],$i);
        
    }
    
    function cartItem ($image,$title,$price,$quantity,$size,$i){
        $check_size=array("M","SM","L","XL");
        echo "<div class= 'cart-row'>";
        echo "<div class='cart-item cart-column'>";
        echo "<img class='cart-item-image' src='../image/image_product/$image' width='100' height='100'>";
        echo "<span class='cart-item-title'>$title</span>";
        echo "</div>";
        echo "<span class='cart-price cart-column'>$price</span>";
        echo "<div class='cart-quantity cart-column'>";
        echo "<input class='cart-quantity-input' type='number' min='1' value='$quantity'> ";
        echo "</div>";
        echo "<div class='cart-quantity cart-column'>";
        echo "<select name='size' id='size' style='margin-right: 14px;'> ";
        foreach($check_size as $x){
            if($x==$size){
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

    }
?>