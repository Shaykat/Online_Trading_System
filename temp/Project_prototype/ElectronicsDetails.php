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
		if(empty($_POST['pic'])) {
			$photoError = "* Product image Required";
			$error = 1;
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

		if(test_data($_POST['negotiable'] !== null)) {
			$negotiable = 1;
		}

		//dtabase insert koro
		if($error == 0) {
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

			//echo $sctid." ".$ctid;
			$query = "INSERT INTO product(category_Id, sub_category_Id, location) VALUES ('$sctid', '$ctid', '$location')";
			mysqli_query($con, $query);
		}
	}

	function test_data($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>