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

	$error = $negotiable = 0;
	$eCatagory = $photo =$photoError=$pTitle =$pTitleError = 
	$pModel = $pModelError = $cellErr = $price = $priceError = $pCondition = 
	$description = $location ="";

	//var_dump($_FILES['pic']);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	;
		$eCatagory =$_POST['Ecatagory'];

		//location
		$location = test_data($_POST['Location']);
		//echo "$location";

		//photo validation
		if(empty($_FILES['image'])) {
			$photoError = "* Product image Required";
			//$error = 1;
			//echo $error." im <br>";
			//echo "empty".$error;
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
			        //echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;

			    } 
			    else {
			        
			        $error = 1;
			        $uploadOk = 0;
			    }
			}
		}
		

		//title varification

		$pTitle = test_data($_POST['productTitle']);

		if(empty($pTitle)) {
			$pTitleError = "* Product Ttile Required";
			$error = 1;
			
		}
		//echo "error title " . $error;
		//product condition
		$pCondition = test_data($_POST['pCondition']);

		// model verification
		$pModel = test_data($_POST['model']);

		if(empty($pModel)) {
			$pModelError = "* Model Filed Reqired";
			$error = 1;
		
		}

		
		//description
		$description = test_data($_POST['description']);
		//price filed verification
		$price = test_data($_POST['price']);

		if(empty($price)) {
			$priceError = "* Price Filed Must be Required";
			$error = 1;
			//echo $error." pr <br>";

		}
		else if($price <= 0){
			$priceError = "* Enter a valid price";
			$error = 1;
			//echo $error." prv <br>";
		}

		if(isset($_POST['nego'])) {
			$negotiable = 1;
		}
		//echo "Negotiable ".$negotiable;
		$phone = test_data($_POST['phone']);
		if(empty($phone)) {
			$cellErr = "* Cell Phone Number Filed Must be Required";
			$error = 1;
			//echo $error." ph <br>";

		}
		else if(strlen($phone) < 11 || strlen($phone) > 15){
			$cellErr = "* Enter a valid phone number";
			$error = 1;
			//echo $error." phv <br>";
		}
		//echo "error price " . $error;

		//dtabase insert koro
		//echo "$error <br>";
		if($error == 0) {
			//echo "ami ElectronicsDetails ".$eCatagory;
			$data = findSubCategoryId($eCatagory);

			$sctid = test_data($data[0]);
			$ctid = test_data($data[1]);

			//echo "AHH"." ".$sctid." ".$ctid;
			//koira advertise hom e phtai dmu
			//adding into advertisemet table
			$advertisemet  = array('Cid' => $ctid, 'SCid' => $sctid);
			if(addAdvertisement($advertisemet)) {
				echo "advertisement table added";
			}

			//product details add korum eiar 

			$data = findingTheLastAdvetisementId();
			$adv_id = test_data($data[0]);

			//echo "$adv_id";

			//session age check kora lagbe user id niye aslm
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				//echo $email;

				$data = findingUserIdByEmail($email);
				$user_Id = test_data($data[0]);
				//echo "user id: ".$user_Id."<br>";

			}

			//product details k array te convert kore oita fill up korte hbe
			//echo "photo: ".$photo."<br>";
			//echo "target file last: ".$target_file."<br>";
			$details = "Description: ".$description.",Condition: ".$pCondition.",Model: ".$pModel;

			$type = "product";

			$advertisementDetails = array('user_Id' => $user_Id,'adv_Id' =>$adv_id,'pic' => $photo, 'adv_title'  => $pTitle,'price' => $price ,'location' => $location,'detals' => $details, 'phone'=>$phone , 'negotiable' => $negotiable,'advType' => 'product', 'subcatagory' => $eCatagory);
				if(addProductDetails($advertisementDetails)) {
					echo "advertisement details uploaded";
				}
				//echo "photo array: ".$advertisementDetails['pic'];
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
				<legend><h2 >Sell an Item</h2></legend>
				<form  method="post"  enctype="multipart/form-data">
				<!--action = "http://localhost/Project_prototype/app/view/ElectronicsDetails.php"-->
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
								 <font id = "picErr" color = "red"><?php echo $photoError; ?></font>
								 <hr>
							</td>
						</tr>

						<tr>
							<td> 
								<label>Product Title</label><br>
								<input id = "pTitle" size= "40" type="text" name="productTitle" placeholder = "Given a suitable Title"><br>
								<font id = "pTitleErr" color="red"><?php echo $pTitleError; ?></font>
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
								<font id = "pModelErr" color = "red"><?php echo $pModelError; ?></font>
								
							</td>
						</tr>	

						<tr>
							<td>
								<label>Price(TK)</label><br>
								<input id = "pPrice" type="text" name="price" >
								<input type="checkbox" name="nego" value="nego"> negotiable<br>
								<font id  ="priceErr" color = "red"><?php echo $priceError; ?></font>
								
							</td>
						</tr>	
								
						<tr>
							<td>
								
								<h3>Contact no</h3>
									<hr>
									<label>Phone Number</label><br>
									<input id = "mobNum" type="text" name="phone"><br>
									<font id = "mobNumErr" color = "red"><?php echo $cellErr; ?></font>
									<br>
								
							</td>
						</tr>	
						<tr>
							<td align= "center">
								<input class = "button" type="submit" name="submit" value="Post ad"  onclick = "formsubmit()">
								
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
		//alert("ok");
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