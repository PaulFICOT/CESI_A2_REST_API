<?php 
Require_once 'config.php';
Class BDD
{
	//PDO connection is reached from the singleton class

	//get the selected row
	public Function getAction($table, $key)
	{

		try {
			$sql_get = singleton::getInstance()->prepare("SELECT * FROM $table WHERE id=$key");
			$sql_get->execute();
			$result = $sql_get->fetchAll(PDO::FETCH_ASSOC);
			var_dump($result);
			echo json_encode($result);
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}
	}

	public Function getActionAll($table)
	{
		try{
			$sql_get = singleton::getInstance()->prepare("SELECT * FROM $table");
			$sql_get->execute();
			$result = $sql_get->fetchAll(PDO::FETCH_ASSOC);
			var_dump($result);
			echo json_encode($result);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		exit;
		}
	}

	//update selected table 
	public Function putAction($table, $key, $set)
	{
		try {
			$sql_put = singleton::getInstance()->prepare("UPDATE $table	 SET ($set) WHERE id=$key");
			$sql_put->execute();
			var_dump($result);
			echo json_encode($result);
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//insert a row from selected table
	public Function postAction($table, $set)
	{
		try{
			$sql_post = singleton::getInstance()->prepare("INSERT INTO $table VALUES ($set)");
			$sql_post->execute();
			var_dump($result);
			echo json_encode($result);
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//delete a row from selected table
	public Function deleteAction($table, $key)
	{
		try{
			$sql_delete = singleton::getInstance()->prepare("DELETE FROM $table WHERE id = $key");
			$sql_delete->execute();
			var_dump($result);
			echo json_encode($result);
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	/*public Function deleteActionAll($table)
	{
		try{
			/*$sql_delete = singleton::getInstance()->prepare("DELETE FROM $table")
		}
	}*/

}
?>