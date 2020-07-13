<?php 
     if($user){  
        if(password_verify($lg_password,$hashed_password )){
            $_SESSION['account']=$user['name'];
            echo "<p style='color:green' >login success!!!</p>";
            if(isset($_SESSION['account'])){
            ?>
                <script type="text/javascript">
                    alert('Login complete!');
                    window.location.href='';
                </script>
            <?php
            }
        }
        else{
            echo '<p>Password is invalid</p>';
        }
    }
    else
        echo "<p>wrong username please check it again!</p>";

?>