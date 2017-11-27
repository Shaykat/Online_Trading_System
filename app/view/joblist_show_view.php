<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<?php 
	 if($_SESSION["uType"] == "Admin"){
	 	include("adminLoggedHead.php"); 
	 	echo '<div align = "center"><h3>All JobvacancyList</h3>
	 								<div align ="right"><label style="color: green; font-size: 18;">Job Company Type</label>
									<select name = "CompanyType" onchange = "searchjobtype(this.value)">
									<option value="AccountingOrFinance">Accounting / Finance</option>
									<option value="Bank">Banking</option>
									<option value="IT">IT</option>
									<option value="Airlines">Airlines</option>
									<option value="HotelOrRestaurent">Hotel / Restaurent</option>	
									<option value="Government">Government</option>	
									</select>
									<label>Jobtype</label>
									<select name = "jobtype" onchange = "searchjobtimetype(this.value)">
									<option value="fullime">Full time</option>
									<option value="pertime">Per time</option>
									<option value="Internship">Internship</option>
									</select>
									</div>

			<hr/> </div>
	 	';
	 }
	 else{
	 	include("loggedHead.php");
	 	echo '<div align = "center"><h3>All JobvacancyList</h3>
	 								<div align ="right"><label style="color: green; font-size: 18;padding: 10px;">Job Company Type</label>
									<select name = "CompanyType" onchange = "searchjobtype(this.value)">
									<option value="AccountingOrFinance">Accounting / Finance</option>
									<option value="Bank">Banking</option>
									<option value="IT">IT</option>
									<option value="Airlines">Airlines</option>
									<option value="HotelOrRestaurent">Hotel / Restaurent</option>	
									<option value="Government">Government</option>	
									</select>
									<label style="color: green; font-size: 18; padding: 10px;">Job Type</label>
									<select name = "jobtype"  onchange = "searchjobtimetype(this.value)">
									<option value="fullime">Full time</option>
									<option value="pertime">Per time</option>
									<option value="Internship">Internship</option>
									</select>
									</div>

			<hr/> </div>
	 	';
	 }
	?>

<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>

<table border = '1' align = "center" id ="boom">
	<tr  bgcolor =  "#1eaf19">
		<td width= "100"><b>JOB ID</b></td>
		<td width= "300"><b>JOB TITLE</b></td>
		<td width= "100"><b>JOB TYPE</b></td>
		<td width= "100"><b>SALARY</b></td>
		
		<?php if($_SESSION["uType"] == "User") echo '<td colspan="2" width= "100"><b>Edit</b></td>'?>
		<td colspan="2" width= "100"><b>DELETE</b></td>
		
		<td colspan="2" width= "100"><b>DETAILS</b></td>
		
	</tr>
	<tr>
		
	</tr>
	
		<?php
		if($_SESSION["uType"] == "Admin"){
	 	foreach ($jobList as $job) {
			# code...
			echo "<tr>
					<td>$job[1]</td>
					<td>$job[3]</td>
					<td>$job[2]</td>
					<td>$job[9]</td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobDelete&JobId=$job[1]'>delete job</a></td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobDetails&JobId=$job[1]'>details</a></td> 


			</tr>";
		}
	 }
	 else{
	 	foreach ($jobList as $job) {
			# code...
			echo "<tr>
					<td>$job[1]</td>
					<td>$job[3]</td>
					<td>$job[2]</td>
					<td>$job[9]</td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobEdit&id=$job[1]'>Edit Job</a></td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobDelete&JobId=$job[1]'>delete job</a></td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobDetails&JobId=$job[1]'>details</a></td> 


			</tr>";
		}
	 }

		
			
		?>
</table>

</body>
</html>

<script type="text/javascript">
	function searchjobtype(base){
		//alert(base);
		 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("boom").innerHTML = this.responseText;
                //alert(this.responseText);
                //alert(lame);
            }
        };
        xmlhttp.open("GET", "requestholder.php?advertisement_companyType&cType=" + base, true);
        xmlhttp.send();
	}
	function searchjobtimetype(time){
		//alert(time);
		 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("boom").innerHTML = this.responseText;
                //alert(this.responseText);
                //alert(lame);
            }
        };
        xmlhttp.open("GET", "requestholder.php?advertisement_jobTimeType&cTimeType=" + time, true);
        xmlhttp.send();
	}
</script>
