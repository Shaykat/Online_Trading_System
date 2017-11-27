<html><!DOCTYPE html>
<html>
<head>
	<title>Online Shop</title>
</head>
<body> 
	<?php include("head.php"); ?>

	<center> <!-- advertisement !-->
		<table border = "1" cellspacing="5">
			<tr>
				<td rowspan="4" width="300" valign="top">
					<fieldset>
						<legend> Sort results by </legend>
						<select>
							<option> Most Recent </option>
						</select>
					</fieldset>

					<fieldset>
						<legend> Type of Poster by </legend>
						<input type="radio" name="All Posters" > All Posters <br>
						<input type="radio" name="Only Members"> Only Members
					</fieldset>

					<fieldset>
						<legend> Categories </legend>
						<ul>
							<li> Electronic </li>
							<li> Cars </li>
							<li> Land </li>
							<li> Men's Ware </li>
						</ul>
					</fieldset>
				</td>

				<td rowspan="4" width="650" valign="top"> 
					<table border="0" cellspacing="5">
						<tr>
							<td > 
								<a href = "ViewProduct.php">
									<img src="IMG/ad1.jpg" height="200"> 
								</a> 
							</td>
							<td> <a href = "ViewProduct.php"> Apple Laptop </a> </td> 
						</tr>

						<tr>
							<td > 
								<a href = "ViewProduct.php">
									<img src="IMG/ad2.jpg" height="200"> 
								</a> 
							</td>
							<td> <a href = "ViewProduct.php"> HTC Phone</a> </td>
						</tr>
					</table>
				</td>

				<td rowspan="4" width="300" valign="top"> 
					
				</td>
			</tr>
		</table>
	</center>


	<hr> <!-- Quick links !-->
	<?php include("tail.php"); ?>
</body>