<?php
    include_once("DataProvider.php");
    class ContactMdl {
        public function UpContactToAdmin($userId,$string){
            $db=new DataProvider();
            $sql="INSERT INTO `contact` (stt, id_user, string) VALUES (NULL,'$userId','$string')";
            $db->ExecuteQuery($sql);
        }
    }
?>