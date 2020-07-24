<?php
    foreach($TypeClothes as $typeCloth){
        if($typeCloth['id_type']>0){
        echo"
        <div class='square col-lg-2 col-3' style='margin-left:80px'>
            <div>
           <a href='product-page.php?type=$typeCloth[type]&&idType=$typeCloth[id_type]'> <img src = '../image/square.jpg' width='100%' height='120px'/>
            <div class='type-text'>$typeCloth[name_type]</div>
            </a>
            </div>
        </div>";
}
    }
?>