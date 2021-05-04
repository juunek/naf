<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
print("<div class='container'>");


	print("<h1>Giving Thanks</h1>");

	$sql = "SELECT GTID, GTImage, GTAdditionalImage, GTAdditionalImageAltText, GTHeader, GTDetails, GTPersonName, GTPersonDetails FROM GivingThanks";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($GTID, $GTImage, $GTAdditionalImage, $GTAdditionalImageAltText, $GTHeader, $GTDetails, $GTPersonName, $GTPersonDetails);

	print ("<div>");

	/* fetch values */
	while ($stmt->fetch()) {
		print ("<div class='col-md-10 mx-auto row py-md-4'>
    <div class='col-md-4'>
      <img class='cover mb-md-5 img-no-show' src='img/$GTImage'  alt='$GTHeader' Image title= '$GTHeader Image'>
      <img class='cover img-no-show' src='img/$GTAdditionalImage'  alt='$GTAdditionalImageAltText' title= '$GTAdditionalImageAltText Image'>
    </div>
     <div class='d-flex align-items-start flex-column col-md-7 ms-md-auto'>
       <h3 class='events-mobile-spacing header-blue'>$GTHeader</h3><p class='cover'>$GTDetails</p>
       <h4 class='header-blue'>$GTPersonName</h4><p>$GTPersonDetails</p>
     </div>
     </div>");
}
print ("</div>");

/* close statement */
$stmt->close();

} else {
print ("query failed");
}

print("</div>");

$conn->close();
?>
<?php
  print($htmlFooter);
?>
