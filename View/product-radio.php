<?php 
        foreach($result as $row){
            echo "
            <div class='product'>
                <input type='radio' class='check' name = 'type' value ='$row[id_type]'>
                <label>$row[name_type]</label>
            </div>
            ";
        }
?>