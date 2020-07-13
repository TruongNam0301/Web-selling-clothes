<?php
    class UsersMdl{
        public function getUserById($id){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql = "SELECT * FROM `users` WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            if( mysqli_num_rows($result)>0){
                $user = mysqli_fetch_assoc($result);
                return $user;
            }
            else return 'error';
        }
        public function addUser($id,$name){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql = "INSERT INTO `users` (id,name, image) VALUES ('$id','$name','user-image.png')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }

        public function updateUserInfor($id,$name,$image){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql = "UPDATE `users` SET name='$name',image='$image' WHERE id = '$id' ";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }
    }


?>