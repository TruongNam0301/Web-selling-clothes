<?php
    foreach($TypeClothes as $typeCloth){
        echo<<<EOD
        <div class='square col-lg-2 col-4' >
           <a href="product-page.php?type=$typeCloth[type]&&idType=$typeCloth[id_type]"> <img src = '../image/square.jpg' width='100%' height='120px'/></a>
            <div class='type-text'>$typeCloth[name_type]</div>
        </div>

EOD;
    }
?>