<?php
class DataProvider
{
	private $link;//bien ket noi csdl
	function __construct()
	{
		$this->link = new PDO("mysql:host=localhost;dbname=sellclothes",'root','');
		$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}
	function ExecuteQuery($sql)
	{
		$db=$this->link->prepare($sql);
		return $db->execute();
	}
	function ExecuteMultiQuery($sql){
		$stmt   = $db->query($sql);
		$r=$stmt->nextRowset();
		if($r)
			return $r;
		else
			return -1;
		
	}
	function ExecuteQueryInsert($sql)
	{
		$db=$this->link->prepare($sql);
		$db->execute();
		$result=$db->lastInsertId();
		 return $result;
	}
	
	function Fetch($sql)
	{
		$db=$this->link->prepare($sql);
		$db->execute();
		$result=$db->fetch(PDO::FETCH_ASSOC);
		 return $result;
	}
	function NumRows($sql)
	{
		$stmt=$this->link->query($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}
	function FetchAll($sql)
	{
		$db=$this->link->prepare($sql);
		$db->execute();
		$result=$db->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	function __destruct()
	{
		$this->link=null;
	}
}
?>