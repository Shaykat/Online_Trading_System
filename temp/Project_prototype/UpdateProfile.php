<html>
<head>
	<title>Update Profile</title>
</head>
<body>
	<?php include("head.php"); ?>

	<fieldset>
	<legend><h3>Update Profile</h3></legend>
	<form>

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
				<input type="text" name="name" placeholder="Nahid Hasan">
			</td>
		</tr>

		<tr>
			<td>
				<label>Email</label>
				<input type="text" name="name" placeholder="hasannahid371@gmail.com">
			</td>
		</tr>
		<tr>
			<td>
			<h3>Change Password</h3>
				<input type="text" name="cpass" placeholder="Current password">
			</td>
		</tr>

		<tr>
			<td>
				<input type="text" name="Newpass" placeholder="New password">
			</td>
		</tr>

		<tr>
			<td>
				<input type="text" name="Confarmpass" placeholder="Confirm new password">
			</td>
		</tr>

		<tr>
			<td align="center">
			<hr>
				<input type="submit" name="Confarmpass" value="Update Your Profile">
			</td>
		</tr>

	</table>
	</form>
	</fieldset>

	<?php include("tail.php"); ?>
</body>
</html>