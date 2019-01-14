<?php 
include "BDD_base.php";



Class API
{
	//initialize the request
	function __construct()
	{
		$this->reqArgs();

	}
	// provides the response 
	function reqArgs()
	{
		// get the HTTP method, path and body of the request
		
		$method = $_SERVER['REQUEST_METHOD'];
		$request = explode("/", $_SERVER['PATH_INFO']);
		$input = file_get_contents('php://input');
		
		if ($request){
			
			// retrieve the table and key from the path
			$table = $request[1];
			if(isset($request[2]))
				{
					$key = $request[2];
				}
				else {
					$key=null;
				}
	
		
		if ($input)
		{ 
				
			// escape the columns and values from the input object
			$columns = json_decode($input, true);
			$values = array_values($columns);

			var_dump($values);
			// build the SET part of the SQL command
			$set = "'$values[0]', '$values[1]', '$values[2]', '$values[3]', '$values[4]'";
		};
		
		if($method){
			$bdd = new BDD();

			switch ($method) {
				case 'GET':
				if ($key == null) {
					$bdd->getActionAll($table);
				}
				else{
					$bdd->getAction($table, $key);
				}
				break;

				case 'POST':
				$bdd->postAction($table, $set);
				break;

				case 'PUT':
				$bdd->putAction($table,$key, $set);
				break;

				case 'DELETE':
				$bdd->deleteAction($table, $key);
				break;

				default:
				echo "Méthode non définie dans l'API";
				break;
			}
		}
	}
}
}

new API();

?>