 <?php
	//session_start();
	if(!isset($_SESSION["loginer"])) $loginerror = "";
	else $loginerror = $_SESSION["loginer"];
?>
<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>



<?php
	//$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$password = $email = $loginerror = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$password = test_data($_POST["Password"]);
		//$password = md5($password);
		$Email = test_data($_POST["Email"]);

		$account = chechkLogin($password,$Email);
		if($account) {
			$Email =test_data($account[0]);
			$type = test_data($account[2]);
			$_SESSION["login"] = test_data($Email);
			$_SESSION["uType"] = test_data($type);

			if($type == "User") {
			//include_once(APP_ROOT."/app/view/loggedHome.php");
				header("Location: loggedHome.php");
			}
			else{
				header("Location: adminloggedHome.php");
			}
		}
		else{
			$loginerror = "Username or password is wrong";
		}
	}
	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>


<html>
<head>
	<title>E-Shop Login</title>
	<style>
		a.two:link, a.two:visited {
		    color: blue;
		    text-decoration: none;
		}

		a.two:hover, a.two:active {
		    color: green;
		}

		.button {
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 10px 25px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 4px 2px;
		    cursor: pointer;
		    border-radius: 5px;
		}
	</style>
</head>

<body>
<!-- Head -->
	<?php
	include_once("head.php");
	 //include("/Online_Trading_System/head.php"); 
	 ?>
	 <div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>

	<table  align="center">
	<!--table caption-->
		<tr>
			<td>
			<form method="POST">
				<table  cellpadding="10">
					<tbody>
					<tr>
						<td width="350">
							<!-- <h3 style="color:green; text-align: center;" >Sign in</h3> -->
						</td>
					</tr>

					<tr>
						<td>
							<p><font color = "red"> <?php echo $loginerror; ?> </font></p>
							<label style="color: green">Email (phone for mobile accounts)</label><br>
							<input type="text" name="Email" size="30" >	

						</td>
					</tr>

					<!--forgot password er form banate hbe-->
					<tr>
						<td>
							<label style="color: green">Password</label><br>
							<input type="Password" name="Password" size="30"><br>
						</td>
					</tr>

					<tr>
						<td>
							
							<input class = "Button" type="submit" name="signIn" value="Sign in" >
							
						</td>
					</tr>

					<tr>
						<td>
							
							<hr>
							
						</td>
					</tr>
					<!--link change koris-->
					<tr>
						<td>
							<font size="3" color="blue"> New to E-shop?</font><br>
							<a class = "two" href="requestholder.php ? account_create"> Create your E-Shop account </a>
						</td>
					</tr>
					</tbody>
				</table>
				</form>
				<!--end 2ndtable-->
			</td>
		</tr>
	</table>
	<?php include("tail.php"); ?>
</body>

<!--end body-->
</html>