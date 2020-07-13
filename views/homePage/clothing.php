<?php
foreach($TypeClothes as $typeCloth){
   $str =<<<EOD
   <li class="first" type-id=$type[id]> $type[name]
        <div class="second">
            <ul class="list-item">
                <li><a href="product-page.php?idType=$typeCloth[id_type]">$typeCloth[name_type]</a></li>
            </ul>
        </div>
    </li>
EOD;
}
?>

