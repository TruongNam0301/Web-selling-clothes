<?php
include_once("DataProvider.php");
class ClothesMdl {
	private $db;

	function __construct(){
		$this->db = new DataProvider(); 
	}

    public function getClothes($page,$num,$limit,$type){
    	$start = ($page-1)*$num;
		$sql = "SELECT clothes.id ,clothes.id_type,clothes.name,clothes.price,clothes.picture FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type LIMIT $start,$limit";
		if($this->db->NumRows($sql)){
			return $this->db->FetchAll($sql);
		}
	} 
	public function getClothesByType($val,$page,$num,$limit){
		$start = ($page-1)*$num;
		$sql = "SELECT * FROM clothes WHERE id_type = $val LIMIT $start,$limit";
		if($this->db->NumRows($sql)){
			return $this->db->FetchAll($sql);
		}
	}
	public function getNumRows($type){
		$sql = "SELECT clothes.id FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type";
		return $this->db->NumRows($sql);
	} 
	public function getNumRowsById($val){
		$sql = "SELECT id FROM clothes WHERE id_type = $val";
		return $this->db->NumRows($sql);
	} 
	public function getProductById($id){
		$sql="SELECT * FROM clothes WHERE id= $id";
		return $this->db->FetchAll($sql);
	}
	public function Search($key){
		$sql="SELECT * FROM `clothes` WHERE name like '%$key%'";
		
		if($this->db->NumRows($sql)){
              
			return $this->db->FetchAll($sql);
		}
		else{
			return -1;
		}
	}
	public function getBestSellClothes(){
		$sql="SELECT * FROM clothes WHERE best_sell=1 LIMIT 4";
		return $this->db->FetchAll($sql);
	}
}

?>