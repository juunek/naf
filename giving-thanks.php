<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
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
