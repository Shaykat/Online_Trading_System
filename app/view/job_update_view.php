<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
	}
?>


<html>
<head>
	<title></title>
	<style type="text/css">
		.thick {
		    font-weight: bold;
		}
	</style>
</head>
<body>
<?php

	$error = $negotiable = 0;
	$eCatagory = $photo =$photoError=$jTitle =$jTitleError = 
	$salary = $salaryError = $pCondition =
	$description = $location = $phoneError = $aViaError = $aVia = $cwebError = $cweb = $Address = $AddresError = "";

	//var_dump($_FILES['pic']);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo $_POST['Ecatagory'] . "lol";
	  //echo "response ". "durr";
		//savaing the category
		echo "lol";
		$eCatagory =$_POST['CompanyType'];

		//Job Type
		$jobType =$_POST['jobtype'];

		//location
		// $location = test_data($_POST['Location']);
		// echo "$location";

		//photo validatio

		//title varification

		$jTitle = test_data($_POST['jobTitle']);

		if(empty($jTitle)) {
			$jTitleError = "* Product Ttile Required";
			$error = 1;
			echo $error." ti <br>";
		}

		// apply Via
		$aVia = test_data($_POST['Applyvia']);

		if(empty($aVia)) {
			$aViaError = "* Model Filed Reqired";
			$error = 1;
			echo $error." mdl <br>";
		}

		//Company Website
		$cweb = test_data($_POST['cweb']);

		if(empty($cweb)) {
			$cwebError = "* Model Filed Reqired";
			$error = 1;
			echo $error." mdl <br>";
		}

		//Address 
		$Address = $_POST['Address'];
		if(empty($Address)) {
			$AddresError = "* Address Required";
			$error = 1;
			echo "Address: ".$error."<br>";
		}

		// Deadline validation
		$dd = $_POST["day"];
		$mm = $_POST["month"];
		$yy = $_POST["year"];
		$dline = $yy."-".$mm."-".$dd;
		echo $dline;
		$deadline = new DateTime($dline);
		$deadline = $deadline->format('Y-m-d'); // 2003-10-16
		//$deadline = date('y-m-d',$dline);
		echo "date: ".$deadline;
		if($dd == '' || $mm == '' || $yy == ''){
			$error = 1;
			echo "Input required";
		}
		else{
			if(numberCheck($dd) || numberCheck($mm) || numberCheck($yy)){
				$error = 1;
				echo "Date: ".$error."<br>";
			}
			else if((int)$dd < 1 && (int)$dd > 31 && (int)$mm < 1 && (int)$mm > 12 && (int)$yy < 1111 && (int)$yy > 9999){
				$error = 1;
				echo "Date is not valid";
			}
		}

		//description
		$description = test_data($_POST['description']);
		//price filed verification
		$salary = test_data($_POST['salary']);

		if(empty($salary)) {
			$priceError = "* Price Filed Must be Required";
			$error = 1;
			echo $error." pr <br>";

		}
		else if($salary <= 0){
			$priceError = "* Enter a valid price";
			$error = 1;
			echo $error." prv <br>";
		}

		$salary_interval_unit = $_POST['unit'];

		if(isset($_POST['negotiable'])) {
			$negotiable = 1;
			//echo $error." neg <br>";
		}

		$phone = test_data($_POST['phone']);
		if(empty($phone)) {
			$phoneError = "* Cell Phone Number Filed Must be Required";
			$error = 1;
			echo $error." ph <br>";

		}
		else if(strlen($phone) < 11 || strlen($phone) > 15){
			$priceError = "* Enter a valid phone number";
			$error = 1;
			echo $error." phv <br>";
		}

		//dtabase insert koro
		echo "$error <br>";
		if($error == 0) {
			//  echo "inside";
			//  //finding subcategory
			//  $data = selectJobCatagory($eCatagory);
			//  $ctid = test_data($data[0]);
			//  echo $ctid;
			//  //insert into jobtable
			//  $job = array('cId' => $ctid ,'Loc' =>$location );

			//  if(adJob($job)) {
			//  	echo "job added";
			//  }
			//  //find in the job id 
			//  	$data = findingJobId();
			// 	$job_id = test_data($data[0]);
			// 	echo "job id: ".$job_id."<br>";
			// 	var_dump($_SESSION);
			// //finding uder_id
			//session age check kora lagbe user id niye aslm
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				echo $email;

				$data = findingUserIdByEmail($email);
				$user_Id = test_data($data[0]);
				echo "user id: ".$user_Id."<br>";

			}
			//jobId
			//job details form fill up
			$jobdetails = array('uId' => $user_Id, 'jId' => $jobId, 'jType' => $jobType , 'jTitle' => $jTitle, 'aVia' => $aVia ,'cWeb' => $cweb , 'Add' => $Address , 'Dead' => $deadline, 'Des' => $description, 'Sal' =>$salary , 'sUnit' => $salary_interval_unit , 'Nego' => $negotiable , 'Phone' => $phone , 'job_category' => $eCatagory);
			if(updateJobDetails($jobdetails)) {
				echo "jobdetails added";
			}

			 //       $query = "INSERT INTO `jobdetails`(`user_Id`,`job_Id`, `job_type`, `job_title`,`applyVia` , `company_web`, `address`, `deadline`, `description`, `salary`, `salary_interval_unit`, `negotiable`, `phone`) VALUES($user_Id, $job_id, '$jobType','$jTitle','$aVia', '$cweb','$Address','$deadline', '$description', '$salary','$salary_interval_unit','$negotiable', '$phone')";
		  //       mysqli_query($con, $query);
		  //       //echo $_FILES['image']['tmp_name'];
		  //       if (!$result) {
				//     printf("Error: %s\n", mysqli_error($con));
				//     exit();
				// }
				// else{
				// 	echo "hello";
				// }
			//sghhhhhhhhhhhhhhhhhhhhhhh

			// 	$con = mysqli_connect("localhost", "root", "", "E-Shop");
			// 	$query = "SELECT category_Id FROM category Where category_Name = '$eCatagory'";
			// 	$result = mysqli_query($con, $query);
			// 	echo $eCatagory;
			// 	if (!$result) {
			// 	    printf("Error: %s\n", mysqli_error($con));
			// 	    exit();
			// 	}
			// 	$data = mysqli_fetch_array($result);
			// 	$ctid = test_data($data[0]);

			// 	echo "Hello ctid ".$ctid;
			// 	// product
			// 	$query = "INSERT INTO job(category_Id, location) VALUES ('$ctid', '$location')";
			// 	mysqli_query($con, $query);

			// 	//product details.....................

			// 	$query = "SELECT MAX(job_Id) FROM job"; /// product_Id query
			// 	$result = mysqli_query($con, $query);

			// 	if (!$result) {
			// 	    printf("Error: %s\n", mysqli_error($con));
			// 	    exit();
			// 	}
			// 	$data = mysqli_fetch_array($result);
			// 	$job_id = test_data($data[0]);
			// 	echo "job id: ".$job_id."<br>";
			// 	// user_Id query
			// 	$email = $_SESSION['login'];
			// 	$query = "SELECT user_Id FROM register WHERE Email = '$email'";
			// 	$result = mysqli_query($con, $query);

			// 	if (!$result) {
			// 	    printf("Error: %s\n", mysqli_error($con));
			// 	    exit();
			// 	}
			// 	$data = mysqli_fetch_array($result);
			// 	$user_Id = test_data($data[0]);
			// 	echo "user id: ".$user_Id."<br>";

		 //        $query = "INSERT INTO `jobdetails`(`user_Id`,`job_Id`, `job_type`, `job_title`,`applyVia` , `company_web`, `address`, `deadline`, `description`, `salary`, `salary_interval_unit`, `negotiable`, `phone`) VALUES($user_Id, $job_id, '$jobType','$jTitle','$aVia', '$cweb','$Address','$deadline', '$description', '$salary','$salary_interval_unit','$negotiable', '$phone')";
		 //        mysqli_query($con, $query);
		 //        //echo $_FILES['image']['tmp_name'];
		 //        if (!$result) {
			// 	    printf("Error: %s\n", mysqli_error($con));
			// 	    exit();
			// 	}
			// 	else{
			// 		echo "hello";
			// 	}
			// //sghhhhhhhhhhhhhhhhhhhhhhh
		}
	}


	function numberCheck($value){
		$yi = 0;
		for($i = 0; $i < strlen($value); $i++) {
			if($value[$i] >= 0 && $value[$i] <= 9) continue;
			else{
				$yi = 1;
				break;
			}
		}
		echo $yi;
		return $yi;
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
	<table align = "center" >
		<tr>
			<td>
				<fieldset>
				<legend><h2>Update your Job vacancy</h2></legend>
				<form method="post">
					<table  cellspacing="15" >
						<tr>
							<td Width = "800">
								<p class = "thick"><font size="5">1. Job Offers</font></p> 
								<!--category of Job Offers -->
								<p><font size="4">Company Type</font></p>
								<select name = "CompanyType">
								<option value="AccountingOrFinance" <?php if($job['job_category'] == "AccountingOrFinance") echo "SELECTED"; ?>>Accounting / Finance</option>
								<option value="Bank" <?php if($job['job_category'] == "Bank") echo "SELECTED"; ?>>Banking</option>
								<option value="IT" <?php if($job['job_category'] == "IT") echo "SELECTED"; ?>>IT</option>
								<option value="Airlines" <?php if($job['job_category'] == "Airlines") echo "SELECTED"; ?>>Airlines</option>
								<option value="HotelOrRestaurent" <?php if($job['job_category'] == "HotelOrRestaurent") echo "SELECTED"; ?>>Hotel / Restaurent</option>	
								<option value="Government" <?php if($job['job_category'] == "Government") echo "SELECTED"; ?>>Government</option>	
								</select>
								
								<br>
							</td>
						</tr>

						<tr>
							<td>
								<p><font size="4">Job Type</font></p>
								<select name = "jobtype">
								<option value="fullime" <?php if($job['job_type'] == "fullime") echo "SELECTED"; ?>>Full time</option>
								<option value="pertime" <?php if($job['job_type'] == "pertime") echo "SELECTED"; ?>>Per time</option>
								<option value="Internship" <?php if($job['job_type'] == "Internship") echo "SELECTED"; ?>>Internship</option>
								</select>

								<hr>
							</td>

						</tr>

						<!--Product Details-->
						<tr>
							<td width = "800">
								<p class = "thick"><font size="4">3.Add Details</font></p>
							</td>
						</tr>

						<tr>
							<td>
							<input id = "pTitle" size= "50" type="text" name="jobTitle" placeholder = "Given a suitable Title" value="<?=$job['job_title']?>">
							<p id = "pTitleErr"></p>
							</td>
						<tr>

						<tr>
							<td> 
								<input type="text" name="Applyvia" placeholder="Apply via" size = "50" id = "aVia" value="<?=$job['applyVia']?>">
								<p id = "aViaErr"></p>
							</td>
						</tr>
						<tr>
							<td> 
								
								<input type="text" name="cweb" placeholder="Company website (optional)" size = "50" value="<?=$job['company_web']?>">
							</td>
						</tr>

						
						<tr>
							<td>
							<input id ="add" type="text" size="50" name="Address" placeholder="Address" value="<?=$job['address']?>">
							<p id = "addErr"></p>
							</td>
						<tr>
						
							<td>
							<label>Application Deadline</label><br>
								<label>dd/mm/yyyy</label><br>
								<input id ="day" type="text" name="day" size="3" value="<?=$day?>">/
								<input id ="month" type="text" name="month" size="3" value="<?=$month?>">/
								<input id = "year" type="text" name="year" size="3" value="<?=$year?>">
								<P id = "deadlineErr"></P>

							</td>
						<tr>
							<td> 
				<!--description e updated value asena pore anis-->
								<label>Description</label><br>
								<textarea name="description" rows="7" cols="60"><?=$job['description']?></textarea>
								
							</td>
						</tr>
						

						<tr>
							<td>
							<label>Salary(TK)</label><br>
								<input id = "salary" type="text" name="salary" value="<?=$job['salary']?>">
								<select name = "unit">
								<option value="month">Month</option>
								<option value="week">Week</option>
								<option value="hour">Hour</option>	
								</select>
								<input type="checkbox" name="negotiable" value="negotiable"  <?php if($negotiable == 1) echo "checked = 'checked'" ?>> negotiable<br>
								<p id  ="priceErr"></p>
							</td>

						</tr>	
								
						<tr>
							<td>
							
							<h3>Contact no</h3>
								<hr>
								<label>Phone Number</label><br>
								<input id = "mobNum" type="text" name="phone" value = "<?=$job['phone']?>"><br>
								<font id = "mobNumErr" color = "red" ><?php echo $phoneError; ?></font>
								<br>
							
						</td>
						</tr>	
						<tr>
							<td align= "center">
								<input type="submit" name="submit" value="Update Job"onclick = "submitform()">
								
							</td>
						</tr>	
					</table>
				</form>
				</fieldset>
			</td>
			
		</tr>
		
	</table>
		
</body>
</html>
<script type="text/javascript">
	function submitform() {
		// body...
		alert("ok");
		
		var form = document.getElementsByTagName("form")[0];
		var error = 0;
		

		//Apply via validation
		var aVia = document.getElementById("aVia").value;

		if(aVia == "") {
			error = 1;
			document.getElementById("aViaErr").innerHTML = "* ApplyVia Filed Required";
		}
		else{
			document.getElementById("aViaErr").innerHTML = "";
		}
		//Title validation
		var title = document.getElementById("pTitle").value;

		if(title == "") {
			error = 1;
			document.getElementById("pTitleErr").innerHTML = "* Job Title Title Required";
		}
		else{
			document.getElementById("pTitleErr").innerHTML = "";

		}
		//adddress validation
		var add =document.getElementById("add").value;

		if(add == "") {
			document.getElementById("addErr").innerHTML = "* Address Filed Required";
		}
		else{
			document.getElementById("addErr").innerHTML = "";
		}

		//deadline validation

		var day = document.getElementById("day").value;
		var month = document.getElementById("month").value;
		var year = document.getElementById("year").value;
		var di = 0,mi = 0,yi = 0;
		if(day == "") {
			error = 1;
			di = 1;
			//document.getElementById("deadlineErr").innerHTML = "* Insert a valid date";
		}
		else{
 			 di = 0,i;
 			for(i = 0; i < day.length; i++) {
 				if(day[i] >= 1 && day[i] <= 9) continue;
 				else{
 					di = 1;
 					break;
 				}
 			}
 			var temp = parseInt(day);

 			if(isNaN(temp)) di = 1;
 			else if(temp <= 0 || temp >31) di = 1; 
 		}
 		alert("di" + di);
 		// month verification
 		if(month == "") {
			error = 1;
			document.getElementById("deadlineErr").innerHTML = "* Insert a valid date";
		}
		else{
 			 mi = 0,i;
 			for(i = 0; i < month.length; i++) {
 				if(month[i] >= 1 && month[i] <= 9) continue;
 				else{
 					mi = 1;
 					break;
 				}
 			}
 			var tem = parseInt(month);

 			if(isNaN(tem)) mi = 1;
 			else if(tem <= 0 || tem > 12) mi = 1; 
 		}
 		//year validation
 		if(year == "") {
			error = 1;
			document.getElementById("deadlineErr").innerHTML = "* Insert a valid date";
		}
		else{
 			 yi = 0,i;
 			for(i = 0; i < year.length; i++) {
 				if(year[i] >= 1 && year[i] <= 9) continue;
 				else{
 					yi = 1;
 					break;
 				}
 			}
 			var te = parseInt(year);

 			if(isNaN(te)) yi = 1;
 			else if(te < 2017) yi = 1; 
 		}
 		if(di == 1 || mi == 1 || yi == 1) {
 			document.getElementById("deadlineErr").innerHTML = "* Insert a valid date";
 		}
 		else{
 			document.getElementById("deadlineErr").innerHTML = "";
 		}

		
		
		//price field validation

		var salary = document.getElementById("salary").value;
		if( salary == "") {
			error = 1;
			document.getElementById("priceErr").innerHTML = "* Insert Valid salary";
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

			//Title validation
				

 			
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
		alert(error);


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