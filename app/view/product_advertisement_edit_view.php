<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
	}
?>
<?php 
	$title = $advertisement['title'];
	$price = $advertisement['price'];
	$loc = $advertisement['location'];
	$photo = $advertisement['photo'];
	$phone = $advertisement['phone'];
	$nego = $advertisement['negotiable'];
	$ecategory = $advertisement['adv_subcatagory'];
	$neg = "";
	if($nego ==1 ) {
		$neg = " (negotaible)";
			}
	$details =$advertisement['details'];
	

	 $data = explode(",", $details);
	//echo $data[0];
	//description

	 $description = explode(":", $data[0]);
	 $des = test_data($description[1]);

	

	  //condition
	$conditions = explode(":", $data[1]);
	$condition = test_data($conditions[1]);

	

	$models = explode(":", $data[2]);
	$model =  test_data($models[1]);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>

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
		//photo validation
		if(empty($_FILES['image'])) {
			$photoError = "* Product image Required";
		}

		else{
			$target_dir = "IMG/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);

			$photo = $_FILES["image"]["name"];
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["image"]["tmp_name"]);
			    if($check !== false) {
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
		}

		else if($price <= 0){
			$priceError = "* Enter a valid price";
			$error = 1;
		}

		if(isset($_POST['nego'])) {
			$negotiable = 1;
		}

		$phone = test_data($_POST['phone']);
		if(empty($phone)) {
			$cellErr = "* Cell Phone Number Filed Must be Required";
			$error = 1;
		}

		else if(strlen($phone) < 11 || strlen($phone) > 15){
			$cellErr = "* Enter a valid phone number";
			$error = 1;
		}

		if($error == 0) {
			//echo "ami ElectronicsDetails ".$eCatagory;
			$data = findSubCategoryId($eCatagory);

			$sctid = test_data($data[0]);
			$ctid = test_data($data[1]);

			//koira advertise hom e phtai dmu
			//adding into advertisemet table
			$advertisemet  = array('Cid' => $ctid, 'SCid' => $sctid);
			if(addAdvertisement($advertisemet)) {
				echo "advertisement table added";
			}

			//product details add korum eiar 

			$data = findingTheLastAdvetisementId();
			$adv_id = test_data($data[0]);

			//session age check kora lagbe user id niye aslm
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);

				$data = findingUserIdByEmail($email);
				$user_Id = test_data($data[0]);
			}

			if($error == 0) {
				$adv_id = $advertisement['adv_Id'];
				if(isset($_SESSION['login'])) {
					$email = trim($_SESSION['login']);
					$data = findingUserIdByEmail($email);
					$user_Id = test_data($data[0]);
				}
				$details = "Description: ".$description.",Condition: ".$pCondition.",Model: ".$pModel;
			
				$advertisementDetails = array('user_Id' => $user_Id,'adv_Id' =>$adv_id,'pic' => $photo, 'adv_title'  => $pTitle,'price' => $price ,'location' => $location,'detals' => $details, 'phone'=>$phone , 'negotiable' => $negotiable,'advType' => 'product' , 'subcatagory' => $eCatagory);

				if(updateAdvertisement($advertisementDetails)) {
					//updated
				}
				move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
			}
		}
	}

	
?>

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
									<option value = "MobilePhones" <?php if($ecategory == 'MobilePhones') echo "SELECTED" ?>>Mobile Phones </option>
									<option value = "ComputersAndTablets" <?php if($ecategory == 'ComputersAndTablets') echo "SELECTED" ?>>Computers & Tablets</option>

									<option value = "CamerasAndCamrecorders" <?php if($ecategory == 'CamerasAndCamrecorders') echo "SELECTED" ?>>Cameras & Recorders</option>

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
									<option value = "Dhaka" <?php if($loc == 'Dhaka') echo "SELECTED" ?>> Dhaka</option>
									<option value = "Chittagong" <?php if($loc == 'Chittagong') echo "SELECTED" ?>>Chittagong</option>
									<option value = "Sylhet"<?php if($loc == 'Sylhet') echo "SELECTED" ?>>Sylhet</option>
									<option value = "Narayangonj"<?php if($loc == 'Narayangonj') echo "SELECTED" ?>>Narayangonj</option>
									<option value = "Mirpur"<?php if($loc == 'Mirpur') echo "SELECTED" ?>>Mirpur</option>
									<option value = "Ghulsan" <?php if($loc == 'Ghulsan') echo "SELECTED" ?>>Ghulsan </option>
									<option value = "Mothijhil" <?php if($loc == 'Mothijhil') echo "SELECTED" ?>>Mothijhil</option>
									<option value = "Dhanmondi" <?php if($loc == 'Dhanmondi') echo "SELECTED" ?>>Dhanmondi </option>
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
								<input id = "pTitle" size= "40" type="text" name="productTitle" value="<?php echo $title; ?>"><br>
								<font id = "pTitleErr" color="red"><?php echo $pTitleError; ?></font>
							</td>
						</tr>

						<tr>
							<td> 
				
								<label>Description</label><br>
								<textarea id ="pDescription" name="description" rows ="7" cols="60"> <?php echo $des;?> </textarea><br>

								
							</td>
						</tr>

						<tr>
							<td>
							<label>Product Condition</label><br>
								<select name="pCondition">
									<
									<option value="new" <?php if($condition == 'new') echo "SELECTED" ?>>New</option>
									<option value="old" <?php if($condition == 'old') echo "SELECTED" ?>>Old</option>
								</select>
								
							</td>
						</tr>
								
						<tr>
							<td>
								<label>Model</label><br>
								<input id = "pModel" type="text" name="model" value="<?php echo $model; ?>"><br>
								<font id = "pModelErr" color = "red"> <?php echo $pModelError; ?></font>
								
							</td>
						</tr>	

						<tr>
							<td>
								<label>Price(TK)</label><br>
								<input id = "pPrice" type="text" name="price" value="<?php echo $advertisement['price']; ?>">
								<input type="checkbox" name="nego" value="nego" <?php if($nego == "1") echo "checked = 'checked'" ?>> negotiable<br>
								<font id  ="priceErr" color = "red"><?php echo $priceError; ?></font>
								
							</td>
						</tr>	
								
						<tr>
							<td>
								
								<h3>Contact no</h3>
									<hr>
									<label>Phone Number</label><br>
									<input id = "mobNum" type="text" name="phone" value="<?php echo $phone; ?>"><br>
									<font id = "mobNumErr" color = "red"><?php echo $cellErr; ?></font>
									<br>
								
							</td>
						</tr>	
						<tr>
							<td align= "center">
								<input class = "button" type="submit" name="submit" value="Update ad"  onclick = "formsubmit()">
								
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