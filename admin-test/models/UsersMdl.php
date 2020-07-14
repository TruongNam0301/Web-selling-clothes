<?php
    class UsersMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getUserById($id){
            
            $sql = "SELECT * FROM `users` WHERE id=$id";
            
            if( $this->db->NumRows($sql)>0){
               return $this->db->Fetch($sql);
            }
            else return 'error';
        }
        public function addUser($id,$name){
           
            $sql = "INSERT INTO `users` (id,name, image) VALUES ('$id','$name','user-image.png')";
            if ($this->db->ExecuteQuery($sql)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }

        public function updateUserInfor($id,$name,$image){
            $sql = "UPDATE `users` SET name='$name',image='$image' WHERE id = '$id' ";
            if ($this->db->ExecuteQuery($sql)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }
    }


?>