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
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
    print("<h2 class='resources-heading'>$EName</h2>
    <br>");
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-4'>
    <p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart -   $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p>
    <a class='mt-auto' href='$RegisterEvtBtn'><button>EVENT DETAILS/ REGISTER</button></a>
    </div>
     <div class='d-flex align-items-start flex-column col-md-8'>
     <p>$EDescriptionPreview</p>
     <table class='table'>
      <tr>
        <th>Run</th>
        <th>Registered by April 8</th>
        <th>Registered after April 8</th>
      </tr>

      <tr>
        <td>5K</td>
        <td>$30</td>
        <td>$35</td>
      </tr>

      <tr>
        <td>10K</td>
        <td>$35</td>
        <td>$40</td>
      </tr>

      <tr>
        <td>Youth 5K & 1Mile (12 and under)</td>
        <td>$15</td>
        <td>$20</td>
      </tr>

      <tr>
        <td>Handcycle 5K & 10K*</td>
        <td>FREE</td>
        <td>FREE</td>
      </tr>

      <tr>
        <td>Virtual Run</td>
        <td>$30</td>
        <td>$35</td>
      </tr>
     </table>
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
