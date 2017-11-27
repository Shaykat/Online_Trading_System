
<?php 
	session_start();
?>

<?php include_once(APP_ROOT."/core/advertisement_service.php"); ?>
<?php

	$error = $negotiable = 0;
	$eCatagory = $photo =$photoError=$pTitle =$pTitleError = 
	$pModel = $pModelError = $price = $priceError = $pCondition =
	$description = $location ="";

	//var_dump($_FILES['pic']);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo $_POST['Ecatagory'] . "lol";

		//savaing the subcategory
		echo "lol";
		$eCatagory =$_POST['Ecatagory'];

		//location
		$location = test_data($_POST['Location']);
		echo "$location";

		//photo validation
		if(empty($_FILES['pic'])) {
			$photoError = "* Product image Required";
			//$error = 1;
			//echo $error." im <br>";
			echo "empty".$error;
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
		echo "error phpto " . $error;

		//title varification

		$pTitle = test_data($_POST['productTitle']);

		if(empty($pTitle)) {
			$pTitleError = "* Product Ttile Required";
			$error = 1;
			echo $error." ti <br>";
		}
		echo "error title " . $error;
		//product condition
		$pCondition = test_data($_POST['pCondition']);

		// model verification
		$pModel = test_data($_POST['model']);

		if(empty($pModel)) {
			$pModelError = "* Model Filed Reqired";
			$error = 1;
			echo $error." mdl <br>";
		}

		echo "error model " . $error;
		//description
		$description = test_data($_POST['description']);
		//price filed verification
		$price = test_data($_POST['price']);

		if(empty($price)) {
			$priceError = "* Price Filed Must be Required";
			$error = 1;
			echo $error." pr <br>";

		}
		else if($price <= 0){
			$priceError = "* Enter a valid price";
			$error = 1;
			echo $error." prv <br>";
		}

		if(isset($_POST['nego'])) {
			$negotiable = 1;
		}
		$phone = test_data($_POST['phone']);
		if(empty($phone)) {
			$priceError = "* Cell Phone Number Filed Must be Required";
			$error = 1;
			echo $error." ph <br>";

		}
		else if(strlen($phone) < 11 || strlen($phone) > 15){
			$priceError = "* Enter a valid phone number";
			$error = 1;
			echo $error." phv <br>";
		}
		echo "error price " . $error;

		//dtabase insert koro
		//echo "$error <br>";
		if($error == 0) {
			echo "ami ElectronicsDetails ".$eCatagory;
			$data = findSubCategoryId($eCatagory);

			$sctid = test_data($data[0]);
			$ctid = test_data($data[1]);

			echo "AHH"." ".$sctid." ".$ctid;

			/*echo "inside";
			$con = mysqli_connect("localhost", "root", "", "E-Shop");
			$query = "SELECT sub_category_Id,category_Id FROM sub_category Where sub_category_Name = '$eCatagory'";
			$result = mysqli_query($con, $query);
			echo $eCatagory;
			if (!$result) {
			    printf("Error: %s\n", mysqli_error($con));
			    exit();
			}
			$data = mysqli_fetch_array($result);
			$sctid = test_data($data[0]);
			$ctid = test_data($data[1]);

			echo "Hello Sctid ".$sctid." ".$ctid;
			// product
			$query = "INSERT INTO product(category_Id, sub_category_Id, location) VALUES ('$ctid', '$sctid', '$location')";
			mysqli_query($con, $query);

			//product details.....................

			$query = "SELECT MAX(product_Id) FROM product"; /// product_Id query
			$result = mysqli_query($con, $query);

			if (!$result) {
			    printf("Error: %s\n", mysqli_error($con));
			    exit();
			}
			$data = mysqli_fetch_array($result);
			$product_id = test_data($data[0]);
			echo "product id: ".$product_id."<br>";
			// user_Id query
			$email = $_SESSION['login'];
			$query = "SELECT user_Id FROM register WHERE Email = '$email'";
			$result = mysqli_query($con, $query);

			if (!$result) {
			    printf("Error: %s\n", mysqli_error($con));
			    exit();
			}
			$data = mysqli_fetch_array($result);
			$user_Id = test_data($data[0]);
			echo "user id: ".$user_Id."<br>";

			echo "photo: ".$photo."<br>";
	        $query = "INSERT INTO `productdetails`(`user_Id`,`product_Id`, `photo`, `product_title`, `description`, `condition`, `model`, `gender`, `price`, `negotiable`, `phone`) VALUES($user_Id, $product_id, '$photo', '$pTitle', '$description', '$pCondition','$pModel', '', '$price','$negotiable', '$phone')";
	        mysqli_query($con, $query);
	        //echo $_FILES['image']['tmp_name'];
	        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
	        if (!$result) {
			    printf("Error: %s\n", mysqli_error($con));
			    exit();
			}
			else{
				echo "hello";
			}
			//sghhhhhhhhhhhhhhhhhhhhhhh
			*/
		}
	}

	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>