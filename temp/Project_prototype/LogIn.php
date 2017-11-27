  <?php
	session_start();
?>

<html>
<head>
	<title>E-Shop Login</title>
	<style>
		a.one:link, a.one:visited {
		    color: blue;
		    text-decoration: none;
		}

		a.one:hover, a.one:active {
		    color: gray;
		}
	</style>
</head>

<body>
<!-- Head -->
	<?php include("head.php"); ?>

	<table  align="center">
	<!--table caption-->
		<caption><i><h3>ESHOP</h3></i></caption>
		<tr>
			<td>
			<fieldset>
			<form method="POST" action="LogInValidation.php">
				<table  cellpadding="10">
					<tbody>
					<tr>
						<td width="350">
							<h2 >Sign in</h2>
						</td>
					</tr>

					<tr>
						<td>
							<label>Email (phone for mobile accounts)</label><br>
							<input type="text" name="Email" size="30" >	

						</td>
					</tr>

					<!--forgot password er form banate hbe-->
					<tr>
						<td>
							<label>Password</label><br>
							<input type="Password" name="Password" size="30"><br>
							<a  href="https://www.w3schools.com/html/html_tables.asp">
							Forgot your password?</a>
						</td>
					</tr>

					<tr>
						<td>
							
							<input type="submit" name="signIn" value="Sign in" >
							
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
							<a class = "one" href="CreateAccount.php"> Create your E-Shop account </a>
						</td>
					</tr>
					</tbody>
				</table>
				</form>
				<!--end 2ndtable-->
			</fieldset>
			</td>
		</tr>
	</table>
	<?php include("tail.php"); ?>
</body>

<!--end body-->
</html>