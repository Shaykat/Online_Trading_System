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
					<legend><h2>Post a job vacancy</h2></legend>
					<form>
						<table  cellspacing="15" >
							<tr>
								<td Width = "800">
									<h3>1. Jobs Offer<h3>
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
									<select name = "Industry">
									<option value="industry">Industry</option>
									<option value="a/f">Accounting / Finance</option>
									<option value="bank">Banking</option>
									<option value="It">It</option>
									<option value="Airlines">Airlines</option>
									<option value="h/r">Hotel / Restaurent</option>	
									<option value="govt">Govt</option>	
									</select>
								</td>
							</tr>

							<tr>
								<td> 
									
									<input type="text" name="Applyvia" placeholder="Apply via" size = "50">
								</td>
							</tr>
							<tr>
								<td> 
									
									<input type="text" name="cweb" placeholder="Company website (optional)" size = "50">
								</td>
							</tr>

							<tr>
								<td>
									<select name = "jobtype">
									<option value="jobtype">Job type</option>
									<option value="fullime">Full time</option>
									<option value="pertime">Per time</option>
									<option value="Internship">Internship</option>
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
								<input type="text" size="50" name="appdead" placeholder="Application Deadline (optional)">
									
								</td>
							<tr>

							<tr>
								<td>
								<input type="text" size="50" name="Title" placeholder="Title">
									
								</td>
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
									<select name = "unit">
									<option value="unit">Unit</option>
									<option value="month">Month</option>
									<option value="week">Week</option>
									<option value="hour">Hour</option>	
									</select>
									<input type="checkbox" name="negotiable" value="negotiable"> negotiable
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