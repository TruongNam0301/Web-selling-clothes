<?php
    if(isset($_POST["action"])){
        session_start();
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }else echo 'error';
    }
    

?>