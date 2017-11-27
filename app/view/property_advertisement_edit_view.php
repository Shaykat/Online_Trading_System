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
	//echo "ami edit kormu";
	$title = $advertisement['title'];
	$price = $advertisement['price'];
	$loc = $advertisement['location'];
	$photo = $advertisement['photo'];
	$phone = $advertisement['phone'];
	$nego = $advertisement['negotiable'];
	//echo "jdlfkslkglks"." ".$nego;
	$neg = "";
	if($nego == 1 ) {
		$neg = " (negotaible)";
			}
	$details =$advertisement['details'];
	//echo $details."<br>";

	$data = explode(",",$details);
	//beds
	$beds = explode(":", $data[0]);
	$bed = test_data($beds[1]);

	//baths
	$baths = explode(":", $data[1]);
	$bath = test_data($baths[1]);

	//property size
	$size = explode(":", $data[2]);
	$fsize = test_data($size[1]);
	//address
	$address = explode(":", $data[3]);
	$add = test_data($address[1]);

	//description
	$description = explode(":", $data[4]);
	$des = test_data($description[1]);

	//featurs
	$features = explode(":", $data[5]);
	$fea = test_data($features[1]);

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
				echo $_FILES["image"]["tmp_name"];
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["image"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;

				    } 
				    else {
				        echo "File is not an image.";
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
			}
			$description = $_POST['Address'];
			//product features
			$features = $_POST['features'];

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

			$phone = test_data($_POST['phone']);
			if(empty($phone)) {
				$phoneError = "* Cell Phone Number Filed Must be Required";
				$error = 1;
			}
			else if(strlen($phone) < 11 || strlen($phone) > 15){
				$phoneError = "* Enter a valid phone number";
				$error = 1;
			}


			//dtabase insert koro
			if($error == 0) {
				$adv_id = $advertisement['adv_Id'];
				if(isset($_SESSION['login'])) {
					$email = trim($_SESSION['login']);

					$data = findingUserIdByEmail($email);
					$user_Id = test_data($data[0]);

				}
				$subc="ApartmentsAndFlats";
				$details = "Beds: ".$beds.",Baths: ".$baths.",Property Size: ".$fSize.",Address: ".$Address.",Description: ".$description.",Features: ".$features;
			
				$advertisementDetails = array('user_Id' => $user_Id,'adv_Id' =>$adv_id,'pic' => $photo, 'adv_title'  => $fTitle,'price' => $price ,'location' => $location,'detals' => $details, 'phone'=>$phone , 'negotiable' => $negotiable,'advType' => 'property' , 'subcatagory' =>'ApartmentsAndFlats');

				if(updateAdvertisement($advertisementDetails)) {
						//echo "propertyadvertisement updated";
				}
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
					<legend><h2>Update your advertisement</h2></legend>
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
									 <input id = "uploadBox" type="file" name="image" accept="image/*"><br>
									 <p id = "picErr"></p>
									 <hr>
								</td>
							</tr>

							<tr>
								<td> 
									<label>Beds</label><br>
									<select name = "beds">
									<option value="1" <?php if($bed == "1") echo "SELECTED"; ?>>1</option>
									<option value="2" <?php if($bed == "2") echo "SELECTED"; ?>>2</option>
									<option value="3"  <?php if($bed == "3") echo "SELECTED"; ?>>3</option>
									<option value="4"  <?php if($bed == "4") echo "SELECTED"; ?>>4</option>
									<option value="5"  <?php if($bed == "5") echo "SELECTED"; ?>>5</option>	
									</select>
								</td>
							</tr>

								<tr>
								<td> 
									<label>Baths</label><br>
									<select name = "baths">
									<option value="1"  <?php if($bath == "1") echo "SELECTED"; ?>>1</option>
									<option value="2"  <?php if($bath == "2") echo "SELECTED"; ?>>2</option>
									<option value="3"  <?php if($bath == "3") echo "SELECTED"; ?>>3</option>
									<option value="4"  <?php if($bath == "4") echo "SELECTED"; ?>>4</option>
									<option value="5"  <?php if($bath == "5") echo "SELECTED"; ?>>5</option>	
									</select>
								</td>
							</tr>

							<tr>
								<td>
								<label> Title </label> <br>
								<input id = "pTitle" size= "50" type="text" name="propertyTitle" placeholder = "Given a suitable Title" value="<?php echo $title; ?>"><br>
									<p id = "pTitleErr"></p>
								</td>
							<tr>

							<tr>
								<td>
								<label> Property Size </label> <br>
								<input id ="aSize" type="text" size="50" name="size" placeholder="size(sqft)" value="<?php echo $fsize; ?>">
								<p id = "aSizeErr"></p>
								 
									
								</td>
							<tr>
							<tr>
								<td>
								<label> Address </label> <br>
								<input type="text" size="50" name="Address" placeholder="Address " value="<?php echo $add; ?>">	
								</td>
							<tr>

							<tr>
								<td> 
					
									<label>Description</label><br>
									<textarea name="description" rows ="7" cols = "40"><?php echo $des;?></textarea>
									
								</td>
							</tr>
							<tr>
							<td>
							<label>Features (optional)</label><br>

								<select name = "features">
									<option value="Full-Furnished"  <?php if($fea == "Full-Furnished") echo "SELECTED"; ?>>Full-Furnished</option>
									<option value="semi-Furnished"  <?php if($fea == "semi-Furnished") echo "SELECTED"; ?>>semi-Furnished</option>
									<option value="not-Furnished"  <?php if($fea == "not-Furnished") echo "SELECTED"; ?>>not-Furnished</option>
							</td>
							</tr>

							<tr>
								<td>
									<label>Price(TK)</label><br>
									<input id = "pPrice" type="text" name="price" value="<?php echo $advertisement['price']; ?>">
									<input type="checkbox" name="negotiable" value="negotiable" <?php if($nego == "1") echo "checked = 'checked'" ?>> negotiable<br>
									<p id  ="priceErr"></p>
									
								</td>
									
							</tr>	
									
							<tr>
								<td>
								
								<h3>Contact no</h3>
									<hr>
									<label>Phone Number</label><br>
									<input id = "mobNum" type="text" name="phone"  value="<?php echo $advertisement['phone']; ?>"><br>
									<font id = "mobNumErr" color = "red"><?php echo $phoneError; ?></font>
									<br>
								
							</td>
							</tr>		
							<tr>
								<td align= "center">
									<input class = "button" type="submit" name="submit" value="update ad" onclick="submitform()">
									
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