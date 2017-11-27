<?php  
	require_once(APP_ROOT."/data/advertisement_data_access.php")
?>

<?php 	
	

	function findSubCategoryId($eCatagory) {
		
		return findSubCategoryIdFromDb($eCatagory);

	}

	//product table er jnno
	function addAdvertisement($advertisement) {
		return addAdvertisementToDb($advertisement);
	}

	//for the lst added product
	function findingTheLastAdvetisementId() {
		//echo "last product id";
		return findingTheLastAdvetisementIdFromeDb();
	}

	//userid retrun korbe
	function findingUserIdByEmail($email) {

		return findingUserIdByEmailFromDb($email);
	}
	//adproductdetails 
	function addProductDetails($advertisementDetails) {
		//echo "product details";
		return productDetailsToDb($advertisementDetails);
	}

	//finding job subcatagory
	function selectJobCatagory($eCatagory){
		return selectJobCatagoryFromDb($eCatagory);
	}
	//ad job into database
	 function adJob($job){
	 	return   adJobToDb($job);
	 }
	 //finding the jobid
	 function findingJobId(){
	 	return findingJobIdFromDb();
	 }

	 //add jobdetails
	 function addJobDetails($jobdetails) {
	 	return addJobDetailsToDb($jobdetails);
	 }

	 //find appartment subcatagory
	 function findappartmentcatagoryId($eCatagory) {
	 	return findappartmentcatagoryIdFromDb($eCatagory);
	 }

	 //add property table

	 function addProperty($property) {
	 	return addPropertyToDb($property);
	 }

	 //retrun max property id
	 function findingpropertyId() {
	 	return findingpropertyIdFromDb();
	 }

	 //add product details
	 function addPropertyDetails($propertyDetails) {
	 	return addPropertyDetailsToDb($propertyDetails);
	 }

	 //function to get all advertisementlists
	 function getAllAdevertisementById($id){
	 	return getAllAdevertisementByIdFromDb($id);
	 }

	 //get all job list
	 function getAllJobList($id) {
	 	return getAllJobListFromDb($id);
	 }

	 //removeing advertisement
	 function removeAdvertisement($adId) {
	 	return removeAdvertisementFromDb($adId);
	 }

	 //for deleting job
	 function removeJob($jobId){
	 	return removeJobFromDb($jobId);
	 }

	 //retrun job by id
	 function getJobById($jobId) {
	 	return getJobByIdFromDb($jobId);
	 }

	 //return the advertisement using a ceratian ad id 
	 function getAdvertisementByAdId($adId) {
	 	return getAdvertisementByAdIdFromDb($adId);
	 }

	 //update property advertisement 
	 function updateAdvertisement($advertisementDetails){
	 	return updateAdvertisementDb($advertisementDetails);
	 }

	 //admin er jnno sob advertisement show korbo
	function getAllAdvertisementForAdmin(){
		return getAllAdvertisementForAdminFromDb();
	}
	//get all advetisement by catagory
	function getAllAdvertisementByAtegory($cat){
		return getAllAdvertisementByAtegoryFrom($cat);
	}
	//get all job lists for admin
	function getAllJobListForAdmin() {
		return getAllJobListForAdminFromDb();
	}

	//for response company type search er jnno
	function getJobListByCompnyType($companyType){
		return getJobListByCompnyTypeFromDb($companyType);
	}
	//for time diye searc korar jnno
	function getJobListBytimeType($time){
		return getJobListBytimeTypeFromDb($time);
	}

	//account service
	function getJobListByCompnyTypeForUser($companyType,$user_Id){
		return getJobListByCompnyTypeForUserFromDb($companyType,$user_Id);
	}

	//user er jnno time type diye search korte hbe
	function getJobListBytTimeTypeForUser($jobtimeType,$user_Id){
		return getJobListBytTimeTypeForUserFromDb($jobtimeType,$user_Id);
	}

	//get all advertisement by category
	function getAllAdvertisementByCategory($cate){
		return getAllAdvertisementByCategoryByCategory($cate);
	}
	//get all advertisements for user id
	function getJobadvTypeForUser($cate,$user_Id){
		return getJobadvTypeForUserFromDb($cate,$user_Id);
	}
	//update job details
	function updateJobDetails($jobdetails){
		return updateJobDetailsToDb($jobdetails);
	}
?>