<?php
    include_once("DataProvider.php");
    class TypeMdl {
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getType(){
                        
          
            $sql = "SELECT * FROM types WHERE id>0";
            
          
            if($this->db->NumRows($sql)>0){
               return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
        }
        public function getOneType($id){
            $sql = "SELECT * FROM types WHERE id=$id";
            if($this->db->NumRows($sql)>0){
               return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
        }
        
    }


?>