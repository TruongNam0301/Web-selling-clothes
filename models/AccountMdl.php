<?php
    include_once("DataProvider.php");
    class AccountMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function checkAccount($username,$password){
            $sql = "SELECT * FROM `accounts` WHERE username='$username'";
		    if($this->db->NumRows($sql) >0){
                $user=$this->db->Fetch($sql);
                $hashed_password= $user['password'];
                if(password_verify($password,$hashed_password )){
                    return $this->db->Fetch($sql);
                }
                else 
                    return 0;
            }
            else return 0;
        }
        public function checkAccountExist($username){
            $sql = "SELECT * FROM `accounts` WHERE username='$username'";
		    if($this->db->NumRows($sql) >0){
                return $this->db->Fetch($sql);
            }
            else return 0;
        }
        public function addAccount($username,$password){
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));//encrypt the password before saving in the database
            $sql = "INSERT INTO `accounts`( username, password) VALUES ('$username','$password')";
            $last_id = $this->db->ExecuteQueryInsert($sql);
            if ($last_id){
                return  $last_id;
            } 
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            return 1;
        }
        public function updatePass($pass,$id){
            $password = password_hash($pass, PASSWORD_BCRYPT, array('cost'=>12));
            $sql = "UPDATE `accounts` SET password='$password' WHERE id='$id'";
            $this->db->ExecuteQuery($sql);
        }
    }



?>