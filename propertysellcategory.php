<?php 
session_start();

 ?>
 <?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>
<html>
<head>
	<title></title>
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
	<table  cellpadding="15">
		<tbody>
			<tr>
				<td height="100"  width="900">
				<h3>Offer a property for Sell</h3>
				<hr>
				</td>
			</tr>
		</tbody>
	</table>


	<!--Products category-->
	<table  cellpadding="30">
		<tbody>
		<tr>
		<td width="300">
			<?php include("propertycategory.php"); ?>
		</td>	
		</tr>
			

		</tbody>
	</table>
	<?php include("tail.php"); ?>
</body>
</html>