<?php 
	require_once(APP_ROOT."/lib/data_access_helper.php");
 ?>

 <?php

	
	 //subcategory er index gula find korbe
	 function findSubCategoryIdFromDb($eCatagory) {
	 	 $query = "SELECT sub_category_Id,category_Id FROM sub_category Where sub_category_Name = '$eCatagory' ";

	 	 $result = executeQuery($query);

	 	 $subcategory = null;

	 	 if($result) {
	 	 	$subcategory = mysqli_fetch_array($result);
	 	 }

	 	 return $subcategory;
	 }

	 function addAdvertisementToDb($advertisment) {
	 	$query = "INSERT INTO advertisement(category_Id, sub_category_Id) VALUES ('$advertisment[Cid]', '$advertisment[SCid]')";
	 	return  executeQuery($query);
	 }

	 //for the last added product
	 function findingTheLastAdvetisementIdFromeDb() {
	 	$query = "SELECT MAX(adv_Id) FROM advertisement"; /// product_Id query

	 	$result = executeQuery($query);
	 	$productId = null;

	 	if($result) {
	 		$productId = mysqli_fetch_array($result);
	 	}

	 	return $productId;
	 }

	 function findingUserIdByEmailFromDb($email) {
	 		$query = $query = "SELECT user_Id FROM register WHERE Email = '$email'";

	 	$result = executeQuery($query);
	 	$userid = null;

	 	if($result) {
	 		$userid = mysqli_fetch_array($result);
	 	}

	 	return $userid;
	 }
	 //productdetails dd korbe
	 function productDetailsToDb($advertisementDetails) {
			
	        $query = "INSERT INTO `advdetails`(`user_Id`,`adv_Id`, `photo`, `title`, `price`,`location`, `details`, `phone`, `negotiable`, `advType` ,`adv_subcatagory`) VALUES('$advertisementDetails[user_Id]', '$advertisementDetails[adv_Id]', '$advertisementDetails[pic]', '$advertisementDetails[adv_title]', '$advertisementDetails[price]', '$advertisementDetails[location]','$advertisementDetails[detals]', '$advertisementDetails[phone]','$advertisementDetails[negotiable]', '$advertisementDetails[advType]' ,'$advertisementDetails[subcatagory]')";

	        return  executeQuery($query);
	 }

	 //finding job subcategory

	 function selectJobCatagoryFromDb($eCatagory) {
	 	$query = "SELECT category_Id FROM category Where category_Name = '$eCatagory'";
	 	 $result = executeQuery($query);

	 	 $subcategory = null;

	 	 if($result) {
	 	 	$subcategory = mysqli_fetch_array($result);
	 	 }

	 	 return $subcategory;
	 }
	 //adjob function
	function adJobToDb($job){
		$query = "INSERT INTO job(category_Id, location) VALUES ('$job[cId]', '$job[Loc]')";
		return  executeQuery($query);

	}

	//finding the job id
	function findingJobIdFromDb(){
		$query = "SELECT MAX(job_Id) FROM job"; // job_id query
		$result = executeQuery($query);
	 	$jobid = null;

	 	if($result) {
	 		$jobid = mysqli_fetch_array($result);
	 	}

	 	return $jobid;

	}
	//add job details table
	function addJobDetailsToDb($jobdetails) {
		 $query = "INSERT INTO `jobdetails`(`user_Id`,`job_Id`, `job_type`, `job_title`,`applyVia` , `company_web`, `address`, `deadline`, `description`, `salary`, `salary_interval_unit`, `negotiable`, `phone` ,`job_category`) VALUES($jobdetails[uId], $jobdetails[jId], '$jobdetails[jType]','$jobdetails[jTitle]','$jobdetails[aVia]', '$jobdetails[cWeb]','$jobdetails[Add]','$jobdetails[Dead]', '$jobdetails[Des]', '$jobdetails[Sal]','$jobdetails[sUnit]','$jobdetails[Nego]', '$jobdetails[Phone]' ,'$jobdetails[job_category]')";
		 return  executeQuery($query);

	}

	function findappartmentcatagoryIdFromDb($eCatagory) {
		$query = $query = "SELECT category_Id FROM category Where category_Name = '$eCatagory'";
		$result = executeQuery($query);

	 	 $subcategory = null;

	 	 if($result) {
	 	 	$subcategory = mysqli_fetch_array($result);
	 	 }

	 	 return $subcategory;
	}

	function addPropertyToDb($property)  {
		$query = "INSERT INTO property(category_Id, location) VALUES ('$property[cId]', '$property[loc]')";

		return  executeQuery($query); 
	}

	//finding max property id
	function findingpropertyIdFromDb() {
		$query = "SELECT MAX(property_Id) FROM property";
		$result = executeQuery($query);
	 	$pid = null;

	 	if($result) {
	 		$pid = mysqli_fetch_array($result);
	 	}

	 	return $pid;
	}

	//add propertydetails table
	function addPropertyDetailsToDb($propertyDetails){ 
		$query = "INSERT INTO `propertydetails`(`user_Id`,`property_Id`, `photo`, `beds`,`baths` , `property_title`, `property_size`,`Address`, `description`, `features`, `price`, `negotiable`, `phone`) VALUES($propertyDetails[uId], $propertyDetails[pId], '$propertyDetails[photo]','$propertyDetails[bed]','$propertyDetails[bath]', '$propertyDetails[title]','$propertyDetails[size]','$propertyDetails[add]', '$propertyDetails[des]', '$propertyDetails[feature]','$propertyDetails[price]','$propertyDetails[nego]', '$propertyDetails[phone]')";
		return  executeQuery($query); 

	}

	//function to get all adevertisment list from database

	function getAllAdevertisementByIdFromDb($id) {
		
		$query = "SELECT user_Id,adv_Id , photo , title , price ,location , advType  FROM advdetails WHERE user_Id = '$id'";
		$result = executeQuery($query);

	 	 $mylist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $mylist[$i] = $row;
	 	 	}
	 	 }
	 	 return $mylist;
	}

	//admin er jnno sob advertisement show
	function getAllAdvertisementForAdminFromDb(){
		$query = "SELECT * FROM advdetails";
		$result = executeQuery($query);

	 	 $allAdvlist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $allAdvlist[$i] = $row;
	 	 	}
	 	 }
	 	 return $allAdvlist;

	}
	//get all advertisement by ctegory
	function getAllAdvertisementByAtegoryFrom($cat){
		$query = "SELECT * FROM advdetails  WHERE advType = '$cat'";
		$result = executeQuery($query);

	 	 $allAdvlist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $allAdvlist[$i] = $row;
	 	 	}
	 	 }
	 	 return $allAdvlist;
	}

	//function to get all joblists
	function getAllJobListForAdminFromDb(){
		$query = "SELECT * FROM jobdetails ";

		//echo "getAllAdevertisementByIdFromDb"."<br>";
		$result = executeQuery($query);
	 	 $joblist = array();
	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
			
	}

	//function to get all job list
	function getAllJobListFromDb($id) {
		$query = "SELECT * FROM jobdetails WHERE user_Id = '$id'";

		$result = executeQuery($query);
	 	 $joblist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
	}

	//removing adevertisement from db
	function removeAdvertisementFromDb($adId) {
		$query = "DELETE FROM advdetails WHERE adv_Id = '$adId'";
		return executeQuery($query);
	}

	//removeing job 
	function removeJobFromDb($jobId){
		$query = "DELETE FROM jobdetails WHERE job_id = '$jobId'";

		return executeQuery($query);
	}

	//get job b id
	function getJobByIdFromDb($jobId) {
		$query = "SELECT * FROM jobdetails Where job_id = '$jobId'";

		$result = executeQuery($query);

		$job = null; 

		if($result) {
			$job = mysqli_fetch_assoc($result);
		}

		return $job;
	}

	//get advertisement bu advertisement id
	function getAdvertisementByAdIdFromDb($adId) {
		$query = "SELECT * FROM advdetails WHERE adv_Id = '$adId'";

		$advertisement = null;

		$result = executeQuery($query);

		if($result) {
			$advertisement = mysqli_fetch_assoc($result);
		}

		return $advertisement;
	}

	//update property type advertisement 
	function updateAdvertisementDb($advertisementDetails){
	        $query = "UPDATE  `advdetails` SET `user_Id` = '$advertisementDetails[user_Id]', `photo` = '$advertisementDetails[pic]', `title` = '$advertisementDetails[adv_title]', `price` = '$advertisementDetails[price]',`location` = '$advertisementDetails[location]', `details` = '$advertisementDetails[detals]', `phone` = '$advertisementDetails[phone]', `negotiable` = '$advertisementDetails[negotiable]', `advType` = '$advertisementDetails[advType]', `adv_subcatagory` = '$advertisementDetails[subcatagory]' WHERE `adv_Id` = '$advertisementDetails[adv_Id]'";
	       
		return  executeQuery($query); 

	}
	//update job
	function updateJobDetailsToDb($jobdetails){
		$query ="UPDATE jobdetails SET user_Id = '$jobdetails[uId]' , job_type = '$jobdetails[jType]' , job_title = '$jobdetails[jTitle]', applyVia = '$jobdetails[aVia]', company_web = '$jobdetails[cWeb]', address = '$jobdetails[Add]' , deadline = '$jobdetails[Dead]' ,description = '$jobdetails[Des]', salary = '$jobdetails[Sal]', salary_interval_unit = '$jobdetails[sUnit]', negotiable = '$jobdetails[Nego]', phone = '$jobdetails[Phone]' , job_category = '$jobdetails[job_category]' WHERE job_Id = '$jobdetails[jId]'";
		//var_dump($query);
		
		return executeQuery($query);
	}
	//company type diye sob search kora
	function getJobListByCompnyTypeFromDb($companyType){
		$query = "SELECT * FROM jobdetails WHERE job_category = '$companyType'";

		//echo "getAllAdevertisementByIdFromDb"."<br>";
		$result = executeQuery($query);
	 	 $joblist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
	}

	//for geetinng the joblist using time

	 function  getJobListBytimeTypeFromDb($time) {
	 	$query = "SELECT * FROM jobdetails WHERE job_type = '$time'";

		//echo "getAllAdevertisementByIdFromDb"."<br>";
		$result = executeQuery($query);
	 	 $joblist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
	 }


	//function for getting user joblist according jobcategory

	 function getJobListByCompnyTypeForUserFromDb($companyType,$user_Id){
	 	$query = "SELECT * FROM jobdetails WHERE user_Id = '$user_Id' AND job_category = '$companyType'";
	 	//echo "getAllAdevertisementByIdFromDb"."<br>";
		$result = executeQuery($query);
	 	 $joblist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
	 }
	 //getting data for user by jobtimetype

	 function getJobListBytTimeTypeForUserFromDb($jobtimeType,$user_Id){
	 	$query = "SELECT * FROM jobdetails WHERE user_Id = '$user_Id' AND job_type = '$jobtimeType'";
	 	//echo "getAllAdevertisementByIdFromDb"."<br>";
		$result = executeQuery($query);

		//echo "size".mysqli_num_rows($result);

	 	 $joblist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $joblist[$i] = $row;
	 	 	}
	 	 }
	 	 return $joblist;
	 }

	 //getting advertisement by job
	 function getAllAdvertisementByCategoryByCategory($cate){
	 	
	 	$query = "SELECT * FROM advdetails WHERE adv_subcatagory = '$cate'";
		$result = executeQuery($query);

	 	 $allAdvlist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $allAdvlist[$i] = $row;
	 	 	}
	 	 }
	 	 return $allAdvlist;
	 }

	 //geeting all jobs by user id
	 function getJobadvTypeForUserFromDb($cate,$user_Id){
	 		 $query = "SELECT * FROM advdetails WHERE adv_subcatagory = '$cate' AND user_Id = '$user_Id'";
		$result = executeQuery($query);

	 	 $allAdvlist = array();

	 	 if($result) {
	 	 	for($i = 0 ; $row = mysqli_fetch_array($result) ; ++$i) {
	 	 		 $allAdvlist[$i] = $row;
	 	 	}
	 	 }
	 	 return $allAdvlist;

	 }
 ?>