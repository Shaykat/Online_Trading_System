<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<html>
<head>
	<title></title>

	<style type="text/css">
		div{
			width: 30%;
			float: left;
			text-align: center;
			margin-right: 10px;
			margin-bottom: 5px;
		}
		div div{
			width: 100%;
			float: left;
			text-align: center;
			margin-right: 10px;
			margin-bottom: 5px;
		}
		table {
			border-collapse: collapse;
		}
	</style>
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

<br /> <h3 align = "center">ALL Advertisements</h3>
<div style="float: left; width: 100%">
	<label style="color: green; font-size: 18;">Search By category</label>
	<select name = "Ecatagory" onchange="SearchBycategory(this.value)">
	<option value = "MobilePhones">Mobile Phones </option>
	<option value = "ComputersAndTablets">Computers & Tablets</option>
	<option value = "CamerasAndCamrecorders">Cameras & Recorders</option>
	<option value = "ApartmentsAndFlats">Appartments & Flat</option>
</select>
</div>
 <hr/>

<div>
<table border = '1' id="Advertisements">
<?php

foreach ($advertisementList as $advertisement) {
	$info = $advertisement[6]."_".$advertisement[1];
		echo "

			<tr>
				<td width = '400' height = '200'  valign = 'top'>
					<div><a onclick = 'showDetails(\"".$info."\")'> <img width = '200' height ='100' src = 'IMG/".$advertisement[2]."'> </a></div>
					<div style = 'float: left;'>
					Title: $advertisement[3] <br>
					<font color='green'>Price: $advertisement[4]</font> <br>
					Location:$advertisement[5] <br>
					</div>
				</td>
			</tr>
			
		";

	}
?>
</table> </div>
<div id= "details" style="width: 60%;">
	
</div>

</body>
</html>
<script type="text/javascript">
	
	function showDetails(info) {
		
	
		

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
				document.getElementById("details").innerHTML = this.responseText;
			}
		};

		 xmlhttp.open("GET" , "requestholder.php?advertisement_adDetails&info=" + info, true);
		
		//xmlhttp.open("GET" , "lol.php?type =" + type , true);
		//alert("doom");


		xmlhttp.send();
	}
</script>

<script type="text/javascript">
	
	function SearchBycategory(val){

		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Advertisements").innerHTML = this.responseText;
                document.getElementById("details").innerHTML = "";
                //alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "requestholder.php?advertisement_searachBycategorywitoutlogin&catAdv=" + val, true);
        xmlhttp.send();

	}
</script>

