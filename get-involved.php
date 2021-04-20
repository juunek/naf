<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<?php
print("<div class='container'>");


	print("<h1 class='my-5 text-center'>Events</h1>

  <h2 class='resources-heading'>Upcoming Events</h2>
  <br>");

	$sql = "SELECT EID, EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks, RegisterEvtBtn FROM Events LIMIT 3";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($EID, $EImagePreview, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks, $RegisterEvtBtn);

	print ("<div><div class='col-md-12 d-flex flex-md-row flex-column py-4'>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
		print ("<div class='w-100'>
    <div class='col-12'>
      <img class='w-100' src='img/$EImagePreview'  alt='Image of $EName Event' title= 'Image of $EName Event'>
    </div>
     <div class='d-flex align-items-start flex-column col-12'>
     <h3 class='events-mobile-spacing'>$EName</h3><p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart - $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p><p>$EDescriptionPreview</p>

     <div class='w-100'>
      <a href='$ELinks?EID=$EID'>
      <button type='button' class='btn btn-naf-secondary-btn w-100 my-3'>VIEW EVENT</button></a>

      <a href='$RegisterEvtBtn' target='_blank'>
      <button type='button' class='btn btn-naf-primary-btn w-100 my-3'>REGISTER</button></a></div>
     </div>
     </div>");
}
print ("</div></div>
<h2 class='resources-heading'>Volunteer</h2>
<br>
<div class='col-md-6'>
  <img class='cover' src='img/volunteer.png'  alt='Image of volunteers at an event' title= 'Image of volunteers at an event'>
</div>
 <div class='d-flex align-items-start flex-column col-md-6'>
 <h3 class='events-mobile-spacing header-blue'>You CAN Make A Difference</h3><p class='cover'>Volunteers are vital to our mission. Whether you
would like to assist with a special NAF event,
spread the word about NAF, or help us raise
valuable financial support - we need your help!</p>

 <div class='flex-column w-100'>
  <a class='events-btn-padding-right' href='volunteer.php'>
  <button type='button' class='btn btn-naf-secondary-btn events-btn-width'>BECOME A VOLUNTEER</button></a>
 </div>
 </div>");

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
