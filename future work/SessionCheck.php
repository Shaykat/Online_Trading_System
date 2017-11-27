<?php 
	session_start();
?>

<?php 
	if(isset($_SESSION["login"])){
		session_destroy();
		session_unset();
		header("Location: LogIn.php");
	}
	else{
		header("Location: LogIn.php");
	}
?>