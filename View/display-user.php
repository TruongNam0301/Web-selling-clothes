<?php 
    if($acc==""){
echo <<<EOD
<div class='acc'  style="display: none;">
<i onclick="displayONOFF('update-info')" class='fa fa-pencil-square'></i>
</div>
EOD;
    }
    else{
echo <<<EOD
<div class='acc'>Hello, $acc
<i onclick="displayONOFF('update-info')" class='fa fa-pencil-square'></i>
</div>
EOD;
    }
?>