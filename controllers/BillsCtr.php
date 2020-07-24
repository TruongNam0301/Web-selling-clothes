<?php
include_once("../models/BillsMdl.php");
include_once("BillsDetailCtr.php");

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

    public function insertBills(){
        $BillsMdl=new BillsMdl();
        $BillsDetailCtr=new  BillsDetailCtr();
        if(isset($_POST['yes'])){
            $id = $_SESSION['user']['id'];
            $sdt = $_POST['sdt'];
            $address = $_POST['address'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('m/d/Y h:i:s a', time());
            $total = $_POST['total'];
            $tinhtrang = 0;
            $lastId=$BillsMdl -> insertBills($id,$sdt,$address,$tinhtrang,$date,$total);
            foreach( $_SESSION['cart'] as $item){
                $id=$item['id'];
                $soluong = $item['quantity'];
                $size= $item['size'];
                $maHD = $lastId;
                $BillsDetailCtr -> insertBillsDetail($maHD, $id, $soluong, $size);
            }
            unset($_SESSION['cart']);
        }
    }
}
?>