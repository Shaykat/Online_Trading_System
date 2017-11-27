<?php
	
	if(!isset($isDispatchedByFrontController)) {
		include_once("../error.php");
		die;
	}
?>

<?php
	//$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$userName = $password = $cpassword = $email = "";
	$userNameer = $passer = $emer = $cpaser = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$userName = test_data($_POST["user_name"]);
		$password = test_data($_POST["Password"]);
		$cpassword = test_data($_POST["confirm_Password"]);
		$Email = test_data($_POST["Email"]);
		$usertype = test_data($_POST["usertype"]);

		echo $userName." ".$password." ".$cpassword." ".$Email." ".$usertype;
		//var_dump($usertype);

		$passer = password_velidation($password);
		$userNameer = userName_velidation($userName);
		$emer  = Email_velidation($Email);
		/*var_dump($emer);
		var_dump($passer);
		var_dump($userNameer);
		var_dump($Password);
		var_dump($cpassword);*/
		if($passer == "" || $password == $cpassword || $userNameer == "" || $emer == ""){
			
			//header("Location:CreateAccount.php");
			// //echo "sob okay";
			if(getCheckEmailDupicity($Email)){
				$password = md5($password);
				$user = array('u_name' => $userName, 'email' => $Email , 'pass' => $password , 'uType' => $usertype); 

				if(adduser($user)) {
					//echo "user added";
					header("location: LogIn.php");
				}
			}
			else{
				$emer = "This user already exist";
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

	
?>

<!--------------------------------------sign up Form---------------------->
<html>

<!--------------------------------------head---------------------->

<head>
	<title>E-Shop signup</title>
	<style type="text/css">
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
		label{
			color: green;
		}
	</style>

</head>

<!--------------------------------------start body---------------------->
<body>
<!-- Head -->
<?php include("head.php") ?>
<div id="div-top" style="width: 100%; height: 100px"> 
	
</div>

<table  align="center">
<tr>
	<td>
	<fieldset>
	<legend><h3 style="color:green; text-align: left;">Create Account</h3></legend>
	<form method="post">
		<table  cellpadding="10">

			<tbody>
			<tr>
				<td>
					<label>Your name</label><br>
					<input id = "user_name" type="text" name="user_name" size="30" placeholder="must contain two words "><br>
					<font id="uNameErr" color="red"><?php echo $userNameer; ?></font>

				</td>
			</tr>



			<tr>
				<td>
					<label>Email</label><br>
					<input id = "email" type="text" name="Email" size="30" placeholder="someone@example.com"><br>
					<font id ="emailERR" color = "red"><?php echo $emer; ?></font>
				</td>
			</tr>

			<tr>
				<td>
					<label>User Type</label><br>
					<select name = "usertype">
					<option value ="Admin">Admin</option>
					<option value = "User">User</option>
						
					</select>
				</td>
			</tr>



			<tr>
				<td>
					<label>Password</label><br>
					<input id = "pass" type="Password" name="Password" size="30"  placeholder="at least six characters long"><br>
					<font id ="passErr" color = "red"><?php echo $passer; ?></font>
				</td>
			</tr>



			<tr> <td>
					<label>Confirm Password</label><br>
					<input id = "cPass" type="Password" name="confirm_Password" size="30" placeholder="Re-type Password"><br>
					<font id ="cPassErr"  color = "red"></font>
				</td>
			</tr>

			<tr>
				<td>
					
					<input class = "Button" type="submit" name="signup" value="Create your E-shop account" onclick="submitform()">

					
				</td>
			</tr>


			<!--link change koris-->

			<tr>
				<td>
					<hr>
					<font size="3" color="blue"> Already have an account?</font>
					<a href="requestholder.php?account_login">Sign in</a>
					
				</td>
			</tr>
				
				
			</tbody>
		</table>
	</form>
	</fieldset>

	<!--end 2ndtable-->
				
	</td>
</tr>
</table>	

<?php include("tail.php") ?>
<!-- Quick Links -->

</body>

<!--end body-->
</html>


	<script type="text/javascript">

			function submitform() {
			//alert("dukse");
			var error = 0;
			var form = document.getElementsByTagName("form")[0];
			var uName = document.getElementById("user_name").value;
			//

			// name validation
			//document.getElementById("uNameErr").innerHTML = "* username Required";

			if(uName == "") {
				//alert("empty");
				error = 1;
				 document.getElementById("uNameErr").innerHTML = "* Username Required";

				//alert(l);
				//form.onsubmit = function() {return false;}
			}
			

			 else  {
			 	var nameArray = uName.split(" ");
			 	if(nameArray.length != 2) {
				error = 1;
				document.getElementById("uNameErr").innerHTML = "* Name must be contain  two words";
				}
				else{
					document.getElementById("uNameErr").innerHTML = "";
				}

			}

			//email verifiction

			var email = document.getElementById("email").value;
			if(email == "") {
				error = 1;
				document.getElementById("emailERR").innerHTML = "* Email Required";
			}

			var atpos = email.indexOf('@');
			var dotpos = email.indexOf('.');

			if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length)  {
				error = 1;
				document.getElementById("emailERR").innerHTML = "* Not a valid e-mail address";
			}
			else{
				document.getElementById("emailERR").innerHTML = "";
			}

			//password verifiaction

			var pass = document.getElementById("pass").value;

			if(pass.length < 6) {
				error = 1;
				document.getElementById("passErr").innerHTML = "* Password must be six character long";
			}
			else{
				document.getElementById("passErr").innerHTML = "";
			}

			//cPass verification

			var cPass  = document.getElementById("cPass").value;

			if(cPass !=  pass) {
				error = 1;
				document.getElementById("cPassErr").innerHTML = "* Passwords not matched";

			}
			else{
				document.getElementById("cPassErr").innerHTML = "";

			}
			//alert(error);
			//if find any error then stop submitting form
			 if(error == 1) {
			 	form.onsubmit = function() {return false;}
			 }
			 else{
			 	form.onsubmit = function() {return true;}
			 }

		}

		
	</script>