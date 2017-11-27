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
	<?php include("adminLoggedHead.php"); ?>
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>
	<table>
		<tr>
			<td height = "100" width= "300">
			
			</td>
		</tr>
		<tr>
			<td width= "300">
			<!--kisu na pile my ccount e jibo-->
				<a href="requestholder.php ? account_showAllUsers">Show All Users</a>
				<hr>
			</td>
		</tr>
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

			<tr>
			<td width= "300">
			<!--kisu na pile my ccount e jibo-->
				<a href="requestholder.php ? advertisement_showAllAdvertisements">All Advertisements</a>
				<hr>
			</td>
		</tr>

		<tr>
			<td width= "300">
				<a href="requestholder.php ? advertisement_showAlljobList">All Jobvacancy List</a>
				<hr>
			</td>
		</tr>
		<tr>
			<td width= "300">
				<a href="requestholder.php ? account_update"> Update Profile</a>
				<hr>
			</td>
		</tr>

		<tr>
			<td width= "300">
				<a href = "requestholder.php ? account_login"> Log  out</a>
				<hr>
			</td>
		</tr>
	</table>
	<?php //include("tail.php"); ?>
</body>
</html>