<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		a.one:link, a.one:visited {
		    color: white;
		    text-decoration: none;
		}

		a.one:hover, a.one:active {
		    color: gray;
		}
	</style>
</head>

<body>
	<center>
		<!-- meanu bar !-->
		<table border = "0" bgcolor="cycne">
			<tr>
				<td width="200">  </td>
				<td width="200">
					<a href="Home_Page.php">					
						<img src="IMG/Logo1.png"/>
					</a>
				</td>				
				<td width="200"> 
					<a class = "one" href = "AllAdv.php"> All Advertisement </a>
				</td>
				<td width="200">					
					<a class = "one" href = ""> Help & Support </a>
				</td>				
				<td width="200">
					<a class = "one" href = "AdvertiseHome.php"> Post Your Add </a>
				</td>
				<td width="200">					
					<a class = "one" href = "MyAccountHome.php"> My Account </a>
				</td>				
				<td width="200">					
					<a class = "one" id = "1" href = "SessionCheck.php"><?php 
					if(isset($_SESSION["login"])) echo "Log Out";
					else echo "Log In";
					?></a>
					<p> </p>
				</td>				
				<td width="200">  </td>
			</tr>		
		</table>
	</center>
	<hr>
</body>
</html>

<?php
	/*if(!isset($_SESSION["login"])){
		//var_dump($_SESSION);
		echo '
			<script type="text/javascript">
				//alert("Hello");
				function change(){
					document.getElementById("1").innerHTML = "Log In";
				}
				window.setInterval(change, 100);
			</script> 
		';
	}
	else{
		//var_dump($_SESSION);
		echo '
			<script type="text/javascript">
				//alert("Hello");
				function Change(){
					document.getElementById("1").innerHTML = "Log Out";
				}
				window.setInterval(Change, 100);
			</script> 
		';
	}*/
?>