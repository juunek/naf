<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Spinal Cord Injury Resources | Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="List of resources for people with spinal cord injuries, people in need of SCI support, or people who need access to wheelchair vans in Dallas, Tx.">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5d3977cc74.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/volunteerform.js"></script>

  </head>

<?php print($htmlNav); ?>


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
							<div class='col-md-3 col-8 resources-brands text-center'>
							<a href='".$arrLink[$j]."' target='_blank'>
								<img class='p-5 my-auto' src='img/resources/".$arrImg[$j]."' style='width:100%;'>
							</a>
			                </div>

			                <div class='col-md-6 resources-detail'>
							  <a href='".$arrLink[$j]."' class='text-naf-blue text-decoration-none' target='_blank'><h3>".$arrTitle[$j]."</h3></a>
			                  <p class='lead'>$arrLead[$j]</p>
			                  <p>".$arrDescription[$j]."</p>
			                  <a href='".$arrLink[$j]."' class='text-decoration-none' target='_blank'><p class='text-naf-blue'>Visit Website</p></a>
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