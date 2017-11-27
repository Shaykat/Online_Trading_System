<?php
	session_start();
?>

<?php
	$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$password = $email = $loginerror = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$password = test_data($_POST["Password"]);
		$Email = test_data($_POST["Email"]);

		$query = "SELECT Email,Password FROM register Where Email = '$Email' AND Password = '$password'";
		$result = mysqli_query($con, $query);
		$data = mysqli_fetch_array($result);
		if ($data) {
			$_SESSION["login"] = test_data($Email);
			$_SESSION["Target"] = test_data("Home_Page.php");
		    header("Location: check.php");
		}
		else{
			$loginerror = "*user name or Password may be wrong";
			$_SESSION["loginer"] = test_data($loginerror);
			header("Location: LogIn.php");
		}
	}


	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>