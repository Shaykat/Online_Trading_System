<?php 
	session_start();
?>
<?php  
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
	}
?>


<?php include_once(APP_ROOT."/core/advertisement_service.php"); ?>

<?php 
switch ($view) {
	case 'electronicsAdd':
		include_once(APP_ROOT."/app/view/ElectronicsForm .php");
		break;

	case 'jobvacacncyAdd' :
		include_once(APP_ROOT."/app/view/JobvacancyForm.php");
		break;

	case 'appartmentsFlatsAdd' :
		include_once(APP_ROOT."/app/view/AppartmentsandFlatsForm.php");
		break;

	case 'showAllAdvertisementswithlogin':
	
			# code...
			$advertisementList = getAllAdvertisementForAdmin();
				if(count($advertisementList)){
					include_once(APP_ROOT."/app/view/show_alladvertisements_withlogin_view.php");
				}
			break;	

	case 'showAllAdvertisementswithoutlogin':
		$advertisementList = getAllAdvertisementForAdmin();
		if(count($advertisementList)){
			include_once(APP_ROOT."/app/view/show_alladvertisements_withoutlogin_view.php");
		}
		# code...
	break;
	case 'showjobLiswithlogin' :
		$jobList = getAllJobListForAdmin();
		//echo "size".count($jobList);
		if(count($jobList) > 0) {
			include_once(APP_ROOT."/app/view/joblist_show_withlogin_view.php");
		}
		else{
			echo "sorry admin kono job list nai";
		}
		break;
	case 'showjobLiswithoutlogin':
		$jobList = getAllJobListForAdmin();
				//echo "size".count($jobList);
				if(count($jobList) > 0) {
					include_once(APP_ROOT."/app/view/joblist_show_withoutlogin_view.php");
				}
				else{
					echo "sorry admin kono job list nai";
				}

		# code...
		break;
	case 'showAllAdvertisements':

			if(isset($_SESSION['login'])) {

				//echo $_SESSION['login'];
				$advertisementList = getAllAdvertisementForAdmin();

				if(count($advertisementList) > 0){
					include_once(APP_ROOT."/app/view/advertisement_show_view.php");
				}
			}

		break;
	//with login obosthai dhkabe
	case 'showProductCategorywithlogin':
		$cat = $_GET['category'];
		//
		//echo $cat;
		$advertisementList = getAllAdvertisementByAtegory($cat);

		if(count($advertisementList)){
			include_once(APP_ROOT."/app/view/show_alladvertisements_withlogin_view.php");
		}
		break;
	break;
		//show product category for all globel user
	case 'showProductCategorywithoutlogin':
		# code...
	//var_dump($GLOBALS);
		$cat = $_GET['category'];
		//
		//echo $cat;
		$advertisementList = getAllAdvertisementByAtegory($cat);

		if(count($advertisementList)){
			include_once(APP_ROOT."/app/view/show_alladvertisements_withoutlogin_view.php");
		}
		break;

	case 'addEdit' :
		//echo "advertisement add kora lagbo";

		if($_GET['id']) {
			$id = $_GET['id'];
		}

		if($_GET['type']) {
			$type = $_GET['type'];
		}
		
		$advertisement = getAdvertisementByAdId($id);
		 if($type == "property") {
			include_once(APP_ROOT."/app/view/property_advertisement_edit_view.php");
		 }
		else{
			include_once(APP_ROOT."/app/view/product_advertisement_edit_view.php");
			//include_once(APP_ROOT."/app/view/property_advertisement_edit_view.php");
		}

		break;


	case 'showAdvertisements' :
		//session age check kora lagbe user id niye aslm
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);

				$data = findingUserIdByEmail($email);
				$user_Id = trim($data[0]);
				$user_Id = htmlspecialchars($data[0]);
				//echo "user id: ".$user_Id."<br>";
				}

				//get all advertisement by id

				$advertisementList = getAllAdevertisementById($user_Id);

				 if(count($advertisementList) > 0) {

				 	if($_SESSION['uType'] == "Admin") {
				 		include_once(APP_ROOT."/app/view/Admin_advertisement_show_view.php");
				 	}
				 	else{
				 		include_once(APP_ROOT."/app/view/advertisement_show_view.php");
				 	}
				 	
				 }
				 else{
				 	//kono post na thkle advertise ment e phataiya dmu oitr buuton er clck ta check kora lagbo
				 	include_once(APP_ROOT."/app/view/Myaccount_zero_list.php");
				}
			
			break;

		case 'adDelete' : 
				//var_dump($GLOBALS);
				//error occured
			if(isset($_GET['advId'])){
				$adId = $_GET['advId'];

				if(removeAdvertisement($adId)) {
				

					//show all advertisement List call koira dlm :D
					if(isset($_SESSION['login'])) {
						$email = trim($_SESSION['login']);

						$data = findingUserIdByEmail($email);
						$user_Id = trim($data[0]);
						$user_Id = htmlspecialchars($data[0]);
					}

					//get all advertisement by id

					$advertisementList = getAllAdevertisementById($user_Id);

					if(count($advertisementList) > 0) {
						include_once(APP_ROOT."/app/view/advertisement_show_view.php");
					}
					else{
					 	include_once(APP_ROOT."/app/view/Myaccount_zero_list.php");
					}
				}
			}
			break;  

		case 'showAlljobList':
				if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);

				$jobList = getAllJobListForAdmin();
				if(count($jobList) > 0) {
					include_once(APP_ROOT."/app/view/joblist_show_view.php");
				}
				else{
					echo "sorry admin kono job list nai";
				}


				}
				break;
		//normal user er jnno sob ber kore dbe
		case 'jobTimeTypegUser':
			$jobtimeType = $_GET["cgUserTimeType"];

			$jobList = getJobListBytimeType($jobtimeType);
			if(count($jobList)){
					
					include_once(APP_ROOT."/app/view/jobtypeguser_search_response.php");
				}
				else{
					//kono kisu nai
					echo "";
				}

			break;
		//company type er search korar jnno
		case 'jobTimeType':
			
				if($_SESSION['uType'] == "Admin") {

				$jobtimeType = $_GET["cTimeType"];

				$jobList = getJobListBytimeType($jobtimeType);
				if(count($jobList)){
					
					include_once(APP_ROOT."/app/view/jobtype_search_response.php");
				}
				else{
					//kono kisu nai
					echo "";
				}
			}
			else{
				//user id + company type diye seach korte hbe
					if(isset($_SESSION['login'])) {
						$email = trim($_SESSION['login']);
						$jobtimeType = $_GET["cTimeType"];

						$data = findingUserIdByEmail($email);
						$user_Id = trim($data[0]);
						$user_Id = htmlspecialchars($data[0]);
						$jobList = getJobListBytTimeTypeForUser($jobtimeType,$user_Id);
						if(count($jobList)) {
							include_once(APP_ROOT."/app/view/jobtype_search_response.php");
						}
						else{
							echo "";
						}
				}
			}
			break;
			//normal user er jnno search kor dbe
			//companyTypegUser
		case 'companyTypegUser':
				$companyType = $_GET["cgType"];
				$jobList = getJobListByCompnyType($companyType);
				if(count($jobList)){
					
					include_once(APP_ROOT."/app/view/jobtypeguser_search_response.php");
				}
				else{
					echo "";
				}



			# code...
			break;
		case 'companyType':
				//var_dump($GLOBALS);
			# code...
				$companyType = $_GET["cType"];

			if($_SESSION['uType'] == "Admin") {

				$jobList = getJobListByCompnyType($companyType);
				if(count($jobList)){
					
					include_once(APP_ROOT."/app/view/jobtype_search_response.php");
				}
				else{
					echo "";
				}
			}
			else{
				//user id + company type diye seach korte hbe
				if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);

				$data = findingUserIdByEmail($email);
				$user_Id = trim($data[0]);
				$user_Id = htmlspecialchars($data[0]);
					$jobList = getJobListByCompnyTypeForUser($companyType,$user_Id);
					if(count($jobList)) {
						include_once(APP_ROOT."/app/view/jobtype_search_response.php");
					}
					else{
						echo "";
					}
				}

			}
			break;
		case 'searachBycategorywitoutlogin':
			$cate = $_GET['catAdv'];
			$advertisementList = getAllAdvertisementByCategory($cate);
			if(count($advertisementList) > 0) {
				include_once(APP_ROOT."/app/view/categoryType_serachresponse_withoutlogin.php");
				}
			else{
				echo "No Advertisemnts found for this ctegory";
			}


		break;
		case 'searachBycategory':
				# code...
				if($_SESSION['uType'] == "Admin"){
					$cate = $_GET['catAdv'];
					$advertisementList = getAllAdvertisementByCategory($cate);
					if(count($advertisementList) > 0) {
						include_once(APP_ROOT."/app/view/categoryType_search_response.php");
					}
					else{
						echo "No Advertisemnts found for this ctegory";
					}
				}
				else{
					//user er jnno kaj kora lagbe
					if(isset($_SESSION['login'])) {
						$email = trim($_SESSION['login']);
						$cate = $_GET['catAdv'];

						$data = findingUserIdByEmail($email);
						$user_Id = trim($data[0]);
						$user_Id = htmlspecialchars($data[0]);

						$advertisementList = getJobadvTypeForUser($cate,$user_Id);
						if(count($advertisementList)) {
							include_once(APP_ROOT."/app/view/categoryType_search_response.php");
						}
						else{
							echo "no advertisement of this category";
						}
					}
				}
				break;

		case 'showjobList':
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				$data = findingUserIdByEmail($email);
				$user_Id = trim($data[0]);
				$user_Id = htmlspecialchars($data[0]);

				$jobList = getAllJobList($user_Id);

				if(count($jobList) > 0) {
					if($_SESSION['uType'] == "Admin") {
					include_once(APP_ROOT."/app/view/Admin_joblist_show_view.php");
					
				}
					else{
						include_once(APP_ROOT."/app/view/joblist_show_view.php");
					}
				}
				else{
					echo "joblist post korar jnno redirect kora lagbe";
				}
			}

			break;

		case 'jobDelete' :
			if(isset($_GET['JobId'])) {
				$jobId = $_GET['JobId'];

				 if(removeJob($jobId)) {
				 	if(isset($_SESSION['login'])) {
					$email = trim($_SESSION['login']);
				
					$data = findingUserIdByEmail($email);
					$user_Id = trim($data[0]);
					$user_Id = htmlspecialchars($data[0]);
					if($_SESSION['uType']=="Admin") {
						$jobList = getAllJobListForAdmin();
					}
					else{
						$jobList = getAllJobList($user_Id);
					}
					if(count($jobList) > 0) {
							include_once(APP_ROOT."/app/view/joblist_show_view.php");
						}
						else{
							echo "joblist post korar jnno redirect kora lagbe";
						}
				}
			}

			}

			break;

		case 'jobEdit':
			if(isset($_GET['id'])) {
				$jobId = $_GET['id'];
				$job = getJobById($jobId);


				//deadline alada korlam 
				$deadline = explode("-", $job['deadline']);

				$day = $deadline[2];
				$month = $deadline[1];
				$year = $deadline[0];

				if($job) {
					include_once(APP_ROOT."/app/view/job_update_view.php");
				}

			}
			break;

		case 'jobDetailswithoutlogin' :
			if(isset($_GET['JobId'])) {
				$jobId = $_GET['JobId'];
				$job = getJobById($jobId);


				//deadline alada korlam 
				$deadline = explode("-", $job['deadline']);

				if($job) {
					include_once(APP_ROOT."/app/view/job_details_withoutlogin_view.php");
				}

			}


			break;

		case 'jobDetails':
		if(isset($_GET['JobId'])) {
				$jobId = $_GET['JobId'];
				$job = getJobById($jobId);


				//deadline alada korlam 
				$deadline = explode("-", $job['deadline']);

				if($job) {
					include_once(APP_ROOT."/app/view/job_details_view.php");
				}

			}

			break ;
	//advertisement show koramu
	case 'adDetails' :
		$info = $_GET['info'];

		$type_id = explode("_", $info);
		$adType = $type_id[0];
		$adId = $type_id[1];

		$advertisement = getAdvertisementByAdId($adId);

		if($advertisement) {
			if($adType == "property") {
			include_once(APP_ROOT."/app/view/property_advertisement_show_view.php");
			}
			else {
				include_once(APP_ROOT."/app/view/product_advertisement_show_view.php");
			}
		}
	break;
	//editing advertiseent
	
	default:
		# code...
		break;
}

		function test_data($data) {
		 	$data = trim($data);
		 	$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

?>
