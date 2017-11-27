<?php
	session_start();
?>

<?php
	$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$userName = $password = $cpassword = $email = "";
	$userNameer = $passer = $emer = $cpaser = true;

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$userName = test_data($_POST["user_name"]);
		$password = test_data($_POST["Password"]);
		$cpassword = test_data($_POST["confirm_Password"]);
		$Email = test_data($_POST["Email"]);
		//var_dump($usertype);

		$passer = $_SESSION["passerror"] = password_velidation($password);
		$userNameer = $_SESSION["userNameer"] = userName_velidation($userName);
		$emer = $_SESSION["emailer"] = Email_velidation($Email);
		/*var_dump($emer);
		var_dump($passer);
		var_dump($userNameer);
		var_dump($Password);
		var_dump($cpassword);*/
		if($passer !== "" || $password !== $cpassword || $userNameer !== "" || $emer !== ""){
			//echo "welcome to reg";
			header("Location:CreateAccount.php");
		}
		else{
			if(isset($con)){
				$query = "INSERT INTO register(UserName, Email, Password) VALUES ('$userName', '$Email', '$password')";
				$result = mysqli_query($con, $query);
				//var_dump($result);
				header("Location: LogIn.php");
			}
			else{
				echo "Internal error occured";
			}
		}
	}

	function password_velidation($password){
		$error = "";
		if($password == ""){
			$error = "password required";
		}
		else{
			$l = strlen($password);
			if($l < 6){
				$error = "Password must contain 6 character";
			}
		}
		return $error;
	}

	function userName_velidation($userName){
		//var_dump($userName);
		$error = "";
		if($userName == ""){
			$error = "UserName field is empty";
			return $error;
		}

		$uname = explode(" ", $userName);
		//var_dump($uname);
		if(sizeof($uname) < 2){
			$error = "UserName should contain at least two words";
			return $error;
		}
		return $error;
	}

	function Email_velidation($email){
		$error = "";
		$l1 = strpos($email, '@');
		$l2 = strpos($email, '.');
		$l3 = strlen($email);
		if($email == null){
			$error =  "Email cannot be empty";	
		}
		else{
			if($l1 && $l2 && $l1 < $l2-1 && ($l1 < $l3-1 && $l2 < $l3-1)){
				$error =  "";
			}
			else{
				$error =  "Must be a valid email address (i.e anything@example.com)";
			}
		}
		return $error;
	}

	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>