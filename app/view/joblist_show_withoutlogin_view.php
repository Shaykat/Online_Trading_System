<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<?php include_once("Head.php"); ?>
<div id="div-top" style="width: 100%; height: 100px"> 
	
</div>

<?php
	echo '<div align = "center"><h3>All JobvacancyList</h3>
	 								<div align ="right"><label>Jcompanytype</label>
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

<table border = '1' align = "center" id ="lol">
	<tr bgcolor = "#1eaf19">
		<td width= "300"><b>JOB TITLE</b></td>
		<td width= "100"><b>JOB TYPE</b></td>
		<td width= "100"><b>SALARY</b></td>
		<td width= "100"><b>ADDRESS</b></td>		
		<td colspan="2" width= "100"><b>DETAILS</b></td>
		
	</tr>
	<tr>
		
	</tr>
	<?php
		 	foreach ($jobList as $job) {
			# code...
			echo "<tr>
					<td>$job[3]</td>
					<td>$job[2]</td>
					<td>$job[9]</td>
					<td>$job[6]</td>
					<td valign = 'top' colspan='2'><a href='/Online_Trading_System/requestholder.php?advertisement_jobDetailswithoutlogin&JobId=$job[1]'>details</a></td> 


			</tr>";
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
                document.getElementById("lol").innerHTML = this.responseText;
                //alert(this.responseText);
                //alert(lame);
            }
        };
        xmlhttp.open("GET", "requestholder.php?advertisement_companyTypegUser&cgType=" + base, true);
        xmlhttp.send();
	}
	function searchjobtimetype(time){
		alert(time);
		 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lol").innerHTML = this.responseText;
                //alert(this.responseText);
                //alert(lame);
            }
        };
        xmlhttp.open("GET", "requestholder.php?advertisement_jobTimeTypegUser&cgUserTimeType=" + time, true);
        xmlhttp.send();
	}
</script>