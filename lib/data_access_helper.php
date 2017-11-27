<?php 
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "e-shop";

	function executeQuery($query) {
		global $serverName, $userName, $password, $dbName;

		$result  =  false;
		//echo "dukse";

		//$connection = mysqli_connect($serverName, $userName, $password, $dbName);
		$connection = mysqli_connect("localhost", "root", "", "e-shop");
		if($connection) {
			//echo "connected";
			$result = mysqli_query($connection, $query);
			//echo $result[0];
			//var_dump($result);

			mysqli_close($connection);
		}
		return $result;
	}
?>