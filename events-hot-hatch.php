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

	$sql = "SELECT EID, EName, EDate, EStart, EEnd, ELocation, FullDescription, ELinks, RegisterEvtBtn, DetailsHeader1, Details1, DetailsHeader2, Details2, DonateBtn, VolunteerBtn, SponsorBtn FROM Events Where EID=?";
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
	$stmt->bind_result($EID, $EName, $EDate, $EStart, $EEnd, $ELocation, $FullDescription, $ELinks, $RegisterEvtBtn, $DetailsHeader1, $Details1, $DetailsHeader2, $Details2, $DonateBtn, $VolunteerBtn, $SponsorBtn);
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
    <br>");
		print ("<div class='col-md-10 col-12 mx-auto row py-4'>
    <div class='col-lg-4 h-100 me-3'>
    <div class='gray-bg pt-4 pb-1 px-4 mb-4'>
    <p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart -   $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p>
    <a class='mt-auto' href='$RegisterEvtBtn' target='_blank'><button type='button' class='btn cover btn-naf-blue mb-4'>REGISTER</button></a>
    </div>
    <div class='px-4 my-lg-5'>
      <h4 class='mb-lg-3'>Make your mark</h4>
      <p>Help us achieve our goal of assisting spinal cord injured and disabled individuals by volunteering for the $EName Event!</p>

      Without the efforts of our amazing volunteers, we wouldn’t be able to accomplish even a fraction of what we do today. Whether you’re a survivor, a co-survivor or just someone who cares, we’d be grateful for whatever time you have to offer. Our entire organization, your community and the next person affected by breast cancer thank you in advance.
      <a href='$VolunteerBtn' target='_blank'><button type='button' class='btn cover btn-naf-secondary-btn mb-4'>VOLUNTEER AT THIS EVENT</button></a>

      <p class='mt-lg-5'>Help us by sponsoring the $EName Event!</p>
      <a href='$SponsorBtn'><button type='button' class='btn cover btn-naf-secondary-btn mb-4'>SPONSOR THIS EVENT</button></a>
    </div>
    </div>
     <div class='d-flex align-items-start flex-column col-md-7'>
     <p>$FullDescription</p>
     <table class='table my-4'>
      <tr>
        <th class='header-blue'>Run</th>
        <th class='header-blue'>Registered by July 25</th>
        <th class='header-blue'>Registered from July 26 - August 18</th>
        <th class='header-blue'>Registered after August 18</th>
      </tr>

      <tr>
        <td>5K</td>
        <td>$30</td>
        <td>$35</td>
        <td>$45</td>
      </tr>

      <tr>
        <td>10K</td>
        <td>$40</td>
        <td>$45</td>
        <td>$55</td>
      </tr>

      <tr>
        <td>Youth 5K & 1Mile (12 and under)</td>
        <td>$20</td>
        <td>$25</td>
        <td>$30</td>
      </tr>

      <tr>
        <td>Handcycle 5K & 10K*</td>
        <td>FREE</td>
        <td>FREE</td>
        <td>FREE</td>
      </tr>

      <tr>
        <td>Virtual Run</td>
        <td>$35</td>
        <td>$40</td>
        <td>$40</td>
      </tr>
     </table>
     <h3 class='mt-3 header-blue'>$DetailsHeader1</h3><p>$Details1</p>
     <h3 class='mt-3 header-blue'>$DetailsHeader2</h3><p>$Details2</p>

     <p class='border-top mt-3 events-donate-spacing'>If you can't attend but would like to make a contribution, donate below.</p>
     <a href='$DonateBtn'><button class = 'btn cover btn-naf-blue mb-4'>DONATE NOW</button></a>
     </div>
     </div>");
}
print ("</div>");

print("<h2 class='blue-bar'>Photo Gallery</h2><br>

<div class='photo-gallery'>
        <div class='row text-center text-lg-left photos'>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-01.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-01.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-02.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-02.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-03.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-03.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-04.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-04.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-05.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-05.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-06.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-06.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-07.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-07.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/annual-hot-hatch-gallery-08.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/annual-hot-hatch-gallery-08.jpg'>
                 </a>
           </div>
    </div>
</div>");

print("<h2 class='blue-bar'>Sponsors</h2><br>

<div class='row text-center text-lg-left'>

<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.bswrehab.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' id='myImg' src='img/events/sponsors-bsw.png' alt=''>
     </a>

</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://candrmedical.net' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-candr-medical-supplies.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.mobilityworks.com/locations/wheelchair-vans-for-sale-in-fort-worth-texas/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-mobility-works.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.nsm-seating.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-nsm.svg' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.unitedaccess.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-unitedaccess.png' alt=''>
     </a>
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
