<?php
include_once("DataProvider.php");
class ClothesMdl {
	private $db;

	function __construct(){
		$this->db = new DataProvider(); 
	}

    public function getClothes($page,$num,$limit,$type,$sort){
    	$start = ($page-1)*$num;
		$sql = "SELECT clothes.id ,clothes.id_type,clothes.name,clothes.price,clothes.picture FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type ";
		if($sort==0){
			$sql .="ORDER BY price ASC";
		}
		if($sort==1){
			$sql .="ORDER BY price DESC";
		}
			$sql .=" LIMIT $start,$limit";
		if($this->db->NumRows($sql)){
			return $this->db->FetchAll($sql);
		}
	} 
	public function getClothesByType($val,$page,$num,$limit,$sort){
		$start = ($page-1)*$num;
		$sql = "SELECT * FROM clothes WHERE id_type = $val ";
		if($sort==0){
			$sql .="ORDER BY price ASC";
		}
		if($sort==1){
			$sql .="ORDER BY price DESC";
		}
			$sql .=" LIMIT $start,$limit";
		if($this->db->NumRows($sql)){
			return $this->db->FetchAll($sql);
		}
	}
	public function getNumRows($type,$sort){
		$sql = "SELECT clothes.id FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type ";
		if($sort==0){
			$sql .="ORDER BY price ASC";
		}
		if($sort==1){
			$sql .="ORDER BY price DESC";
		}
			
		return $this->db->NumRows($sql);
	} 
	public function getNumRowsById($val,$sort){
		$sql = "SELECT id FROM clothes WHERE id_type = $val ";
		if($sort==0){
			$sql .="ORDER BY price ASC";
		}
		if($sort==1){
			$sql .="ORDER BY price DESC";
		}
			
		return $this->db->NumRows($sql);
	} 
	public function getProductById($id){
		$sql="SELECT * FROM clothes WHERE id= $id";
		return $this->db->FetchAll($sql);
	}
	public function Search($key,$sort){
		$sql="SELECT * FROM `clothes` WHERE name like '%$key%'";
		
		if($sort==0){
			$sql .="ORDER BY price ASC";
		}
		if($sort==1){
			$sql .="ORDER BY price DESC";
		}
		
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
	public function getRelativeClothes($id){
		$countClothes=$this->db->NumRows("SELECT id FROM clothes");
		$start= rand(1,$countClothes-4);
		$sql="SELECT * FROM clothes WHERE id <> $id LIMIT $start, 4";
		return $this->db->FetchAll($sql);
	}
}

?>