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

	$sql = "SELECT EID, EName, EDate, EStart, EEnd, ELocation, FullDescription, ELinks, RegisterEvtBtn, DonateBtn FROM Events Where EID=?";
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
	$stmt->bind_result($EID, $EName, $EDate, $EStart, $EEnd, $ELocation, $FullDescription, $ELinks, $RegisterEvtBtn, $DonateBtn);
  if ($stmt->num_rows > 0){

    print("<div class='container'>");


    	print("<h1 class='my-5 text-center header-blue'>Events</h1>");
	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {
    $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
    $timeStart=date('g:i A', strtotime($EStart));
    $timeEnd=date('g:i A', strtotime($EEnd));
    print("<h2 class='resources-heading'>$EName</h2>
    <br>");
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-4 h-100 pt-4 pb-1 px-4 me-3 mb-4 gray-bg'>
    <p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart -   $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p>
    <a class='mt-auto' href='$RegisterEvtBtn' target='_blank'><button type='button' class='btn cover btn-naf-blue mb-4'>EVENT DETAILS/ REGISTER</button></a>
    </div>
     <div class='d-flex align-items-start flex-column col-md-7'>
     <p>$FullDescription</p>

     <div class='my-4 embed-responsive embed-responsive-16by9'>
      <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tVEOg0viAms' allowfullscreen></iframe>
     </div>

     <p class='border-top mt-3 events-donate-spacing'>If you can't attend but would like to make a contribution, donate below.</p>
     <a href='$DonateBtn' target='_blank'><button class = 'btn cover btn-naf-blue mb-4'>DONATE NOW</button></a>
     </div>
     </div>");
}
print ("</div>");

print("<h2 class='resources-heading'>Photo Gallery</h2><br>

<div class='photo-gallery'>
        <div class='row text-center text-lg-left photos'>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-01.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-01.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-02.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-02.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-03.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-03.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-04.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-04.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-05.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-05.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-06.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-06.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-07.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-07.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/golf-a-thon-gallery-08.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/golf-a-thon-gallery-08.jpg'>
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
</main>
<?php
  print($htmlFooter);
?>
