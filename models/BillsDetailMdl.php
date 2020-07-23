<?php
include_once("DataProvider.php");

class BillsDetailMdl{
    function __destruct(){
        return $this->db->__destruct();
    }
    public function getBillsDetail($MaHD){
        $db=new DataProvider();
        $sql="SELECT clothes.id,clothes.name,clothes.price,clothes.picture,chitiet_hoadon.soluong, chitiet_hoadon.size FROM `clothes` INNER JOIN `chitiet_hoadon` ON clothes.id=chitiet_hoadon.id_cloth INNER JOIN `hoadon` ON hoadon.MaHD=chitiet_hoadon.MaHD WHERE chitiet_hoadon.MaHD=$MaHD";
        $array=$db->FetchAll($sql); 
        return $array;   
    }

    public function deleteBillsDetail($MaHD){
        $db=new DataProvider();
        $sql = "DELETE FROM `chitiet_hoadon` WHERE MaHD='$MaHD' ";
        $db->ExecuteQuery($sql);
    }
}
?>