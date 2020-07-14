<?php
class DataProvider
{
	private $link;//bien ket noi csdl
	function __construct()
	{
		$this->link=mysqli_connect("localhost","root","","sellclothes");
	}
	function ExecuteQuery($sql)
	{
		mysqli_query($this->link,"set names 'utf8'");
		return mysqli_query($this->link, $sql);
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
	function ExecuteQueryInsert($sql)
	{
		$result=$this->ExecuteQuery($sql);
		if($result > 0)
		{
			return mysqli_insert_id($this->link);// tra ve id vua moi insert
		}
		else
			return 0;
	}
	
	function Fetch($sql)
	{
		$result=$this->ExecuteQuery($sql);
		return mysqli_fetch_assoc($result);
	}
	function NumRows($sql)
	{
		$result=$this->ExecuteQuery($sql);
		return mysqli_num_rows($result);
	}
	function FetchAll($sql)
	{
		$result=$this->ExecuteQuery($sql);
		$arr=array();
		while($row=mysqli_fetch_assoc($result))
		{
			$arr[]=$row;
		}
		mysqli_free_result($result);
		return $arr;
	}
	function __destruct()
	{
		mysqli_close($this->link);
	}
}
?>