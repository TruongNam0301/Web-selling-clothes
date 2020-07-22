<?php
echo "<li class='first' type-id=$type[id]><a style='font-size:20px;font-weight: bold' href='productsPage.php?type=$type[id]'>  $type[nametype] </a> <div class='second'>";
foreach($TypeClothes as $typeCloth){
   $str =<<<EOD
        <ul class="list-item">
             <li><a href="product-page.php?type=$type[id]&&idType=$typeCloth[id_type]">$typeCloth[name_type]</a></li>
        </ul>
EOD;
echo $str;
}
echo "  </div></li>"
?>

