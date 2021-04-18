<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<main>
<?php
if (isset($_GET['EID'])){
    $EID = intval($_GET['EID']);

	$sql = "SELECT EID, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks, RegisterEvtBtn, DetailsHeader1, Details1, DetailsHeader2, Details2 FROM Events Where EID=?";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

/* bind the parameter onto the query*/
  $stmt->bind_param('i', $EID);

/* execute statement */
  $stmt->execute();

/* store result: this will allow the use of $stmt->num_rows (providing the number of the rows/records in the result set).  Note that num_rows is not used in this version. */
  $stmt->store_result();

  $stmt->execute();

/* store result: need to add this line before we use $stmt->num_rows*/
$stmt->store_result();

	/* bind result variables */
	$stmt->bind_result($EID, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks, $RegisterEvtBtn, $DetailsHeader1, $Details1, $DetailsHeader2, $Details2);
  if ($stmt->num_rows > 0){

    print("<div class='container'>");


    	print("<h1 class='my-5 text-center'>Events</h1>");

	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
    print("<h2 class='resources-heading'>$EName</h2>
    <br>");
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-4'>
    <p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $EDate<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $EStart - $EEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p>
    <a class='mt-auto' href='$RegisterEvtBtn'><button>EVENT DETAILS/ REGISTER</button></a>
    </div>
     <div class='d-flex align-items-start flex-column col-md-8'>
     <p>$EDescriptionPreview</p>
     <h3>$DetailsHeader1</h3><p>$Details1</p>
     <h3>$DetailsHeader2</h3><p>$Details2</p>
     </div>
     </div>");
}
print ("</div>");

} else {
  print ("<div class='error'>Currently, no record is found for this category.  Please check back at a later time.</div>");
}
/* close statement */
$stmt->close();

} else {
print ("query failed");
}

print("</div>");

$conn->close();
}else{
    print ("<div class='error'>You did not select an image to view. Go back to the <a href=books.php>Books Page</a> or the <a href='index.php'>Home Page</a> to view a book.</div>");
  }
?>
</main>
<?php
  print($htmlFooter);
?>
