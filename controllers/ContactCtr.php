<?php
    include_once("../models/ContactMdl.php");
    class ContactCtr{
        public function UpContactToAdmin($userId,$string){
            $ContactMdl= new ContactMdl;
            $ContactMdl->UpContactToAdmin($userId,$string);
        }
    }
?>