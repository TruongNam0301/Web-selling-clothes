<?php
include_once('../models/AccountMdl.php');
include_once('../models/UsersMdl.php');
    class AccountCtr{
        public function checkLogin(){
            if (isset($_POST["btn_submit"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if ($username == "" || $password =="") {
                    echo "<style> .login-regis-swapper{ transform: translateX(0%);}</style> <script> $('.error-login').html('* username hoặc password không được để trống!');</script>";
                }else{
                    $AccountMdl = new AccountMdl();
                    $Account = $AccountMdl -> checkAccount($username,$password);
                    if($Account==0)echo "<style> .login-regis-swapper{ transform: translateX(0%);}</style> <script> $('.error-login').html('* sai tai khoan hoac mat khau!');</script>";
                    else{
                        $UsersMdl = new UsersMdl();
                        $User = $UsersMdl -> getUserById($Account['id']);
                        $_SESSION['user']=$User;
                        $user=$_SESSION['user'];
                        include_once('../views/homePage/user.php');
                    }
                }
            }
        }
        public function register(){
            if(isset($_POST['regis_submit'])){
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST["password"];
                $AccountMdl = new AccountMdl();
                $Account = $AccountMdl -> checkAccountExist($username);
                if($Account==0){
                    $id=$AccountMdl-> addAccount($username,$password);
                    $UsersMdl = new UsersMdl();
                    $UsersMdl -> addUser($id,$name);
                    ?>
                        <script type="text/javascript">
                            alert('Register complete!');
                            window.location.href='';
                        </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        alert('Account already exist!');
                        window.location.href='';
                    </script>
                <?php
                }
            }
        }
        public function updateUserInfor(){
            if(isset($_POST['update-user-submit'])){
                $file = $_FILES['file'];
                print_r($file);
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
                if($fileSize==0&&$fileName==''){
                    #just update name
                   $image = $_SESSION['user']['image'];
                   $name = $_POST['name'];
                   $id = $_SESSION['user']['id'];
                   $UsersMdl = new UsersMdl();
                   $UsersMdl->updateUserInfor($id,$name,$image);
                   $User = $UsersMdl -> getUserById($id);
                   $_SESSION['user']=$User;
                }else{
                    #update name & image
                    $fileExt = explode('.',$fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed = array('jpg','pnj','jpeg');
                    if(in_array($fileActualExt,$allowed)){
                        if($fileError==0){
                        if($fileSize<1000000){
                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                $fileDestination = '../image/image-user/'.$fileNameNew;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $image = $fileNameNew;
                                $name = $_POST['name'];
                                $id = $_SESSION['user']['id'];
                                $UsersMdl = new UsersMdl();
                                $UsersMdl->updateUserInfor($id,$name,$image);
                                $User = $UsersMdl -> getUserById($id);
                                $_SESSION['user']=$User;
                            }
                            else{
                                echo "file too big";
                            }
                        } 
                        else{
                            echo "error upload file";
                        }
                    }
                    else{
                        echo "can't up this file";
                    }
                }
            }
        }
        public function checkAccountExist($username){
            $AccountMdl = new AccountMdl();
            $Account = $AccountMdl -> checkAccountExist($username);
            if($Account==0){
                echo 0;
            }
            else {
                $id=$Account['id'];
                include_once('../views/homePage/forgot-pass.php');
            }
        }
        public function updatePass(){
            $AccountMdl = new AccountMdl();
            if(isset($_POST['update-pass-submit'])) $AccountMdl -> updatePass($_POST['new-password'],$_POST['id']);
           
        }
        
    } 


?>