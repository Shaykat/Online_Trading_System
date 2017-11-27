<?php 

require_once(APP_ROOT."/data/account_data_access.php") 
?>

<?php

	function updateAccountt($upAccount) {
		return editAccountToDb($upAccount);
	}

	function getAccountByEmail($email) {
		//echo "function e dukse";
		return getAccountByEmailFromDb($email);
	}

	function adduser($user) {

		return addUserToDb($user);
	}

	function chechkLogin($password,$Email){
		return chechkLoginFromDb($password,$Email);
	}
	//get all users from regiser table
	function getAllUsers($email){
		return getAllUsersFromDb($email);
	}
	//delete account
	function deleteAccount($uid){
		return deleteAccountFromDb($uid);
	}

	//admin er jnno sob advertisement show korbo
	function getAllAdvertisementForAdmin(){
		return getAllAdvertisementForAdminFromDb();
	}
	//userlist search korbe wild card er maddome
	function searchUserByWilcard($wild){
		return searchUserByWilcardFromDb($wild);
	}

	function getCheckEmailDupicity($Email){
		return checkEmailDupicity($Email);
	}

 ?>