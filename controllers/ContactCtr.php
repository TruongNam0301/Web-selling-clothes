<?php
    include_once("../models/ContactMdl.php");
    class ContactCtr{
        public function UpContactToAdmin($user,$string){
            $ContactMdl= new ContactMdl;
            $ContactMdl->UpContactToAdmin($user,$string);
        }
    }
?>