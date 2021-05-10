<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Golf-A-Thon Charity Event | Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Join Neuro Assistance Foundation at Golf-A-Thon event to support peoeple with spinal injuries.">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">

     <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
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
if (isset($_GET['EID'])){
    $EID = intval($_GET['EID']);

	$sql = "SELECT EID, EName, EDate, EStart, EEnd, ELocation, FullDescription, ELinks, RegisterEvtBtn, DonateBtn, VolunteerBtn, SponsorBtn FROM Events Where EID=?";
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
	$stmt->bind_result($EID, $EName, $EDate, $EStart, $EEnd, $ELocation, $FullDescription, $ELinks, $RegisterEvtBtn, $DonateBtn, $VolunteerBtn, $SponsorBtn);
  if ($stmt->num_rows > 0){

    print("<div class='container'>");


    	print("<h1>Events</h1>");
	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
    print("<h2 class='blue-bar'>$EName</h2>
		<div class='col-12 mx-auto row py-4'>
    <div class='col-lg-4 h-100 pt-4 pb-1 px-4 me-3 mb-4 gray-bg'>
    <p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart -   $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p>
    <a class='mt-auto' href='$RegisterEvtBtn' target='_blank'><button type='button' class='btn cover btn-naf-blue mb-4'>EVENT DETAILS/ REGISTER</button></a>
    </div>
     <div class='d-flex align-items-start flex-column col-lg-7'>
     <p>$FullDescription</p>

     <div class='my-4 embed-responsive embed-responsive-16by9'>
      <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tVEOg0viAms' allowfullscreen></iframe>
     </div>
     </div>

     <div class='col-12 row d-flex flex-row justify-content-between'>
       <h2 class='blue-bar my-5'>Make your mark</h2>
       <div class = 'col-lg-4 col-12 px-3 mb-lg-0 mb-4 d-flex flex-column'>
         <p>We wouldn’t be able to accomplish what we do today without our volunteers. Whether you’re affected by spinal cord injury, know someone with SCI, or just someone who cares, we are thankful and appreciative of any time you can offer.</p>
         <a href='$VolunteerBtn' class='mt-auto'><button type='button' class='btn cover btn-naf-blue mb-4'>VOLUNTEER AT THIS EVENT</button></a>
       </div>
       <div class = 'col-lg-4 col-12 px-3 mb-lg-0 mb-4 d-flex flex-column'>
         <p>Since 2008, NAF has assisted people with spinal cord injuries on their journey to independence. Our sponsors help us with accomplishing our mission, and with your help, we can continue to reach over 28,000 Texans affected by SCI.</p>
         <a href='$SponsorBtn?Golf-A-Thon-Event-Sponsorship-Inquiry' class='mt-auto'><button type='button' class='btn cover btn-naf-secondary-btn mb-4'>SPONSOR THIS EVENT</button></a>
       </div>
       <div class='col-lg-3 col-12 px-3 d-flex flex-column'>
         <p>If you can't attend but would like to make a contribution, donate below.</p>
         <a href='$DonateBtn' class='mt-auto'><button class = 'btn cover btn-naf-secondary-btn mb-4'>DONATE NOW</button></a>
       </div>

     </div>");
}
print ("</div>");

print("<h2 class='blue-bar mb-5'>Photo Gallery</h2>

<div class='photo-gallery'>
        <div class='row text-center text-lg-left photos'>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-01.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-01.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-02.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-02.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-03.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-03.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-04.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-04.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-05.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-05.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-06.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-06.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-07.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-07.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-08.jpg' data-lightbox='photos'>
                  <img class='img-fluid' alt='Image from Golf A Thon event' src='img/events/golf-a-thon-gallery-08.jpg'>
                 </a>
           </div>
    </div>
</div>");

} else {
  print ("<div class='error'>Currently, no event is found for this category.  Please check back at a later time.</div>");
}
/* close statement */
$stmt->close();

} else {
print ("query failed");
}

print("</div>");

$conn->close();
}else{
    print ("<div class='error'>You did not select an event to view. Go back to the <a href=events.php>Events Page</a> or the <a href='index.php'>Home Page</a> to view an event.</div>");
  }
?>


</div>

<?php
  print($htmlFooter);
?>
