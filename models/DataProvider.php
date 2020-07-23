<<?php
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
		return $this->link->query($sql);
	}
	function ExecuteMultiQuery($sql){
		if ($this->link->multi_query($sql)) {
			do {
				/* store first result set */
				if ($result = $this->link->store_result()) {
					while ($row = $result->fetch_row()) {
						printf("%s\n", $row[0]);
					}
					$result->free();
				}
				/* print divider */
				if ($this->link->more_results()) {
					printf("-----------------\n");
				}
			} while ($this->link->next_result());
			return 1;
		}
	}
	
	
	function Fetch($sql)
	{
		$db=$this->link->prepare($sql);
		$db->execute();
		$result=$db->fetchAll(PDO::FETCH_ASSOC);
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
		$result=$db->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	function __destruct()
	{
		$this->link=null;
	}
}
?>