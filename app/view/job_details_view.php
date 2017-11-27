<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
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

<html>
<head>
	<title></title>
	<style type="">
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>

	<div align = "center"><br /> <h3>Job Details</h3> <hr/> <br/></div>

	<table border = "1" align="center">
		<tr bgcolor =  "#1eaf19">
			<td colspan="2" align="center">
				<h3 style = "color: black;"  align="center">Job Details</h3>
				
			</td>
		</tr>
		</tr>

			<tr>
			<td width = "300" valign="top">
				<b>Job category</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['job_category'];
				?></p>
				 
			</td>
		</tr>
		<tr>
			<td width = "300">
				<b>Job Title</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['job_title']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300">
				<b>Job Type</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['job_type']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300">
				<b>Apply via</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['applyVia']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300">
				<b>company Web</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['company_web']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300">
				<b>Address</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['address']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300">
				<b>Deadline</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['deadline']; ?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300" valign="top">
				<b>Job Description</b>
			</td>
			<td width="400" height="400" valign="top">
				
				<p><?php echo $job['description']; ?></p>;
				 
			</td>
		</tr>

			<tr>
			<td width = "300" valign="top">
				<b>Salary</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['salary']; 
				if($job['negotiable']== 1){ echo " (negotiable)"; }

				?></p>
				 
			</td>
		</tr>

			<tr>
			<td width = "300" valign="top">
				<b>contact no</b>
			</td>
			<td width="400">
				
				<p><?php echo $job['phone'];
				?></p>
				 
			</td>
		</tr>

	</table>

</body>
</html>