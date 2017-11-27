<html>
<head>
	<title></title>
</head>
<body>
	<?php include("head.php"); ?>
	<table align = "center" >
		<tr>
			<td>
				<fieldset>					
				<legend><h2>Offer a Property for Rent</h2></legend>
					<form>
						<table  cellspacing="15" >
							<tr>
								<td Width = "800">
									<h3>1. Plots And Lands<h3>
									<!--Subcategory of Electronics-->
									
									<br>
									<br>
									<hr>
								</td>
							</tr>

							<!--including Location-->
							<tr>
								<td width = "800">
									<?php include("Location.php"); ?>
									<br>
									<br>
									<hr>
								</td>
							</tr>

							<!--Product Details-->
							<tr>
								<td width = "800">
								<h3>3. Add Details </h3>
									<h4>Add photos</h4>
									 <input type="file" name="pic" accept="image/*"><br>
									 <hr>
								</td>
							</tr>

							<tr>
							<td>
							<label>Land Type</label>
								<input type="checkbox" name="Agriculture" value="Agriculture"> Agriculture
								<input type="checkbox" name="Commercial" value="Commercial"> Commercial
								<input type="checkbox" name="Residential" value="Residential"> Residential
								<input type="checkbox" name="Other" value="Other"> Other
							</td>
							</tr>

							<tr>
								<td>
								
								<input type="text" size="50" name="landSize" placeholder="Land size">
									
								</td>
								<td>
									<select name = "Unit">
									<option value="katha">katha</option>
									<option value="Unit">Unit</option>
									<option value="Acres">Acres</option>
									<option value="Bigha">Bigha</option>
									</select>
								</td>

							</tr>
					
							<tr>
								<td>
								<input type="text" size="50" name="Address" placeholder="Address (optional)">
									
								</td>
							<tr>
							<tr>
								<td>
								<input type="text" size="50" name="Title" placeholder="Title">
									
								</tr>
							<tr>


							<tr>
								<td> 
					
									<label>Description</label><br>
									<textarea name="description" ></textarea>
									
								</td>
							</tr>
							

							<tr>
								<td>
									<label>Sell Price(TK)</label><br>
									<input type="text" name="price">
									<input type="checkbox" name="negotiable" value="negotiable"> negotiable<br>
									
								</td>
							</tr>	
									
							<tr>
								<td>
									
									<?php include("ContractDetails.php");  ?>
									
								</td>
							</tr>	
							<tr>
								<td align= "center">
									<input type="submit" name="submit" value="Post ad">
									
								</td>
							</tr>	
						</table>
					</form>
				</fieldset>				
			</td>
		</tr>
	</table>
	<?php include("tail.php"); ?>
</body>
</html>