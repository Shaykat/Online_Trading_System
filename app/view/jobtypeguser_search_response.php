
<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>

<table border = '1' align = "center" id ="boom">
	<tr bgcolor =  "#1eaf19">
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