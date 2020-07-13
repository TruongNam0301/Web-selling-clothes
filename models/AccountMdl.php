<?php
    include_once("DataProvider.php");
    class AccountMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function checkAccount($username,$password){
            $sql = "SELECT * FROM `accounts` WHERE username='$username' AND password='$password'";
		    if($this->db->NumRows($sql) >0){
                return $this->db->Fetch($sql);
            }
            else return 0;
        }
        public function addAccount($username,$password){
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
    }



?>