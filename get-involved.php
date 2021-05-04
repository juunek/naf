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


	print("<h1>Get Involved</h1>

  <h2 class='blue-bar'>Upcoming Events</h2>");

	$sql = "SELECT EID, EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks, RegisterEvtBtn FROM Events WHERE EDate >= CAST(CURRENT_TIMESTAMP as DATE) LIMIT 3";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($EID, $EImagePreview, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks, $RegisterEvtBtn);

	print ("<div class='col-md-12 d-flex flex-md-row flex-column'>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
		print ("<div class='d-flex flex-column col-md-4 mb-lg-5 mt-lg-0 mb-lg-0 mt-md-3 mb-md-4 mt-sm-3 my-sm-0 my-4'>
      <a href='$ELinks?EID=$EID'><img class='w-100' src='img/$EImagePreview'  alt='Image of $EName Event' title= 'Image of $EName Event'></a>
     <h3 class='events-mobile-spacing header-blue mt-3 mb-4'>$EName</h3><p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart - $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p><p>$EDescriptionPreview</p>

     <div class='w-100 mt-auto'>
      <a href='$ELinks?EID=$EID'>
      <button type='button' class='btn btn-naf-secondary-btn w-100 mb-3'>VIEW EVENT</button></a></div>

      <a href='$RegisterEvtBtn' target='_blank'>
      <button type='button' class='btn btn-naf-primary-btn w-100 mt-auto mb-md-1 mb-sm-5'>REGISTER</button></a>
     </div>");
}
print ("</div>
<h2 class='blue-bar'>Volunteer</h2>
<br>
<div class='col-md-10 mx-auto row py-4'>
<div class='col-md-6'>
  <a href='volunteer.php'><img class='cover' src='img/become-a-volunteer.jpg'  alt='Image of volunteers at an event' title= 'Image of volunteers at an event'></a>
</div>
 <div class='d-flex align-items-start flex-column col-md-6'>
 <h3 class='events-mobile-spacing header-blue'>You CAN Make A Difference</h3><p class='cover'>Volunteers are vital to our mission. Whether you would like to assist with a special NAF event, spread the word about NAF, or help us raise valuable financial support - we need your help!</p>

 <div class='flex-column w-100 mt-auto'>
  <a class='events-btn-padding-right' href='volunteer.php'>
  <button type='button' class='btn btn-naf-primary-btn w-100'>BECOME A VOLUNTEER</button></a>
 </div>
 </div>
 </div>");

 print ("
 <h2 class='blue-bar'>Donate</h2>
 <br>
 <div class='col-md-10 mx-auto row py-4'>
 <div class='col-md-6'>
   <a href='donate.php'><img class='cover' src='img/make-a-donation.jpg'  alt='Image of person helped by donations' title= 'Image of person helped by donations'></a>
 </div>
  <div class='d-flex align-items-start flex-column col-md-6'>
  <h3 class='events-mobile-spacing header-blue'>Give Today</h3><p class='cover'>Whether it is a cash donation or donation of equipment, we humbly appreciate anything you can give to help make a positive impact.</p>

  <div class='flex-column w-100 mt-auto'>
   <a class='events-btn-padding-right' href='volunteer.php'>
   <button type='button' class='btn btn-naf-primary-btn w-100'>MAKE A DONATION</button></a>
  </div>
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
