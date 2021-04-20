<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<?php
print("<div class='container'>");


	print("<h1 class='my-5 text-center header-blue'>Testimonials</h1>

  <h2 class='resources-heading'>NAF helped 161 clients in 2020!</h2>
  <br>");

	$sql = "SELECT TID, TDate, TName, TDetails, TImage FROM Testimonials ORDER BY TDate DESC";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($TID, $TDate, $TName, $TDetails, $TImage);

	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('F Y', strtotime($TDate));
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-4'>
      <img class='cover' src='img/testimonials/$TImage'  alt='Image of $TName' title= 'Image of $TName'>
    </div>
     <div class='d-flex align-items-start flex-column col-md-6'>
     <h3 class='events-mobile-spacing header-blue'>$TName</h3><p class='cover'>$date</p><p>$TDetails</p>
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
