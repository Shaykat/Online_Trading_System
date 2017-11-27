<?php
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
?>
<table border = "1" align = "center">
	<tr bgcolor = "#1eaf19">
		<td width = "200"><b>USER ID</b></td>
		<td width = "200"><b>USER NAME</b></td>
		<td width = "200"><b>USER EMAIL</b></td>
		<td width = "200"><b>USER TYPE</b></td>
		<td width = "200"><b>DELETE USER </b></td>
		
	</tr>
	<?php
		foreach ($userList as $user) {
		 	# code...
		 	echo "<tr>
		 			<td>$user[0]</td>
					<td>$user[1]</td>
					<td>$user[2]</td>
					<td>$user[3]</td>
					<td><a href='/Project_prototype/requestholder.php?account_delete&uid=$user[0]'</a>delete user</a></td>

		 		</tr>";
		 } 
	?>
</table>