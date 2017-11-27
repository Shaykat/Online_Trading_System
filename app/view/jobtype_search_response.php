<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<table border = '1' align = "center" id ="boom">
	<tr bgcolor =  "#1eaf19">
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
					<td valign = 'top' colspan='2'><a href='/Project_prototype/requestholder.php?advertisement_jobDelete&JobId=$job[1]'>delete job</a></td>
					<td valign = 'top' colspan='2'><a href='/Project_prototype/requestholder.php?advertisement_jobDetails&JobId=$job[1]'>details</a></td> 


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
					<td valign = 'top' colspan='2'><a href='/Project_prototype/requestholder.php?advertisement_jobEdit&id=$job[1]'>Edit Job</a></td>
					<td valign = 'top' colspan='2'><a href='/Project_prototype/requestholder.php?advertisement_jobDelete&JobId=$job[1]'>delete job</a></td>
					<td valign = 'top' colspan='2'><a href='/Project_prototype/requestholder.php?advertisement_jobDetails&JobId=$job[1]'>details</a></td> 


			</tr>";
		}
	 }

		
			
		?>
</table>