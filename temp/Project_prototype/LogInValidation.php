<?php
	session_start();
?>

<?php
	$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$password = $email = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$password = test_data($_POST["Password"]);
		$Email = test_data($_POST["Email"]);

		$query = "SELECT Email,Password FROM register Where Email = '$Email' AND Password = '$password'";
		$result = mysqli_query($con, $query);
		if ($result) {
			$_SESSION["login"] = test_data($Email);
			$_SESSION["Target"] = test_data("Home_Page.php");
		    header("Location: check.php");
		}
	}


	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>