<?php
	if(!isset($isDispatchedByFrontController)){
		include_once("../view/error.php");
		die;
	}
	include_once(APP_ROOT."/adminLoggedHead.php");

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
	<div id="div-top" style="width: 100%; height: 100px"> 
		
	</div>

	<br /><h3 align="center">SHOW ALL USERS</h3>
	<div align ="right">
		<input id="uval" class = "search" type="text" name="usearch" size = "30" placeholder="search by username">
		<input class = "button" type="button" name="search" value = "search" onclick = "seachuser()">

	</div>
	<hr/>

	<table border = "1" align = "center" id ="userlisttable">
		<tr bgcolor = "#1eaf19">
			<td width = "200"><b>USER ID</b></td>
			<td width = "200"><b>USER NAME</b></td>
			<td width = "200"><b>USER EMAIL</b></td>
			<td width = "200"><b>USER TYPE</b></td>
			<td width = "200"><b>DELETE USER </b></td>
			
		</tr>
		<?php
			foreach ($users as $user) {
			 	# code...
			 	echo "<tr>
			 			<td>$user[0]</td>
						<td>$user[1]</td>
						<td>$user[2]</td>
						<td>$user[3]</td>
						<td><a href='/Online_Trading_System/requestholder.php?account_delete&uid=$user[0]'</a>delete user</a></td>

			 		</tr>";
			 } 
		?>
	</table>

</body>
</html>

<script type="text/javascript">
	function seachuser() {
		var val = document.getElementById("uval").value;

		alert(val);

		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userlisttable").innerHTML = this.responseText;
                //alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "requestholder.php?account_searchUser&wil=" + val, true);
        xmlhttp.send();
	}
	
</script>