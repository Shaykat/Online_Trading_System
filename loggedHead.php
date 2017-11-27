
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		label,h1,h2,h3,h4,h5{
			color: green;
		}
		input[type=text] {
		    width: 80%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		input[type=password] {
		    width: 80%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		.search{
			width: 60%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		a.one:link, a.one:visited {
		    color: white;
		    text-decoration: none;
		}

		a.one:hover, a.one:active {
		    color: gray;
		}
		#head{
			padding: 10px;
			text-align: center;
		}
		td{
			padding: 10px;
			text-align: left;
		}

		a.logo:link, a.logo:visited {
		    background-color:  #4d0872;
		    color: white;
		    padding: 14px 25px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		}


		a.logo:hover, a.logo:active {
		    background-color: #3b0757;
		}
		.nbar {
		  overflow: hidden;
		  /*background-color: #333;*/
		  position: fixed;
		  top: 0;
		  width: 100%;
		}
		.button {
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 10px 25px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 4px 2px;
		    cursor: pointer;
		    border-radius: 5px;
		}
	</style>
</head>

<body>
	<center>
		<!-- meanu bar !-->
		<div class = "nbar">
		<table border = "0" bgcolor="#7e2a99">
			<tr>
				<td id = "head" width="200">  </td>
				<td id = "head" width="200">
					<a class = "logo" href="Home_Page.php">					
						<!-- <img src="IMG/Logo1.png"/> -->
						Online Trading System
					</a>
				</td>				
				<td id = "head" width="200"> 
					<a class = "one" href = "requestholder.php?advertisement_showAllAdvertisementswithlogin"> All Advertisement </a>
				</td>
				<td id = "head" width="200">					
					<a class = "one" href = "requestholder.php ? advertisement_showjobLiswithlogin"> Job </a>
				</td>				
				<td id = "head" width="200">
					<a class = "one" href = "AdvertiseHome.php"> Post Your Add </a>
				</td>
				<td id = "head" width="200">					
					<a class = "one" href = "MyAccountHome.php"> My Account </a>
				</td>				
				<td id = "head" width="200">					
					<a class = "logo" id = "1" href ="requestholder.php?account_logout">user Log out</a>
					<p> </p>
				</td>				
				<td id = "head" width="200">  </td>
			</tr>		
		</table>
		</div>
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