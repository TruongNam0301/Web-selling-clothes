<?php
include_once("DataProvider.php");
class ClothesMdl {
	private $db;

	function __construct(){
		$this->db = new DataProvider(); 
	}

    public function getClothes($page,$limit,$type){
    	$start = ($page-1)*6;
		$sql = "SELECT * FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type LIMIT $start,$limit";
		$clothArr = $this->db->FetchAll($sql);
		$clothes = array();
		if( $this->db->NumRows($sql)){
			foreach($clothArr as $cloth){
				$clothes[]=$cloth;
			}
			return $clothes;
		}
	} 
	public function getClothesByType($val,$page,$limit){
		$start = ($page-1)*$limit;
		$sql = "SELECT * FROM clothes WHERE id_type = $val LIMIT $start,$limit";
		$cloth = $this->db->FetchAll($sql);
		$clothes = array();
		if( $this->db->NumRows($sql)){
			foreach($cloth as $cloth){
				$clothes[]=$cloth;
			}
			return $clothes;
		}
	}
	public function getNumRows($type){
		$sql = "SELECT * FROM clothes INNER JOIN typeclothes on clothes.id_type=typeclothes.id_type INNER JOIN types ON typeclothes.type=types.id where types.id=$type";
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
		$cloth = $this->db->FetchAll($sql);
		$clothes = array();
		if( $this->db->NumRows($sql)){
			foreach($cloth as $cloth){
				$clothes[]=$cloth;
			}
			return $clothes;
		}
		else
			return -1;
	}
}

?>