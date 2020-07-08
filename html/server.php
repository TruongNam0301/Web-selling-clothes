<?php 
    if(!session_start()){
        session_start();
    }
    $db = mysqli_connect("localhost", "root","","sellclothes");
   if (isset($_POST['register'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $cf_username = $_POST['cf_username'];
        $password =$_POST['password'];
        $cf_password =$_POST['cf_password'];

        $error_empty=false;
        $error_confirm=false;
        if (!isset($name)) { 
            echo "<p>name is required</p>";
            $error_empty=true;
         }
        if (!isset($username)) {   
            echo "<p>Username is required</p>";
            $error_empty=true;
        }
        if (!isset($password)) { 
            echo "<p>password is required</p>";
            $error_empty=true;
        }
        if ($username != $cf_username) {
            echo "<p>username don't match!!</p>";
            $error_confirm=true;
          }
        if ($password != $cf_password) {
            echo "<p>password don't match!!</p>";
            $error_confirm=true;
        }
        if($error_empty==false && $error_confirm==false){
            $user_check_query = "SELECT * FROM accounts WHERE username='$username' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $error_user=false;
            if ($user) { // if user exists
                if ($user['username'] === $username) {
                echo "<p>username already exists!";
                $error_user=true;
                }
            }
            if ($error_user==false) {
                $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));//encrypt the password before saving in the database
                $query = "INSERT INTO accounts  (id, username, password) VALUES(NULL, '$username', '$password')";
                if(mysqli_query($db, $query)){
                    $last_id = mysqli_insert_id($db);
                    mysqli_close($db);
                    $db2 = mysqli_connect("localhost", "root","","sellclothes");
                    echo $last_id ."<br>";
                    $query2 = "INSERT INTO users  (id, name, address, phoneNumber) VALUES($last_id, '$name', NULL, NULL)";
                    if(mysqli_query($db2, $query2)){
                        echo "<p style='color:green' >sign up success!!!</p>";
                    }
                }
            }
        }
    }

    if(isset($_POST['login'])){
        $lg_name=$_POST['lg_name'];
        $lg_password=$_POST['lg_password'];
        $empty_error=false;
        if(!isset($lg_name)){
            echo "<p>username is empty please fill it</p>";
            $empty_error=true;
        }
        if(!isset($lg_password) ){
            echo "<p>password is empty please fill it</p>";
            $empty_error=true;
        }
        if($empty_error==false){
            $user_check_query = "SELECT accounts.id, username, password, users.name FROM accounts INNER JOIN users on accounts.id=users.id  WHERE username='$lg_name' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $hashed_password= $user['password'];
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
                    echo $lg_password;
                    echo '<p>Password is invalid</p>';
                    echo $hashed_password ;
                }
            }
            else
                echo "<p>wrong username please check it again!</p>";
        }
    }
?>