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

	//advertisement er database thke sob ja pise

		$error = $negotiable = 0;
		$HSKCatagory = $photo =$photoError=$fTitle =$fTitleError = 
		$fSize = $fSizeErr = $Address = $AddresError = $pModelError = $price = $priceError = $pCondition = $beds = $baths = $photo = $description = $featuresERR = $phone = $phoneError = $location = $locationError = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//echo $_POST['Ecatagory'] . "lol";	

			//Location
			$location = test_data($_POST['Location']);

			//photo validation
			if(empty($_FILES['image'])) {
				$photoError = "* Product image Required";
				$error = 1;
				//echo "photo: ".$error."<br>";
				//echo $error." im <br>";
			}
			else{
				$target_dir = "IMG/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				$photo = $_FILES["image"]["name"];
				$uploadOk = 1;
				//echo $_FILES["image"]["tmp_name"];
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["image"]["tmp_name"]);
				    if($check !== false) {
				       // echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;

				    } 
				    else {
				        //echo "File is not an image.";
				        $error = 1;
				        $uploadOk = 0;
				    }
				}
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
				//echo "Size: ".$error."<br>";
			}

			else if((int)$fSize <= 0) {
				$error = 1;
				$fSizeErr = "* Appertment Size must be valid"; 
				//echo "Size v: ".$error."<br>";
			}


			//title varification

			$fTitle = $_POST['propertyTitle'];

			if(empty($fTitle)) {
				$fTitleError = "* Advertice Ttile Required";
				$error = 1;
				//echo "title: ".$error."<br>";
			}

			$Address = $_POST['Address'];
			if(empty($Address)) {
				$AddresError = "* Address Required";
				$error = 1;
				//echo "Address: ".$error."<br>";
			}
			$description = $_POST['Address'];
			//product features
			$features = $_POST['features'];

			//features validation
			/*
			if(!isset($_POST["Full-Furnished"])  &&  !isset($_POST["Semi-Furnished"])   &&  !isset($_POST["Not-Furnished"])  ){
				$error = 1;
				$featuresERR = "* Features must be required";
			}
	 		else{
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
		 	*/



			//description
			$description = $_POST['description'];
			//price filed verification
			$price = $_POST['price'];

			if(empty($price)) {
				$priceError = "* Price Filed Must be Required";
				$error = 1;
				//echo "price: ".$error."<br>";

			}
			else if((int)$price <= 0){
				$priceError = "* Enter a valid price";
				$error = 1;
				//echo "price v: ".$error."<br>";
			}

			if(isset($_POST['negotiable'])) {
				$negotiable = 1;
			}

			$phone = test_data($_POST['phone']);
			if(empty($phone)) {
				$phoneError = "* Cell Phone Number Filed Must be Required";
				$error = 1;
				//echo $error." ph <br>";

			}
			else if(strlen($phone) < 11 || strlen($phone) > 15){
				$phoneError = "* Enter a valid phone number";
				$error = 1;
				//echo $error." phv <br>";
			}


			//dtabase insert koro
		if($error == 0) {
				//echo "inside";
			//finding subcategoryid
			$eCatagory = "ApartmentsAndFlats";
			$data = findSubCategoryId($eCatagory);
			$ctid = test_data($data[0]);

			echo $ctid;

			//adding property table
			$advertisemet  = array('Cid' => $ctid, 'SCid' => '0');
			if(addAdvertisement($advertisemet)) {
				echo "advertisement table added";
			}


			//finding max id from table
			$data = findingTheLastAdvetisementId();
			$adv_id = test_data($data[0]);
			//geetting the userid by email
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				//echo $email;

				$data = findingUserIdByEmail($email);
				$user_Id = test_data($data[0]);
				//echo "user id: ".$user_Id."<br>";

			}
			$details = "Beds: ".$beds.",Baths: ".$baths.",Property Size: ".$fSize.",Address: ".$Address.",Description: ".$description.",Features: ".$features;
			//property details adding'
			$advertisementDetails = array('user_Id' => $user_Id,'adv_Id' =>$adv_id,'pic' => $photo, 'adv_title'  => $fTitle,'price' => $price ,'location' => $location,'detals' => $details, 'phone'=>$phone , 'negotiable' => $negotiable,'advType' => 'property' ,'subcatagory' => $eCatagory);
				if(addProductDetails($advertisementDetails)) {
					echo "advertisement details uploaded";
				}
				echo "photo array: ".$advertisementDetails['pic'];
				move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
		}
	}	


?>
	<?php 
	 if($_SESSION["uType"] == "Admin"){
	 	include("adminLoggedHead.php"); 
	 }
	 else{
	 	include("loggedHead.php");
	 }
	?>
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>

		<table align = "center">
			<tr>
				<td>
					<fieldset>
					<legend><h2>Offer a Property for Rent</h2></legend>
					<form  method="post" enctype="multipart/form-data">
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
								<h3>2. Select Location</h3>
									<select name = "Location">
									<option value = "Dhaka">Dhaka</option>
									<option value = "Chittagong">Chittagong</option>
									<option value = "Sylhet">Sylhet</option>
									<option value = "Narayangonj">Narayangonj</option>
									<option value = "Mirpur">Mirpur</option>
									<option value = "Ghulsan" >Ghulsan </option>
									<option value = "Mothijhil" >Mothijhil</option>
									<option value = "Dhanmondi" >Dhanmondi </option>
								</select>
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
									 <input id = "uploadBox" type="file" name="image" accept="image/*"><br>
									 <font id = "picErr" color="red"><?php echo $photoError; ?></font>
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
								<label> Title </label><br>
								<input id = "pTitle" size= "50" type="text" name="propertyTitle" placeholder = "Given a suitable Title"><br>
									<font id = "pTitleErr" color = "red"><?php echo $fTitleError;  ?></font>
								</td>
							<tr>

							<tr>
								<td>
								<label> Property Size</label> <br>
								<input id ="aSize" type="text" size="50" name="size" placeholder="size(sqft)" value="<?php echo $fSize; ?>"> <br>
								<font id = "aSizeErr" color = "red"><?php echo $fSizeErr; ?></font>
								 
									
								</td>
							<tr>
							<tr>
								<td>
								<label> Address </label> <br>
								<input type="text" size="50" name="Address" placeholder="Address (optional)" >	
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

								<select name = "features">
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
									<font id = "priceErr" color = "red"><?php echo $priceError; ?></font>
									
								</td>
									
							</tr>	
									
							<tr>
								<td>
								
								<h3>Contact no</h3>
									<hr>
									<label>Phone Number</label><br>
									<input id = "mobNum" type="text" name="phone"><br>
									<font id = "mobNumErr" color = "red"><?php echo $phoneError; ?></font>
									<br>
								
							</td>
							</tr>	
							<tr>
								<td align= "center">
									<input class = "button" type="submit" name="submit" value="Post ad" onclick="submitform()">
									
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