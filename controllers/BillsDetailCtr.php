<?php
    include_once("./models/BillsDetailMdl.php");
    
    class BillsDetailCtr{
        public function getBillsDetail($MaHD){
            $BillsDetailMdl=new BillsDetailMdl();
            $array=$BillsDetailMdl->getBillsDetail($MaHD);
            include_once('./views/admin/BillsDetail.php');           
        }

        public function deleteBillsDetail($MaHD){
            $BillsDetailMdl=new BillsDetailMdl();
            $BillsDetailMdl ->deleteBillsDetail($MaHD);
        }
        
        public function insertBillsDetail($maHD, $id, $soluong, $size){
            $BillsDetailMdl=new BillsDetailMdl();
            $BillsDetailMdl ->insertBillsDetail($maHD, $id, $soluong, $size);
        }
    }
?>