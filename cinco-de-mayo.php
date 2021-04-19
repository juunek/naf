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
    <a class='mt-auto' href='$RegisterEvtBtn' target='_blank'><button type='button' class='btn cover btn-naf-blue mb-4'>EVENT DETAILS/ REGISTER</button></a>
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

print("<h2 class='resources-heading'>Photo Gallery</h2><br>

<div class='photo-gallery'>
        <div class='row text-center text-lg-left photos'>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-01.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-01.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-02.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-02.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-03.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-03.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-04.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-04.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-05.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-05.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-06.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-06.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-07.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-07.jpg'>
                 </a>
           </div>

            <div class='col-sm-6 col-md-4 col-lg-3 item'>
                  <a href='img/events/cinco-de-mayo-gallery-08.jpg' data-lightbox='photos'>
                  <img class='img-fluid' src='img/events/cinco-de-mayo-gallery-08.jpg'>
                 </a>
           </div>
    </div>   
</div>");

print("<h2 class='resources-heading'>Sponsors</h2><br>

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
 <a href='https://craigranchfitness.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-craig-ranch.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://jeremiahsice.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-jeremiahsice.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.facebook.com/NickiNielsenLM/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-liberty-mutual.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.mobilityworks.com/locations/wheelchair-vans-for-sale-in-fort-worth-texas/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-mobility-works.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://movin-pictures.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-movin-pictures.jpg' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.nsm-seating.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-nsm.svg' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.playtri.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-playtri.png' alt=''>
     </a>
</div>
<div class='col-lg-3 col-md-4 col-6'>
 <a href='https://www.runwithstride.com/' target='_blank' class='d-block mb-4 h-100'>
       <img class='mw-100 sponsors-img-height' src='img/events/sponsors-stride.png' alt=''>
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
