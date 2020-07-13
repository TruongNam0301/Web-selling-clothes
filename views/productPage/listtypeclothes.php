<?php
    foreach ($TypeClothes as $Type){
        $str = "
        <div class='product'>
            <input type='radio' class='check' name = 'type' value ='$Type[id_type]'>
            <label>$Type[name_type]</label>
        </div>";
        echo $str;
    }
?>