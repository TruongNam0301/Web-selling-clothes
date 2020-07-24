<?php
    class UsersMdl{
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getUserById($id){
            
            $sql = "SELECT users.id,users.name,accounts.lv,users.image FROM users INNER JOIN accounts on users.id=accounts.id WHERE users.id=$id";
            
            if( $this->db->NumRows($sql)>0){
               return $this->db->Fetch($sql);
            }
            else return 'error';
        }
        public function addUser($id,$name){
           
            $sql = "INSERT INTO `users` (id,name, image) VALUES ('$id','$name','user-image.png')";
            $this->db->ExecuteQuery($sql);
               
             
        }

        public function updateUserInfor($id,$name,$image){
            $sql = "UPDATE `users` SET name='$name',image='$image' WHERE id = '$id' ";
            $this->db->ExecuteQuery($sql);
        }
    }


?>