<?php
	session_start();
?>

<!--------------------------------------sign up Form---------------------->
<html>

<!--------------------------------------head---------------------->

<head>
	<title>E-Shop signup</title>

</head>

<!--------------------------------------start body---------------------->
<body>
<!-- Head -->
<?php include("head.php") ?>

<table  align="center">
<caption><i><h3>ESHOP</h3></i></caption>
<tr>
	<td>
	<fieldset>
	<legend><h2>Create Account</h2></legend>
	<form method="post" action="CreateAccountValidation.php">
		<table  cellpadding="10">

			<tbody>
			<tr>
				<td>
					<label>Your name</label><br>
					<input id = "user_name" type="text" name="user_name" size="30" placeholder="must contain two words ">
					<p id="uNameErr"></p>

				</td>
			</tr>



			<tr>
				<td>
					<label>Email</label><br>
					<input id = "email" type="text" name="Email" size="30" placeholder="someone@example.com">	
					<p id ="emailERR"></p>
				</td>
			</tr>



			<tr>
				<td>
					<label>Password</label><br>
					<input id = "pass" type="Password" name="Password" size="30"  placeholder="at least six characters long"><br>
					<p id ="passErr"></p>
				</td>
			</tr>



			<tr> <td>
					<label>Confirm Password</label><br>
					<input id = "cPass" type="Password" name="confirm_Password" size="30" placeholder="Re-type Password"><br>
					<p id ="cPassErr"></p>
				</td>
			</tr>

			<tr>
				<td>
					
					<input type="submit" name="signup" value="Create your E-shop account" onclick="submitform()">

					
				</td>
			</tr>


			<!--link change koris-->

			<tr>
				<td>
					<hr>
					<font size="3" color="blue"> Already have an account?</font>
					<a href="file:///C:/Users/Sabuj/Desktop/Signup.html">Sign in</a>
					
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
			alert("dukse");
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

			//password verifiaction

			var pass = document.getElementById("pass").value;

			if(pass.length < 6) {
				error = 1;
				document.getElementById("passErr").innerHTML = "* Password must be six character long";
			}

			//cPass verification

			var cPass  = document.getElementById("cPass").value;

			if(cPass !=  pass) {
				error = 1;
				document.getElementById("cPassErr").innerHTML = "* Passwords not matched";

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