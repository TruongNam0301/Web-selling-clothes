<?php

class ClothesMdl {
    public function getClothes($page,$limit){
		$conn = mysqli_connect ("localhost","root","","sellclothes");
    	$start = ($page-1)*6;
		$sql = "SELECT * FROM clothes LIMIT $start,$limit";
		$result = mysqli_query($conn,$sql);
		$clothes = array();
		if(mysqli_num_rows($result)){
			while($cloth = mysqli_fetch_assoc($result)){
				$clothes[]=$cloth;
			}
			return $clothes;
		}
	} 
	public function getClothesByType($val,$page,$limit){
		$conn = mysqli_connect ("localhost","root","","sellclothes");
		$start = ($page-1)*$limit;
		$sql = "SELECT * FROM clothes WHERE id_type = $val LIMIT $start,$limit";
		$result = mysqli_query($conn,$sql);
		$clothes = array();
		if(mysqli_num_rows($result)){
			while($cloth = mysqli_fetch_assoc($result)){
				$clothes[]=$cloth;
			}
			return $clothes;
		}
	}
	public function getNumRows(){
		$conn = mysqli_connect ("localhost","root","","sellclothes");
		$sql = "SELECT id FROM clothes";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		return $count;
	} 
	public function getNumRowsById($val){
		$conn = mysqli_connect ("localhost","root","","sellclothes");
		$sql = "SELECT id FROM clothes WHERE id_type = $val";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		return $count;
	} 
	public function getProductById($id){
		$conn = mysqli_connect ("localhost","root","","sellclothes");
		$sql="SELECT * FROM clothes WHERE id= $id";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
}

?>