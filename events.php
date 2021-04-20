<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<?php
print("<div class='container'>");


	print("<h1 class='my-5 text-center header-blue'>Events</h1>

  <h2 class='resources-heading'>Upcoming Events</h2>
  <br>");

	$sql = "SELECT EID, EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks, RegisterEvtBtn FROM Events";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($EID, $EImagePreview, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks, $RegisterEvtBtn);

	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-6'>
      <a href='$ELinks?EID=$EID'><img class='cover' src='img/$EImagePreview'  alt='Image of $EName Event' title= 'Image of $EName Event'></a>
    </div>
     <div class='d-flex align-items-start flex-column col-md-6'>
     <h3 class='events-mobile-spacing header-blue'>$EName</h3><p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart - $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p><p>$EDescriptionPreview</p>

     <div class='flex-xl-row flex-lg-column w-100'>
      <a class='events-btn-padding-right' href='$ELinks?EID=$EID'>
      <button type='button' class='btn btn-naf-secondary-btn events-btn-width'>VIEW EVENT</button></a>

      <a class='events-btn-padding-left' href='$RegisterEvtBtn' target='_blank'>
      <button type='button' class='btn btn-naf-primary-btn events-btn-width'>REGISTER</button></a></div>
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
