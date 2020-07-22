<?php
    include_once("../models/BillsDetailMdl.php");
    
    class BillsDetailCtr{
        public function getBillsDetail($MaHD){
            $BillsDetailMdl=new BillsDetailMdl();
            $array=$BillsDetailMdl->getBillsDetail($MaHD);
            include_once('../views/admin/BillsDetail.php');           
        }

        public function deleteBillsDetail($MaHD){
            $BillsDetailMdl=new BillsDetailMdl();
            $BillsDetailMdl ->deleteBillsDetail($MaHD);
        }
    }
?>