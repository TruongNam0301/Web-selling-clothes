<?php 
    if(!session_start()){
        session_start();
    }
    include_once("DataProvider.php");
    class Account{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }

        //login function
        public function loginCheckEmpty($lg_name,$lg_password,$empty_error){
            $empty_error=false;
            if($lg_name=="" ||$lg_password=="")
                $empty_error=true;
            return $empty_error;
        }
        public function login($lg_name,$lg_password){
            return $this->db->Fetch("SELECT accounts.id, username, password, users.name FROM accounts INNER JOIN users on accounts.id=users.id  WHERE username='$lg_name' LIMIT 1");
        }

        //signup function
        public function signupCheckEmpty($name,$username,$password,$error_empty){
            $error_empty=false;
            if($name=="" || $username=="" || $password=="")
                $error_empty=true;
            return $error_empty;
        }
        public function signupCheckConfirm($username,$cf_username,$password,$cf_password,$error_confirm){
            $error_confirm=false;
            if($username!=$cf_username || $password!=$cf_password)
                $error_confirm=true;
            return $error_confirm;
        }
        public function signupCheckAcc($username,$password,$error_user){
            $error_user=false;
            $user=$this->db->Fetch("SELECT * FROM accounts WHERE username='$username' LIMIT 1");
            if ($user) { // if user exists
                if ($user['username'] === $username) {
                    $error_user=true;
                }
            }
            return $error_user;
        }
        public function signup($name,$username,$password){
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));//encrypt the password before saving in the database
            $last_id=$this->db->ExecuteQueryInsert("INSERT INTO accounts  (id, username, password) VALUES(NULL, '$username', '$password')");
            if(isset($last_id)){
                return $this->db->ExecuteQueryInsert("INSERT INTO users  (id, name, address, phoneNumber) VALUES($last_id, '$name', NULL, NULL)");
            }
        }

        //info update function
        public function infoEmptyCheck($address,$phone,$empty_error){
            $empty_error==false;
            if($address=="" || $phone=="")
                $empty_error=true;
            return $empty_error;
        }
        public function infoUpdate($info,$address,$phone){
            return $this->db->ExecuteQuery("UPDATE users SET address='$address', phoneNumber='$phone' WHERE id=$info");
        }
    }
?>