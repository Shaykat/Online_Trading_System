<?php
	echo "Request";
	define('APP_ROOT', "$_SERVER[DOCUMENT_ROOT]/Project_prototype");

	$hashError = true;

	if(count($_GET) > 0) {

		$key = array_keys($_GET)[0]; //ex_account update

		$path = explode("_", $key);

		if(count($path) == 2) {
			$hashError = false;

			$controller = $path[0];

			$view = $path[1];

			//echo $view;

			$isDispatchedByFrontController = true; 

			include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
		}
	}

	if($hashError) {
		include_once(APP_ROOT."/app/error.php");
	}
?>