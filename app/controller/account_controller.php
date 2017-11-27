<?php
    session_start();
 ?>
<?php

	
	if(!isset($isDispatchedByFrontController)) {
		include_once("../error.php");
		die;
	}
?>

<?php include_once(APP_ROOT."/core/account_service.php"); ?>

<?php

	switch($view) {

		case "showAllUsers":
			//echo "ami sob user dhekamu";
			if(isset($_SESSION['login'])){
				$email = trim($_SESSION['login']);
				//echo "$email";

				$users = getAllUsers($email);
				if(count($users)){
					include_once(APP_ROOT."/app/view/allUsers_show_view.php");

				}
				else{
					echo "no user list er ekta page dhkate hbe";
				}

			}
			else{
				echo "logout korte hbe";
			}
			break;
		case "update":
			echo "update kormu";
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				echo $email;
			$account = getAccountByEmail($email);
			if($account) {
				echo $account['Email'];
				include_once(APP_ROOT."/app/view/UpdateProfile_view.php");
			}
			//else diye error o dte pri
			}

			break;

		case "login":
			include_once(APP_ROOT."/app/view/Login.php");
		break;
		case 'adminLoggedHome':
			# code...
			header("location: adminLoggedHome.php");
			break;

		case "create":
			include_once(APP_ROOT."/app/view/CreateAccount.php");
		break;
		case 'searchUser':
				# code...
			//echo $_GET['wil']."dukse";
			$wilc = "%".$_GET['wil']."%";
			//echo "$wilc";
			$userList = searchUserByWilcard($wilc);
			//echo "$wilc".count($userList);
			if(count($userList) > 0) {
				include_once(APP_ROOT."/app/view/usersearch_response_view.php");
			}

			break;	

		case "delete":
		//var_dump($GLOBALS);
		$uid = $_GET['uid'];
		if(deleteAccount($uid)){
			
			if(isset($_SESSION['login'])){
				$email = trim($_SESSION['login']);
				//echo "$email";
				//email ta actually lagbona
				$users = getAllUsers($email);
				if(count($users)){
					include_once(APP_ROOT."/app/view/allUsers_show_view.php");

				}
				else{
					echo "no user list er ekta page dhkate hbe";
				}

			}
			else{
				echo "logout korte hbe";
			}
		}
		break;

		case 'logout':

		session_destroy();
		header("Location: index.php");
		break;

		default:
		header("Location: index.php");
		break;
	}

	// function test_data($data) {
	//  	$data = trim($data);
	//  	$data = stripslashes($data);
	// 	$data = htmlspecialchars($data);
	// 	return $data;
	// }

?>