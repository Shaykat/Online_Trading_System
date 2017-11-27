<?php 
	session_start();
?>

<html><!DOCTYPE html>
<html>
<head>
	<title>Online Shop</title>
	<script type="text/javascript">	
		var y = 0;
		function imgshow(x){
			//alert(x);
			if(x == 1)	{ document.getElementById("1").src = "IMG/ad1.jpg"; y = 1;}
			if(x == 2)	{ document.getElementById("1").src = "IMG/ad2.jpg"; y = 2;}
			if(x == 3)	{ document.getElementById("1").src = "IMG/ad3.jpg"; y = 3;}
			if(x == 4)	{ document.getElementById("1").src = "IMG/ad4.jpg"; y = 4;}
		}

		function nxt(){
			if(y == 4) y = 0;
			imgshow(y+1);
		}
		window.setInterval(nxt, 500);
	</script>
</head>
<body> 
	<?php include("head.php"); ?>
	<hr>
	<div> <!-- Slide show !-->
		<center> <td colspan="4"> <img id = "1" src="IMG/ad1.jpg" width="1200" height="250"> </td> </center>
	</div>

	<center>
		<table cellspacing="10"> <!-- Search !-->
			<tr>
				<td>
					<center>
						<input type="text" name="search" placeholder="Search..">
					</center>
				</td>
				<td width="300">
					<input type="button" value="search">
				</td>
			</tr>
		</table>
	</center>

	<!-- Browse our top categories !-->

	<center>
		<table>
		<tr>
		<td>
		<fieldset>
			<legend> Browse our top categories </legend>
			<table> 
				<tr>
					<td width = "285"> 
						<center> 
							<img src="IMG/electronic.jpg" height="100">
								<center> <a href = ""> Electronics </a> </center>
							</center>
					</td>
					<td width = "285"> 
						<center> 
						<img src="IMG/property.jpg" height="100">
						<center> <a href = ""> Property </a> </center>
						</center>
					</td>
					<td width = "285"> 
						<center> 
							<img src="IMG/cars.jpg" height="100">
							<center> <a href = ""> Cars & Vehicles </a> </center> 
						</center>
					</td>
					<td width = "285"> 
						<center> 
							<img src="IMG/job.jpg" height="100">
							<center> <a href = ""> Jons In Bangladsh </a> </center> 
						</center>
					</td>
				</tr>
			</table>
		</fieldset>
		</td>
		</tr>
		</table>
	</center>

	<!-- Advertisement !-->
	<center>
		<table border = "1" cellspacing="5">
			<tr>
				
				<td rowspan="4" width="190" valign="top"> 
					<lebel> <font size="5"> Locations </font> </lebel>
					<ul>
						<li> <a href=""> Dhaka </a> </li>
						<li> <a href=""> Chittagong </a> </li>
						<li> <a href=""> Sylhet </a> </li>
						<li> <a href=""> Comilla </a> </li>
						<li> <a href=""> Rajshahi </a> </li>
						<li> <a href=""> Borishal </a> </li>
						<li> <a href=""> Khulna </a> </li>
					</ul>
				</td>

			</tr>

			<tr>
				<td width="315"> 
					<center> 
						<img src="IMG/electronic.jpg" height="100">
						<center> <a href = "AllAdv.html"> Electronics </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/property.jpg" height="100">
						<center> <a href = "AllAdv.html"> Property </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find the cheapest rates for apartments and commercial properties, as well as for land and plots. </p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/job.jpg" height="100">
						<center> <a href = "AllAdv.html"> Jons In Bangladsh </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
			</tr>

			<tr>
				<td width="315"> 
					<center> 
						<img src="IMG/cars.jpg" height="100">
						<center> <a href = "AllAdv.html"> Cars & Vehicles </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/cloths.jpg" height="100">
						<center> <a href = ""> Clothing, Health & Beauty </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/sports.jpg" height="100">
						<center> <a href = ""> Hobby,Sport & Kids </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
			</tr>

			<tr>
				<td width="315"> 
					<center> 
						<img src="IMG/gardens.jpg" height="100">
						<center> <a href = ""> Home & Gardens </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/pets.jpg" height="100">
						<center> <a href = ""> Pets & Animels </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
				<td width="315"> 
					<center> 
						<img src="IMG/sports.jpg" height="100">
						<center> <a href = ""> Others </a> </center>
						<center> <p> <font color="gray"> (1002) </font></p> </center>
						<p> Find used electronics in Bangladesh including mobile phones, computers, laptops, TVs, cameras.</p> 
					</center>
				</td>
			</tr>
		</table>
	</center>
	<?php include("tail.php"); ?>
</body>

<?php
	if(isset($_SESSION)){
		var_dump($_SESSION);
	}
?>