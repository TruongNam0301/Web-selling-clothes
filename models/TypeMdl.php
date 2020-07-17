<?php
    include_once("DataProvider.php");
    class TypeMdl {
        private $db;

        function __construct(){
            $this->db = new DataProvider(); 
        }
        public function getType(){
                        
          
            $sql = "SELECT * FROM types WHERE id>0";
            
            $type = array();
            if($this->db->NumRows($sql)>0){
               return $this->db->FetchAll($sql);
            }
            else{
                return null;
            }
        }
    }


?>