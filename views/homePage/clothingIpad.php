<?php
    echo "<li type-id=$type[id]><a href='productsPage.php?type=$type[id]'>$type[nametype]</a><div class='mb-item'><ul>";
    foreach($TypeClothes as $typeCloth){
        $str =<<<EOD
                <li>
                    <a href="product-page.php?type=$type[id]&&idType=$typeCloth[id_type]">$typeCloth[name_type]</a>
                </li>
        EOD;
        echo $str;
    }
    echo "</ul> </div></li>";
?>