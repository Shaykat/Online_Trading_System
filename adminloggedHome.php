<?php 
session_start();

 ?>
 <?php 
	if(!isset($_SESSION['uType'])){
		header("Location: index.php");
	}
?>
<html>
<head>
	<title> Home Page </title>
	<Style>
		body{
			/*padding-right: 10%; 
			padding-left: 10%;*/ 
			background-color: none;
			height: auto;
		}
		div{
			width: 20%; 
			background-color: none; 
			float: left; 
			/*height: 220px;*/ 
			text-align: center; 
			margin-right: 10px; 
			margin-bottom: 5px;
		}
		#div-top{
			/*width: 245.8px; */
			background-color: none; 
			float: left; 
			height: 250px; 
			text-align: center; 
			margin-right: 5px; 
			margin-bottom: 5px;;
		}
		img {
		    max-width:150px;
		    max-height:150px;
		    width:auto;
		    height:auto;
		}
		#p1 {
		    max-width:100%;
		    max-height:250px;
		}
	</Style>

	<script type="text/javascript">	
		var y = 0;
		function imgshow(x){
			//alert(x);
			if(x == 1)	{ document.getElementById("p1").src = "IMG/ad1.jpg"; y = 1;}
			if(x == 2)	{ document.getElementById("p1").src = "IMG/ad2.jpg"; y = 2;}
			if(x == 3)	{ document.getElementById("p1").src = "IMG/ad3.jpg"; y = 3;}
			if(x == 4)	{ document.getElementById("p1").src = "IMG/ad4.jpg"; y = 4;}
		}

		function nxt(){
			if(y == 4) y = 0;
			imgshow(y+1);
		}
		window.setInterval(nxt, 5000);

	</script>
</head>
<body>
	<!-- Head -->
	<?php include("adminLoggedHead.php"); ?>

	<!-- This is Advertisement slider -->
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>
	<div id="div-top" style="width: 100%;"> 
		<center><img id = "p1" src="IMG/ad1.jpg" style="width:100%;">
		</center>
	</div>

	<!-- Left nevigation bar -->
	<div id="div-top-side" style="height: 700px; width: 25%; border:black; margin-top: 20px; margin-bottom: 20px; text-align: left;"> 
		<table border = "1">
			<tr>
				<td rowspan="1" height="680" valign="Top" style="padding: 5px;">
					<a>
						Categories
						<ul>
							<li>Electromics</li>
							<ul>
								<li>Mobile Phones</li>
								<li>Computer & Laptop</li>
								<li>Camera & Recorder</li>
							</ul>

							<li>Property</li>
							<ul>
								<li>Apartments & Flats</li>
								<li>Houses</li>
								<li>Plots & Lands</li>
								<li>Commercial Property</li>
							</ul>

							<li>Job</li>
							<ul>
								<li>Accounting / Finance</li>
								<li>Banking</li>
								<li>IT </li>
								<li>Airlines</li>
								<li>Hotel / Resturent</li>
								<li>Government</li>
							</ul>
						</ul>
					</a>
				</td>
			</tr>
		</table>
	</div>

	<!-- Top categories -->

	<div id="div-top" style="height: 249px; width: 755px; border:black; margin-top: 20px; float: left;"> 
		<fieldset>
			<legend>Top Categories </legend>
			<div style="float: left; margin-left: 100px;">
				<a> <img src="IMG/electronic.jpg" width="100"> </a>
				<center> <a href="requestholder.php ? advertisement_showProductCategorywithlogin&category=product"> Electronics </a> </center>
			</div>

			<div style="float: left; margin-left: 5px;">
				<a> <img src="IMG/property.jpg" width="100"> </a>
				<center> <a href="requestholder.php ? advertisement_showProductCategorywithlogin&category=property"> Property </a> </center>
			</div>

			<div style="float: left; margin-left: 5px;">
				<a> <img src="IMG/job.jpg" width="100"> </a>
				<center> <a  href="requestholder.php ? advertisement_showjobLiswithlogin"> Jobs </a> </center>
			</div>
			
		</fieldset> <br>
	</div>

	<!-- addertisement categories -->
	<div> 
		<img src="IMG/electronic.jpg" width="100">
		<center> <a href = "AllAdv.php"> Electronics </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>

	</div>
	<div> 
		<img src="IMG/property.jpg" width="100">
		<center> <a href = "AllAdv.php"> Property </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/job.jpg" width="100">
		<center> <a href = "AllAdv.php?view=allAdd"> Jobs </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/cars.jpg" width="100">
		<center> <a href = "AllAdv.php"> Cars & Vehicles </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/cloths.jpg" width="100">
		<center> <a href = ""> Clothing, Health & Beauty </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/sports.jpg" width="100">
		<center> <a href = ""> Hobby,Sport & Kids </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>

	<div> 
		<img src="IMG/gardens.jpg" width="100">
		<center> <a href = "AllAdv.php"> Home & Garden </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/pets.jpg" width="100">
		<center> <a href = ""> Pets & Animals </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
	<div> 
		<img src="IMG/sports.jpg" width="100">
		<center> <a href = ""> Others </a> </center>
		<center> <p> <font color="gray"> (1002) </font></p> </center>
	</div>
</body>
</html>
<?php include("tail.php"); ?>