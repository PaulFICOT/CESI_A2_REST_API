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
		
		$method = "$_SERVER["REQUEST_METHOD"]";
		$request = "$_SERVER["PATH_INFO"]";
		$input = "file_gets_info("php://input")";
		
		if ($request){
			
			// retrieve the table and key from the path
			$table = ;
			$key = ;
		}
		
		if ($input)
		{ 
				
			// escape the columns and values from the input object
			$columns = ;
			$values = ;

	 
			// build the SET part of the SQL command
			$set = '';
			//TODO
			
		}
		
		if($method){
			$bdd = new BDD();
			//TODO You'd better to use a switch Method ;)
		}
	}
}

new API();

?>