<?php
    class AccountMdl{
        public function checkAccount($username,$password){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql = "SELECT * FROM `accounts` WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
		    if($count >0){
                return $id = mysqli_fetch_assoc($result);
            }
            else return 0;
        }
        public function addAccount($username,$password){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql = "INSERT INTO `accounts`( username, password) VALUES ('$username','$password')";
            if (mysqli_query($conn, $sql)) {
                return  $last_id = mysqli_insert_id($conn);
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            return 1;
        }
    }



?>