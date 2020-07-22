<?php
    $str=<<<EOD
    <form class='forgot-content' action='' method ='post'>
        <input type='hidden' name="id" value=$id>
        <input type="password"  name="new-password" class='text-input ' id='new-password' placeholder="PASSWORD">
        <input type="password"  name="re-new-password" class='text-input' id='re-new-password' class="cf-password" placeholder="PASSWORD">
        <input type="submit"  name="update-pass-submit" class="update-pass-button" value="update">
    </form>
EOD;
echo $str;

?>