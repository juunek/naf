<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<main>
<?php
print("<div class='container'>");


	print("<h1 class='my-5 text-center'>Events</h1>

  <h2 class='resources-heading'>Upcoming Events</h2>
  <br>");

	$sql = "SELECT EID, EImage, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks FROM Events";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($EID, $EImage, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks);

	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-6'>
      <img class='cover' src='img/$EImage'  alt='Image of $EName Event' title= 'Image of $EName Event'>
    </div>
     <div class='d-flex align-items-start flex-column col-md-6'>
     <h3>$EName</h3><p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $EDate<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $EStart - $EEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p><p>$EDescriptionPreview</p>
     <a class='mt-auto' href='$ELinks?EID=$EID'><button>View Event</button></a>
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
</main>
<?php
  print($htmlFooter);
?>
