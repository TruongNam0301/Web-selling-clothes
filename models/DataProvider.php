<?php
class DataProvider
{
	private $link;//bien ket noi csdl
	function __construct()
	{
		$this->link = new PDO("mysql:host=localhost;dbname=sellclothes",'root','');
		$this->link->exec("set names utf8mb4_unicode_ci");
		$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}
	function ExecuteQuery($sql)
	{
		$db=$this->link->prepare($sql);
		return $db->execute();
	}
	function ExecuteMultiQuery($sql){
		$i=-1;
		$tempSql = preg_replace('/[\n\r\s]+/', ' ', $sql);
		$tempSqlParts = explode(';', $tempSql);
		foreach ($tempSqlParts as $tempSqlPart) {
			$tempSqlPart = trim($tempSqlPart);
			if (!empty($tempSqlPart)) {
				$tempBindVars = (0 < preg_match_all('/\:[a-z0-9_]+/i', $tempSqlPart, $matches))
					? array_intersect_key($bindVariables, array_flip($matches[0]))
					: array();
				$tempStatement = $this->link->prepare($tempSqlPart);
				$tempStatement->execute($tempBindVars);
				$tempStatement->closeCursor();
				$i++;
			}
		}
		return $i;
		
	}
	function ExecuteQueryInsert($sql)
	{	
			$db=$this->link->prepare($sql);
			$db->execute();
			$id= $this->link->lastInsertId();// tra ve id vua moi insert
			return $id;
		
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