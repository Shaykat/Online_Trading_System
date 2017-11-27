<html>
<head>
	<title></title>
</head>
<body>
	<?php include("head.php"); ?>
	<table align = "center">
		<tr>
			<td>
				<fieldset>
				<legend><h2 >Sell an Item</h2></legend>
				<form  method="post" action = "ElectronicsDetails.php">
			
					<table  cellspacing="15">
						<tr>
							<td Width = "800">
								<h3>1.Select Electornics Subcategory</h3>
								<!--Subcategory of Electronics-->
								<select name = "Ecatagory">
									<option value = "MobilePhones">Mobile Phones </option>
									<option value = "ComputersAndTablets">Computers & Tablets</option>

									<option value = "CamerasAndCamrecorders">Cameras & Recorders</option>

								</select>
								<br>
								<br>
								<hr>
							</td>
						</tr>

						<!--including Location-->
						<tr>
							<td width = "800">
								<?php include("Location.php"); ?>
								<br>
								<br>
								<hr>
							</td>
						</tr>

						<!--Product Details-->
						<tr>
							<td width = "800">
							<h3>3. Add Details </h3>
								<h4>Add photos</h4>
								 <input id = "uploadBox" type="file" name="pic" accept="image/*"><br>
								 <p id = "picErr"></p>
								 <hr>
							</td>
						</tr>

						<tr>
							<td> 
								<label>Product Title</label><br>
								<input id = "pTitle" size= "40" type="text" name="productTitle" placeholder = "Given a suitable Title"><br>
								<p id = "pTitleErr"></p>
							</td>
						</tr>

						<tr>
							<td> 
				
								<label>Description</label><br>
								<textarea id ="pDescription" name="description" placeholder="(Optional)" rows ="7" cols="60"></textarea><br>

								
							</td>
						</tr>

						<tr>
							<td>
							<label>Product Condition</label><br>
								<select name="pCondition">
									<
									<option value="new">New</option>
									<option value="old">Old</option>
								</select>
								
							</td>
						</tr>
								
						<tr>
							<td>
								<label>Model</label><br>
								<input id = "pModel" type="text" name="model" placeholder="Model and color"><br>
								<p id = "pModelErr"></p>
								
							</td>
						</tr>	

						<tr>
							<td>
								<label>Price(TK)</label><br>
								<input id = "pPrice" type="text" name="price" >
								<input type="checkbox" name="negotiable" value="negotiable"> negotiable<br>
								<p id  ="priceErr"></p>
								
							</td>
						</tr>	
								
						<tr>
							<td>
								
								<?php include("ContractDetails.php");  ?>
								
							</td>
						</tr>	
						<tr>
							<td align= "center">
								<input type="submit" name="submit" value="Post ad"onclick = "formsubmit()" >
								
							</td>
						</tr>	
					</table>
				</form>
				</fieldset>
			</td>
		</tr>
	</table>
	<?php include("tail.php"); ?>
</body>
</html>
<script type="text/javascript">

	function formsubmit(){
		alert("ok");
		var form = document.getElementsByTagName("form")[0];
		var error = 0;

		//imge validation
		if(document.getElementById("uploadBox").value == "") {
			//alert("no no");
			error = 1;
			document.getElementById("picErr").innerHTML = "* Product Image Required";
		}
		else{
				document.getElementById("picErr").innerHTML = "";
		}

		//Title validation
		var title = document.getElementById("pTitle").value;

		if(title == "") {
			error = 1;
			document.getElementById("pTitleErr").innerHTML = "* Product Title Required";
		}
		else{
			document.getElementById("pTitleErr").innerHTML = "";

		}

		 var des =  document.getElementById("pDescription").value;
		

		//product model verification
		var model = document.getElementById("pModel").value;

		if(model == "") {
			error = 1;
			document.getElementById("pModelErr").innerHTML = 
			"* product Model Required";
		}
		else{

			document.getElementById("pModelErr").innerHTML = 
			"";
		}

		//price tag validation

		var price = document.getElementById("pPrice").value;
		if( price == "") {
			error = 1;
			document.getElementById("priceErr").innerHTML = "* Insert Valid Price";
 		}

 		else{
 			var i ,invalid = 0;
			for( i =0; i<price.length ; i++) {
					if(price[i] >= 0 && price[i] <= 9) continue;

					else {
						invalid = 1;
						break;
					}
			}

 			
			var pricen = parseInt(price);	
			//alert(pricen);
			if (isNaN(pricen) || pricen <= 0 || invalid == 1) {
				error = 1;
				document.getElementById("priceErr").innerHTML = "* Insert Valid Price";
			}
			else{
				document.getElementById("priceErr").innerHTML = "";
			}
		}

		//mobile number validation
			var mob = document.getElementById("mobNum").value;
			if(mob == "") {
				error = 1;
				document.getElementById("mobNumErr").innerHTML = "* Cell number Required";
			}
			else{
				document.getElementById("mobNumErr").innerHTML = "";
			}

		if(error == 1) {
			form.onsubmit = function() {return false;}
		}
		else{
			form.onsubmit = function() {return true;}
		}
		

	}
</script>