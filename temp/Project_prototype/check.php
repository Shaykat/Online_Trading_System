<?php 
	session_start();
?>

<?php 
	if(isset($_SESSION)){
		$add = $_SESSION["Target"];
		header("Location: ".$add);
	}
?>