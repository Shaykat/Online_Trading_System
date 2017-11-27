<html>
<head>
	<title></title>
</head>
<body>

	<?php 

		$error = $negotiable = 0;
		$HSKCatagory = $photo =$photoError=$fTitle =$fTitleError = 
		$fSize = $fSizeErr = $Gender = $pModelError = $price = $priceError = $pCondition = $beds = $baths = $photo = $description = $featuresERR = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//echo $_POST['Ecatagory'] . "lol";	

			//photo validation
			$photo = $_POST['pic'];
			if(empty($_POST['pic'])) {
				$photoError = "* Product image Required";
				$error = 1;
			}

			//beds
			$beds = $_POST['beds'];
			//echo "$beds";

			//baths
			$baths = $_POST['baths'];
			//echo "$baths";

			//size verifcation
			$fSize = $_POST['size'];

			if(empty($fSize)) {
				$error = 1;
				$fSizeErr = "* Appertment Size Required"; 
			}

			else if((int)$fSize <= 0) {
				$error = 1;
				$fSizeErr = "* Appertment Size must be valid"; 
			}


			//title varification

			$fTitle = $_POST['Title'];

			if(empty($fTitle)) {
				$fTitleError = "* Advertice Ttile Required";
				$error = 1;
			}

			/*
			//product condition
			$pCondition = $_POST['Condition']; */

			//features validation
			if(!isset($_POST["Full-Furnished"])  &&  !isset($_POST["Semi-Furnished"])   &&  !isset($_POST["Not-Furnished"])  )
 			{
 				$error = 1;
 					$featuresERR = "* Features must be required";
 			}
	 		else
	 		{
	 		if(isset($_POST["Full-Furnished"]))
			{
				echo "Full-Furnished<br>";
			}

			if(isset($_POST["Semi-Furnished"]))
			{
				echo "Semi-Furnished checked<br>";
			}
			if(isset($_POST["Not-Furnished"]))
			{
				echo "Not- Furnished checked";
			}

 	}



			//description
			$description = $_POST['description'];
			//price filed verification
			$price = $_POST['price'];

			if(empty($price)) {
				$priceError = "* Price Filed Must be Required";
				$error = 1;

			}
			else if((int)$price <= 0){
				$priceError = "* Enter a valid price";
				$error = 1;
			}

			if(isset($_POST['negotiable'])) {
				$negotiable = 1;
			}


			//dtabase insert koro
			if($error == 0) {
				
				echo '
					<script type="text/javascript">
							window.alert("Post is added into database");
					</script>
				';
			}
		}


	?>
		<table align = "center">
			<tr>
				<td>
					<fieldset>
					<legend><h2>Offer a Property for Rent</h2></legend>
					<form  method="post">
						<table  cellspacing="15">
							<tr>
								<td Width = "800">
									<h3>1. Apartments & Flats<h3>
									<!--Subcategory of Electronics-->
									
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
									<label>Beds</label><br>
									<select name = "beds">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>	
									</select>
								</td>
							</tr>

								<tr>
								<td> 
									<label>Baths</label><br>
									<select name = "baths">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>	
									</select>
								</td>
							</tr>

							<tr>
								<td>
								<input id ="aSize" type="text" size="50" name="size" placeholder="size(sqft)" value="<?php echo $fSize; ?>">
								<p id = "aSizeErr"></p>
								 
									
								</td>
							<tr>
							<tr>
								<td>
								<input type="text" size="50" name="Address" placeholder="Address (optional)" >	
								</td>
							<tr>
							<tr>
								<td>
								<input id = "pTitle" size= "50" type="text" name="productTitle" placeholder = "Given a suitable Title"><br>
									<p id = "pTitleErr"></p>
								</td>
							<tr>


							<tr>
								<td> 
					
									<label>Description</label><br>
									<textarea name="description" rows ="7" cols = "40"></textarea>
									
								</td>
							</tr>
							<tr>
							<td>
							<label>Features (optional)</label><br>

								<select name = "beds">
									<option value="Full-Furnished">Full-Furnished</option>
									<option value="semi-Furnished">semi-Furnished</option>
									<option value="not-Furnished">not-Furnished</option>
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
									<input type="submit" name="submit" value="Post ad" onclick="submitform()">
									
								</td>
							</tr>	
						</table>
					</form>
					</fieldset>
				</td>
				
			</tr>
			
		</table>
		
</body>
</html>

<script type="text/javascript">
	function submitform() {
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

		//appaerment size validation

		var aSize = document.getElementById("aSize").value;

		if(aSize == "") {
			error = 1;
			document.getElementById("aSizeErr").innerHTML = "* Insert the Size of the Appartment";
		}

		else{
			document.getElementById("aSizeErr").innerHTML = "";
		}

		//Title validation
		var title = document.getElementById("pTitle").value;

		if(title == "") {
			error = 1;
			document.getElementById("pTitleErr").innerHTML = "* Appartment Title Required";
		}
		else{
			document.getElementById("pTitleErr").innerHTML = "";

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