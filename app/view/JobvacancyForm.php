<?php
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
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
	$priceError = $description = $location = $phoneError = $aViaError = $aVia = $cwebError = $cweb = $Address = $AddresError = "";

	//var_dump($_FILES['pic']);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo $_POST['Ecatagory'] . "lol";
	  //echo "response ". "durr";
		//savaing the category
		//echo "lol";
		$eCatagory =$_POST['CompanyType'];
		echo $eCatagory;

		//Job Type
		$jobType =$_POST['jobtype'];

		//location
		$location = test_data($_POST['Location']);
		

		$jTitle = test_data($_POST['jobTitle']);

		if(empty($jTitle)) {
			$jTitleError = "* Product Ttile Required";
			$error = 1;
			
		}

		// apply Via
		$aVia = test_data($_POST['Applyvia']);

		if(empty($aVia)) {
			$aViaError = "* Model Filed Reqired";
			$error = 1;
			
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
			//echo "Address: ".$error."<br>";
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
		//echo "date: ".$deadline;
		if($dd == '' || $mm == '' || $yy == ''){
			$error = 1;
			//echo "Input required";
		}
		else{
			if(numberCheck($dd) || numberCheck($mm) || numberCheck($yy)){
				$error = 1;
				//echo "Date: ".$error."<br>";
			}
			else if((int)$dd < 1 && (int)$dd > 31 && (int)$mm < 1 && (int)$mm > 12 && (int)$yy < 1111 && (int)$yy > 9999){
				$error = 1;
				//echo "Date is not valid";
			}
		}

		//description
		$description = test_data($_POST['description']);
		//price filed verification
		$salary = test_data($_POST['salary']);

		if(empty($salary)) {
			$priceError = "* salary Filed Must be Required";
			$error = 1;
			//echo $error." pr <br>";

		}
		else if($salary <= 0){
			$priceError = "* Enter a valid price";
			$error = 1;
			//echo $error." prv <br>";
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
			//echo $error." ph <br>";

		}
		else if(strlen($phone) < 11 || strlen($phone) > 15){
			$phoneError = "* Enter a valid phone number";
			$error = 1;
			//echo $error." phv <br>";
		}

		//dtabase insert koro
		//echo "$error <br>";
		if($error == 0) {
			 echo "inside";
			 //finding subcategory
			 $data = selectJobCatagory($eCatagory);
			 $ctid = test_data($data[0]);
			 //echo $ctid;
			 //insert into jobtable
			 $job = array('cId' => $ctid ,'Loc' =>$location );

			 if(adJob($job)) {
			 	echo "job added";
			 }
			 //find in the job id 
			 	$data = findingJobId();
				$job_id = test_data($data[0]);
				//echo "job id: ".$job_id."<br>";
				//var_dump($_SESSION);
			//finding uder_id
			//session age check kora lagbe user id niye aslm
			if(isset($_SESSION['login'])) {
				$email = trim($_SESSION['login']);
				echo $email;

				$data = findingUserIdByEmail($email);
				$user_Id = test_data($data[0]);
				//echo "user id: ".$user_Id."<br>";

			}
			//job details form fill up
		      echo $eCatagory;
			$jobdetails = array('uId' => $user_Id, 'jId' => $job_id, 'jType' => $jobType , 'jTitle' => $jTitle, 'aVia' => $aVia ,'cWeb' => $cweb , 'Add' => $Address , 'Dead' => $deadline, 'Des' => $description, 'Sal' =>$salary , 'sUnit' => $salary_interval_unit , 'Nego' => $negotiable , 'Phone' => $phone , 'job_category' => $eCatagory);
			if(addJobDetails($jobdetails)) {
				echo "jobdetails added";
			}
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
					<legend><h2>Post a job vacancy</h2></legend>
					<form method="post">
						<table  cellspacing="15" >
							<tr>
								<td Width = "800">
									<p style = "color: green;" class = "thick"><font size="5">1. Job Offers</font></p> 
									<!--category of Job Offers -->
									<p style = "color: green;" ><font size="4">Company Type</font></p>
									<select name = "CompanyType">
									<option value="AccountingOrFinance">Accounting / Finance</option>
									<option value="Bank">Banking</option>
									<option value="IT">IT</option>
									<option value="Airlines">Airlines</option>
									<option value="HotelOrRestaurent">Hotel / Restaurent</option>	
									<option value="Government">Government</option>	
									</select>
									
									<br>
								</td>
							</tr>

							<tr>
								<td>
									<p style = "color: green;" ><font size="4">Job Type</font></p>
									<select name = "jobtype">
									<option value="fullime">Full time</option>
									<option value="pertime">Per time</option>
									<option value="Internship">Internship</option>
									</select>

									<hr>
								</td>

							</tr>

							<!--including Location-->
							<tr>
							<td width = "800">
								<h3>2. Select Location</h3>
									<select name = "Location">
									<option value = "Dhaka">Dhaka</option>
									<option value = "Chittagong">Chittagong</option>
									<option value = "Sylhet">Sylhet</option>
									<option value = "Narayangonj">Narayangonj</option>
									<option value = "Mirpur">Mirpur</option>
									<option value = "Ghulsan" >Ghulsan </option>
									<option value = "Mothijhil" >Mothijhil</option>
									<option value = "Dhanmondi" >Dhanmondi </option>
								</select>
								<br>
								<br>
								<hr>
							</td>
						</tr>

							<!--Product Details-->
							<tr>
								<td width = "800">
									<p style = "color: green;" class = "thick"><font size="4">3.Add Details</font></p>
								</td>
							</tr>

							<tr>
								<td>
								<input id = "pTitle" size= "50" type="text" name="jobTitle" placeholder = "Given a suitable Title"><br>
								<font id = "pTitleErr" color ="red"><?php echo $jTitleError; ?></font>
								</td>
							<tr>

							<tr>
								<td> 
									<input type="text" name="Applyvia" placeholder="Apply via" size = "50" id = "aVia"><br>
									<font id = "aViaErr" color ="red"><?php echo $aViaError; ?></font>
								</td>
							</tr>
							<tr>
								<td> 
									
									<input type="text" name="cweb" placeholder="Company website (optional)" size = "50">
								</td>
							</tr>

							
							<tr>
								<td>
								<input id ="add" type="text" size="50" name="Address" placeholder="Address"><br>
								<font id = "addErr" color ="red"><?php echo $AddresError; ?></font>
								</td>
							<tr>
							
								<td>
								<label>Application Deadline</label><br>
									<label>dd/mm/yyyy</label><br>
									<input id ="day" type="text" name="day" size="3">/
									<input id ="month" type="text" name="month" size="3">/
									<input id = "year" type="text" name="year" size="3"><br>
									<font id = "deadlineErr" color = "red"></font>

								</td>
							<tr>
								<td> 
					
									<label>Description</label><br>
									<textarea name="description" rows="7" cols="60"></textarea>
									
								</td>
							</tr>
							

							<tr>
								<td>
								<label>Salary(TK)</label><br>
									<input id = "salary" type="text" name="salary" >
									<select name = "unit">
									<option value="month">Month</option>
									<option value="week">Week</option>
									<option value="hour">Hour</option>	
									</select>
									<input type="checkbox" name="negotiable" value="negotiable"> negotiable<br>
									<font id  ="priceErr" color  = "red"><?php echo $priceError; ?></font>
								</td>

							</tr>	

							<tr>
							<td>
								
								<h3>Contact no</h3>
									<hr>
									<label>Phone Number</label><br>
									<input id = "mobNum" type="text" name="phone"><br>
									<font id = "mobNumErr" color = "red"><?php echo $phoneError; ?></font>
									<br>
								
							</td>
						</tr>
									
							<tr>
								<td>
									
									<?php include("ContractDetails.php");  ?>
									
								</td>
							</tr>	
							<tr>
								<td align= "center">
									<input class = "button" type="submit" name="submit" value="Post ad" onclick="submitform()">
									
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
		//alert("ok");
		
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
 		//alert("di" + di);
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