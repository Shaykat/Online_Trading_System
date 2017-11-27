<?php
	session_start();
	if(!isset($_SESSION['uType'])){
		header("location: index.php");
	}
?>

<html>
<head>
	<title>
		MyAccounthome
	</title>
</head>
<body>
	<?php include("loggedHead.php"); ?>
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>
	<table>
		<tr>
			<td width==300>
			<!--kisu na pile my ccount e jibo-->
				<a href="requestholder.php ? advertisement_showAdvertisements"> My Advertisements</a>
				<hr>
			</td>
		</tr>

		<tr>
			<td width==300>
				<a href="requestholder.php ? advertisement_showjobList">Job vacancy List</a>
				<hr>
			</td>
		</tr>
		<tr>
			<td width==300>
				<a href="requestholder.php ? account_update"> Update Profile</a>
				<hr>
			</td>
		</tr>

		<tr>
			<td width==300>
				<a href = "requestholder.php ? account_login"> Log  out</a>
				<hr>
			</td>
		</tr>
	</table>
	<?php include("tail.php"); ?>
</body>
</html>