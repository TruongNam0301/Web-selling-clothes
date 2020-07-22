<?php
include_once("../models/BillsMdl.php");

class BillsCtr{
    public function getBills($tt){
        $BillsMdl=new BillsMdl();
        $array = $BillsMdl->getBills($tt);
        include_once('../views/admin/Bills.php');           
    }

    public function editBills($tt,$MaHD){
        $BillsMdl=new BillsMdl();
        $BillsMdl -> editBills($tt,$MaHD);
    }

    public function deleteBills($MaHD){
        $BillsMdl=new BillsMdl();
        $BillsMdl ->deleteBills($MaHD);
    }
}
?>