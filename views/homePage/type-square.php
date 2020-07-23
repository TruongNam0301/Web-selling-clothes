<?php
    foreach($TypeClothes as $typeCloth){
        if($typeCloth['id_type']>0){
        echo"
        <div class='square col-lg-3 col-3' >
            <div>
           <a href='product-page.php?type=$typeCloth[type]&&idType=$typeCloth[id_type]'> <img src = '../image/square.jpg' width='150px' height='120px'/>
            <div class='type-text'>$typeCloth[name_type]</div>
            </a>
            </div>
        </div>";
}
    }
?>