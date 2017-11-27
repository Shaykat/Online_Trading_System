<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
	}
?>

<?php 
	$title = $advertisement['title'];
	$price = $advertisement['price'];
	$loc = $advertisement['location'];
	$photo = $advertisement['photo'];
	$phone = $advertisement['phone'];
	$nego = $advertisement['negotiable'];
	$neg = "";
	if($nego ==1 ) {
		$neg = " (negotaible)";
			}
	$details =$advertisement['details'];
	//echo $details."<br>";

	$data = explode(",",$details);
	//beds
	$beds = explode(":", $data[0]);
	$bed = test_data($beds[1]);

	//baths
	$baths = explode(":", $data[1]);
	$bath = test_data($baths[1]);

	//property size
	$size = explode(":", $data[2]);
	$fsize = test_data($size[1]);
	//address
	$address = explode(":", $data[3]);
	$add = test_data($address[1]);

	//description
	$description = explode(":", $data[4]);
	$des = test_data($description[1]);

	//featurs
	$features = explode(":", $data[5]);
	$fea = test_data($features[1]);

	
 

		
	  // echo "<br /> <h3>Advertisement Details</h3> <hr/> <br/>";
		echo "
			<table border = '1' align='center'> 
			<tr>
				<td colspan='2' align='center'>
					<h3>Advertisement Details</h3>
				</td>
			</tr>

			<tr>
				<td colspan='2' align='center'>
					<div><img width = '200' height ='100' src = 'IMG/".$photo."'></div>
				</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					Advertisement Title
				</td>

				<td width='400'>$title</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					Beds
				</td>

				<td width='400'>$bed</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					Baths
				</td>

				<td width='400'>$bath</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					Appartment Size
				</td>

				<td width='400'>$fsize</td>
			</tr>


			<tr>
				<td   width = '300' valign = 'top'>
					Appartment Address
				</td>

				<td width='400'>$add</td>
			</tr>

			

			<tr>
				<td   width = '300' valign = 'top'>
					property Location
				</td>

				<td width='400'>$loc</td>
			</tr>
			<tr>
				<td   width = '300' valign = 'top'>
					Appartment Features
				</td>

				<td width='400' valign = 'top'>$fea</td>
			</tr>
			<tr>
				<td   width = '300' valign = 'top'>
					Appartment Description
				</td>

				<td width='400' height = '400' valign = 'top'>$des</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					 Price
				</td>

				<td width='400'>$price$neg
				
				</td>
			</tr>


			<tr>
				<td   width = '300' valign = 'top'>
					owner  Conntract no
				</td>

				<td width='400'>$phone
				
				</td>
			</tr>






		</table>
		";
	



?>

