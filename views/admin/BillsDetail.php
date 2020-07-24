<?php
    foreach($array as $item){
        @$p=number_format($item['price'],0,",",".");
        echo "<tr>";
        echo "<td ><img src='./image/image_product/$item[picture]' class='image' style='width:100px; height:50px' ></td>";
            echo "<td class='name'>$item[name]</td>";
            echo "<td class='price'>$p</td>";
            echo "<td class='quantity'>$item[soluong]</td>";
            echo "<td class='size'>$item[size]</td>";
        echo "</tr>";
    }   
?>