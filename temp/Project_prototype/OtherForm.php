<html>
<head>
	<title></title>
</head>
<body>
	<?php include("head.php"); ?>
		<table align = "center">
			<tr>
				<td>
					<fieldset>
					<legend><h2 >Sell an Item</h2></legend>
					<form>
						<table  cellspacing="15">
							<tr>
								<td Width = "800">
									
									<h3>1.Other</h3>

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
									<label>Product Title</label><br>
									<input size= "50" type="text" name="productname">
								</td>
							</tr>

							<tr>
								<td> 
					
									<label>Description</label><br>
									<textarea name="description" ></textarea>
									
								</td>
							</tr>


							<tr>
								<td>
									<label>Price(TK)</label><br>
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