<?php
include_once("DataProvider.php");
class BillsMdl{
    public function getBills($tt){
        $db=new DataProvider();
        $sql="SELECT users.name, users.image, hoadon.MaHD, hoadon.sdt, hoadon.address, hoadon.date, hoadon.tinhtrang, hoadon.total FROM `hoadon` INNER JOIN users ON hoadon.id_user=users.id WHERE tinhtrang='$tt'";
        $array=$db->FetchAll($sql);       
        return $array;   
    }

    public function editBills($tt,$MaHD){
        $db=new DataProvider();
        $sql = "UPDATE `hoadon`   SET tinhtrang = '$tt' WHERE MaHD='$MaHD' ";
        $db->ExecuteQuery($sql);
    }

    public function deleteBills($MaHD){
        $db=new DataProvider();
        $sql = "DELETE FROM `hoadon` WHERE MaHD='$MaHD'";
        $db->ExecuteQuery($sql);
    }
}
?>