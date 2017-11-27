<?php 

require_once(APP_ROOT."/lib/data_access_helper.php")
 ?>

<?php
	/*function updateAccounttoDb($account) {
		$query = "UPDATE register SET  UserName = '$account[UName]', Email ='$account[email]', Password ='$account[pass]' WHERE user_Id = '$account[Id]'";
			return executeQuery($query);
	}*/
	function getAllUsersFromDb($email){
		$query = "SELECT user_Id, UserName, Email , user_type FROM register";
		$result = executeQuery($query);	
		$userList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_array($result); ++$i) {
				$userList[$i] = $row;				
			}
		}
		return $userList;

	}

	//wildcrd er mddome serach korar jnno
	function searchUserByWilcardFromDb($wild){
		$query = "SELECT user_Id, UserName, Email , user_type FROM register WHERE UserName LIKE '$wild'";
		$result = executeQuery($query);	
		$userList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_array($result); ++$i) {
				$userList[$i] = $row;				
			}
		}
		return $userList;

	}
	function editAccountToDb($upAccount) {
		$query = "UPDATE register SET  UserName = '$upAccount[UName]', Password ='$upAccount[pass]', Email ='$upAccount[email]' WHERE user_Id = '$upAccount[ID]'";
			return executeQuery($query);
	}

	//delete account by user id
	function deleteAccountFromDb($uid){
		$query = "DELETE FROM register WHERE user_Id = '$uid'";

		return executeQuery($query);
	}
	//sob return korbo user er info
	function getAccountByEmailFromDb($email) {
		$query = "SELECT user_Id, UserName, Email, Password FROM register WHERE Email = '$email'";

		$result = executeQuery($query);
		$account = null;

		if($result) {
			$account = mysqli_fetch_assoc($result);
		}

		return $account;

	}

	//user add korbe
	function addUserToDb($user){
		$query = "INSERT INTO register(UserName, Email, Password ,user_type) VALUES ('$user[u_name]', '$user[email]', '$user[pass]' , '$user[uType]')";

		
		return executeQuery($query);
	}


	//login chechk
	function  chechkLoginFromDb($password,$Email) {
		$password = trim($password);
		$Email = trim($Email);
		$query = $query = "SELECT Email,Password ,user_type FROM register Where Email = '$Email' AND Password = '$password'";
		$result =  executeQuery($query);
		//var_dump($result);

		$account = null;

		if($result) {
			
			$account = mysqli_fetch_array($result);
		}

		return $account;

	}

	function checkEmailDupicity($Email){
		$Email = trim($Email);
		$query = $query = "SELECT * FROM register Where Email = '$Email' ";
		$result =  executeQuery($query);
		$account = null;

		if($result) {
			$account = mysqli_fetch_array($result);
			$account = sizeof($account);
			if($account > 0){
				return false;
			}
			else return true;
		}
		return true;
	}
?>
