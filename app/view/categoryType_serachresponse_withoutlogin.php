<?php 
	if(!isset($isDispatchedByFrontController)){
		include_once("../error.php");
		die;
	}
?>
<table border = '1'>
<?php 


foreach ($advertisementList as $advertisement) {
	$info = $advertisement[6]."_".$advertisement[1];


		echo "

			<tr>
				<td width = '400' height = '200'  valign = 'top'>



					<div><a onclick = 'showDetails(\"".$info."\")'> <img width = '200' height ='100' src = 'IMG/".$advertisement[2]."'> </a></div>
					Title: $advertisement[3] <br>
					<font color='green'>Price: $advertisement[4]</font> <br>
					Location:$advertisement[5] <br>

					<a href='/Project_prototype/requestholder.php?advertisement_adDelete&id=$advertisement[0]&advId=$advertisement[1]'>delete Add</a>

				</td>
			</tr>
			
		";
}