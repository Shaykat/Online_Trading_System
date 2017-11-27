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

	 $data = explode(",", $details);
	//echo $data[0];
	//description

	 $description = explode(":", $data[0]);
	 $des = test_data($description[1]);

	 //echo $des."<br>";

	  //condition
	$conditions = explode(":", $data[1]);
	$condition = test_data($conditions[1]);

	//echo $condition."<br>";

	$models = explode(":", $data[2]);
	$model =  test_data($models[1]);

	//echo $model; 
		
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
					Product condition
				</td>

				<td width='400'>$condition</td>
			</tr>

			

			<tr>
				<td   width = '300' valign = 'top'>
					Product model
				</td>

				<td width='400'>$model</td>
			</tr>

			<tr>
				<td   width = '300' valign = 'top'>
					 Location
				</td>

				<td width='400'>$loc</td>
			</tr>
			
			<tr>
				<td   width = '300' valign = 'top'>
					Product Description
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