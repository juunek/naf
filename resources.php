<?php

include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();
  
?>

<?php 
	print($htmlNav);
?>



<?php 

	
	$sql = "SELECT Resources.ResID, Resources.Img, Resources.Title, Resources.Lead, Resources.Description, Resources.Link, Resources.RID FROM Resources ORDER BY Resources.RID";

	$stmt = $conn->stmt_init();
		
		if ($stmt->prepare($sql)) {
			
			/* execute statement */
			$stmt->execute();

			$stmt->bind_result($ResID, $Img, $Title, $Lead, $Description, $Link, $RID);

			$output = "";

			$arrImg = array();
			$arrTitle = array();
			$arrLead = array();
			$arrDescription = array();
			$arrLink = array();
			$arrRID = array();

			while ($stmt->fetch()) {

				
				array_push($arrImg, $Img);
				array_push($arrTitle, $Title);
				array_push($arrLead, $Lead);
				array_push($arrDescription, $Description);
				array_push($arrLink, $Link);
				array_push($arrRID, $RID);

			}



			$arrRName = ["Local Resources", "Media Resources", "National Resources"];

			
			for ($i=0; $i < 3 ; $i++) { 


				$output = $output."<h2 class='blue-bar'>".$arrRName[$i]."</h2>";

				for ($j=0; $j < count($arrImg); $j++) {

					if ($arrRID[$j] == $i+1) {
					 	
						$output = $output."

						<div class='row my-4'>
			                <div class='col-md-4 resources-brands text-center'>
			                    <img class='p-4 my-auto' src='img/resources/".$arrImg[$j]."' style='width:100%;'>
			                </div>
			                
			                <div class='col-md-8 resources-detail'>
			                  <h4>".$arrTitle[$j]."</h4>
			                  <p class='lead'>$arrLead[$j]</p>
			                  <br>
			                  <p>".$arrDescription[$j]."</p>
			                  <a href='".$arrLink[$j]."' class='btn btn-naf-blue' target='_blank'>Visit Website</a> 
			                </div>
		           		</div>


						";

					}	
				 }
				
			}



				$stmt->close();

		} else {

			$output = "Query to retrieve product information failed.";

		}

		$conn->close();




?>

<div class="container">
 <h1>Resources</h1>


		<?php


		
		 echo $output

		  ?>

</div>

<?php
  print($htmlFooter);
?>

