
<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<html>
<head>
	<title>Update Profile</title>
</head>
<body>
	<?php 
	 if($_SESSION["uType"] == "Admin"){
	 	include("adminLoggedHead.php"); 
	 }
	 else{
	 	include("loggedHead.php");
	 }
	?>
	<?php
	//var_dump($account);
	//$con = mysqli_connect("localhost", "root", "", "E-Shop");
	$userName = $password = $cpassword = $email = $crpass= "";
	$userNameer = $passer = $emer = $cpaser = true;
	$existcPass = $account['Password'];
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo "pise response";
		//******************** php er validation kora lagbe****************
		$username = $_POST['user_name'];
		$email = $_POST['Email'];
		//echo "$username";
		$crpass = $_POST['cpass'];
		$password = $_POST['Newpass'];
		//echo $username." ".$email." ".$crpass." ".$password." ".$account['user_Id'];
		//password ta encript kora lagbo
		$upAccount  = array('ID' => $account['user_Id'], 'UName' => $username , 'email' => $email, 'pass' => $password);
		if(updateAccountt($upAccount))	{
			echo "record Updated";
		}
	}
		
?>


	<table align="center"> 
	<tr>
		<td>

			<fieldset>
	<legend><h3>Update Profile</h3></legend>
	<form method="post">

	<table cellpadding="15" align="center"

		<tr>
			<td width="800">
				<h4>Change Details</h4>
				<hr>
			</td>

		</tr>

		<tr>
			<td>
				<label>Name</label>
				<input id = "user_name" type="text" name="user_name" value="<?=$account['UserName']?>"><br>
				<p id = "uNameErr"></p>
			</td>
		</tr>

		<tr>
			<td>
				<label>Email</label>
				<input id = "email" type="text" name="Email" value="<?=$account['Email']?>"><br>
				<p id = "emailERR"></p>
			</td>
		</tr>

	

		

		<tr>
			<td>
			<h3>Change Password</h3>
				<input id ="cPass" type="Password" name="cpass" placeholder="Current password">
				<p id = "cPassErr"></p>
			</td>
		</tr>

		<tr>
			<td>
				<input id = "nPass" type="Password" name="Newpass" placeholder="New password"><br>
				<p id = "nPassErr"></p>
			</td>
		</tr>

		<tr>
			<td>
				<input id ="cnPass" type="Password" name="Confarmpass" placeholder="Confirm new password">
				<p id ="cnPassErr"></p>
			</td>
		</tr>

		<tr>
			<td align="center">
			<hr>
				<input type="submit" onclick="submitform()" value="Update Your Profile">
			</td>
		</tr>

	</table>
	</form>
	</fieldset>
			
		</td>
	</tr>
		
	</table>	

	

	<?php include("tail.php"); ?>
</body>
</html>
<script type="text/javascript">
	function submitform() {
			alert("OK");
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
			//current password
			var pass ="<?=$account['Password']?>";
			alert(pass);
			var nPas = document.getElementById("cPass").value;

			if(nPas != pass) {
				document.getElementById("cPassErr").innerHTML = "* Current password wrong";
			}
			else{
				document.getElementById("cPassErr").innerHTML = "";
			}
			//new passwordvalidation

			//password verifiaction

			var npass = document.getElementById("nPass").value;

			if(npass.length < 6) {
				error = 1;
				document.getElementById("nPassErr").innerHTML = "* Password must be six character long";
			}
			else{
				document.getElementById("nPassErr").innerHTML = "";
			}

			//cPass verification

			var cPass  = document.getElementById("cnPass").value;

			if(cPass !=  npass) {
				error = 1;
				document.getElementById("cnPassErr").innerHTML = "* Passwords not matched";

			}
			else{
				document.getElementById("cnPassErr").innerHTML = "";
			}

			alert(error);
			//if find any error then stop submitting form
			 if(error == 1) {
			 	form.onsubmit = function() {return false;}
			 }
			 else{
			 	form.onsubmit = function() {return true;}
			 }


	}
</script>