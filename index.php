<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
?>

<!doctype html>
<html lang="en">
  <head>
  <title>NAF | Spinal Cord Injury Assistance DFW </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="The Neuro Assistance Foundation is a non-profit organization dedicated to assisting spinal cord injured and disabled individuals in the Dallas/Fort Worth & Lubbock areas to achieve self-sufficiency and mobility through assistive vehicles, equipment, technology and home modifications.">
     <meta name="keywords" content=" wheelchair vans dallas tx, sci support, spinal cord injury, resources for paraplegics, nonprofit">
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

</div>
    <div class="container-fluid">

    <!-- hero banner  -->

    <div class="row p-5 text-white home-hero-wheelchair-img">
      <div class="col-12 home-hero text-center">
        <h3 class="text-light text-center fs-1 mt-5">One cause, One goal</h3>
        <p class="lead my-3 text-naf-white">A better life and a win for everyone.</p>
        <a href="donate.php" alt="Donate to NAF"><button class="btn-transparent-white px-3 mb-4"><strong>GIVE NOW</strong></button></a>
      </div>
    </div>



  </div>
    <!-- our misson  -->
    <div class="container">

      <div class="row">
          <div class="d-flex align-items-center col-lg-6 col-md-6">
            <div class="mission mt-3 mb-0 mx-lg-5 ml-md-2 ml-0 pl-md-3 pr-md-1 pl-4 pr-4">
                <h2 class="text-naf-blue"><strong>Our Mission</strong></h2>
                <p>We are dedicated to assisting spinal cord injured and disabled individuals in the Dallas/Fort Worth area to achieve self-sufficiency and mobility through assistive vehicles, equipment, technology and home modifications.</p>
                <a href="about.php" alt="Learn More About NAF"class="btn btn-naf-blue btn-tablet-mobile-full">LEARN MORE</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mt-4 mb-3">
            <div class="mx-4 mt-md-4 p-lg-5 pt-4 p-3 bg-naf-blue row">
              <img class="col-lg-6 col-md-6 mx-auto w-50 h-50" src="img/home-texas-flag.svg">
              <div class="col-lg-6 col-md-6 d-flex align-items-center">
                  <div class="mx-auto my-3" id="home-texas-flag">
                    <h3 class="text-light text-center fs-1">12 years</h3>
                    <p class="text-light text-center fs-6">of service to the community</p>
                  </div>
              </div>
            </div>

          </div>
      </div>

      <!-- Events Start -->
      <h2 class='blue-bar'>Upcoming Events</h2>

      <?php
      	$sql = "SELECT EID, EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, ELinks, RegisterEvtBtn FROM Events WHERE EDate >= CAST(CURRENT_TIMESTAMP as DATE) LIMIT 3";

      /* create a prepared statement */
      $stmt = $conn->stmt_init();

      if ($stmt->prepare($sql)) {

      	/* execute statement */
      	$stmt->execute();

      	/* bind result variables */
      	$stmt->bind_result($EID, $EImagePreview, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $ELinks, $RegisterEvtBtn);

        $stmt -> store_result();

      	print ("<div class='col-md-12 d-flex flex-md-row flex-column'>");
        $date=date('l\,\ F jS\,\ Y', strtotime($EDate));
        $timeStart=date('g:i A', strtotime($EStart));
        $timeEnd=date('g:i A', strtotime($EEnd));
      	/* fetch values */
      	while ($stmt->fetch()) {
          if ($stmt->num_rows > 1) {
            print ("<div class='d-flex flex-column col-md-4 mb-lg-5 mt-lg-0 mb-lg-0 mt-md-3 mb-md-4 mt-sm-3 my-sm-0 my-4'>
              <a href='$ELinks?EID=$EID'><img class='w-100' src='img/$EImagePreview'  alt='Image of $EName Event' title= 'Image of $EName Event'></a>
             <h3 class='events-mobile-spacing header-blue mt-3 mb-4'>$EName</h3><p class='cover'><i class='fa fa-calendar-o event-icon' aria-hidden='true'></i> $date<br><i class='fa fa-clock-o event-icon' aria-hidden='true'></i> $timeStart - $timeEnd<br><i class='fa fa-map-marker event-icon' aria-hidden='true'></i> $ELocation</p><p>$EDescriptionPreview</p>

             <div class='w-100 mt-auto'>
              <a href='$ELinks?EID=$EID'>
              <button type='button' alt='Click to View Event' class='btn btn-naf-secondary-btn w-100 mb-3'>VIEW EVENT</button></a></div>

              <a href='$RegisterEvtBtn' target='_blank'>
              <button type='button' alt='Click to Register for Event' class='btn btn-naf-primary-btn w-100 mt-auto mb-md-1 mb-sm-5'>REGISTER</button></a>
             </div>");
          }else if ($stmt->num_rows > 0){
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
          }}if ($stmt->num_rows == 0) {
            print ("<div class='col-md-10 mx-auto row py-4'>
              <p class='text-center'>There are currently no upcoming events. View our <a href='events.php'>past events here</a>.</p>
             </div>");
          }
      print("</div>");
      /* close statement */
      $stmt->close();

      } else {
      print ("query failed");
      }


      $conn->close();
      ?>
      <!-- Events End -->


       <!-- hero banner 2 - Inspiring Limitless Independece  -->
      <div class="row home-inspiring-independence-img p-5">
          <div class="col-lg-6"></div>
          <div class="col-lg-6 rounded clear-bg p-4 border-0 opacity-50">
             <h3 class="text-naf-white">Inspiring Limitless Independence</h3>
             <p class="my-3 text-naf-white">NAF provides the tools and assistance necessary for our clients to
              achieve limitless independence. Our services are a small investment in comparison to the independence and pride experienced by those we help. What greater gift can be given to someone whose mobility has been lost?</p>
          </div>
     </div>

   <!-- Three client buttons  -->

       <div class ="row pv-5">
           <div class="col-lg-4 col-md-12 text-center">
                <a class="btn btn-naf-blue btn-same-size m-2 fw-800" alt="Application for Spinal Cord Injury Resources and Assistance" href="client-application.php"><i class="fa fa-hands-helping text-light"></i> Request Assistance</a>
           </div>
         <div class="col-lg-4 col-md-12 text-center">
                <a class="btn btn-naf-blue btn-same-size m-2 fw-800" href="resources.php" alt="Resources for SCI support and paralysis"><i class="fa fa-book text-light"></i> Resources</a>
           </div>
          <div class="col-lg-4 col-md-12 text-center">
                <a class="btn btn-naf-blue btn-same-size m-2 fw-800" alt="More Information about Spinal Cord Injuries" href="spinal-cord-injury.php"><i class="fa fa-info-circle text-light"></i> Spinal Cord Injuries</a>
           </div>

      </div>

   <!-- numbers and circle  -->
     <div class="row home-stats-img">
        <div class ="col-lg-8 col-md-12 block d-flex justify-content-between wrap my-5">
          <div class="row px-4">
                <div class="col-lg-4">
                    <div class="circle shadow p-2">
                        <p><span class="fs-x2 fw-800">1 in 50</span><br>
                        <span class="fs-6">Americans are living with paralysis</span></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="circle shadow p-2">
                        <p><span class="fs-x2 fw-800">5.6M</span><br>
                        <span class="fs-6">Americans are paralyzed</span></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                  <div class="circle shadow p-3">
                      <p><span class="fs-x2 fw-800">1.3M</span><br>
                      <span class="fs-6">Americans have a spinal cord injury</span></p>
                </div>
              </div>
          </div>
        </div>
        <div col-lg-4></div>
     </div>

   <!-- SPI fact -->
       <div class ="row pv-5">
          <div class="col-12 text-center">
            <h4 class="fw-800 fs-x2"><span class="text-naf-blue">Over 28,000</span> spinal cord injured people in Texas</h4>
          </div>
       </div>

         <!-- Make a difference  -->
        <div class ="row pv-4 bg-naf-blue">
          <div class="col-lg-4 col-md-12 d-flex align-items-center justify-content-center text-center">
            <h2 class="mx-5 text-light fw-800">Make a difference</h4>
          </div>
           <div class="col-lg-4 col-md-6 text-center">
            <a href="volunteer.php" alt="Application to Voulenteer with NAF" class="btn btn-same-size clear-bg m-2  fw-800">Volunteer Opportunities</a>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="donate.php" alt="Donate to NAF" class="btn clear-bg btn-same-size  m-2 fw-800">Donate</a>
          </div>
       </div>

     <!-- Testimonials Start -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">


            <div class="carousel-item active">
              <div class="d-flex justify-content-center m-5">
                <div class="card p-5 shadow" style="width: 40rem;">
                  <div class="card-body">

                      <img src="img/testimonials/thomas.jpg" alt="Picture of Thomas" height="200px" class="mx-auto rounded-circle d-block img-no-show">

                      <h4 class="card-title text-center fw-800 text-naf-blue mt-4 mb-3">Thomas</h4>

                      <p class="card-text text-center">
                      "You know, in today's world, so much is just crazy and beyond understanding. It's really great when I come across people and organizations that are genuinely helping to make things better, and you guys are doing that. Thanks again, and keep it up!"
                      <br><br>
                      - Thomas, 49, living with quadriplegia from mountain biking accident</p>

                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="d-flex justify-content-center m-5">
                <div class="card p-5 shadow" style="width: 40rem;">
                  <div class="card-body">

                      <img src="img/testimonials/travis-d.jpg" alt="Picture of Travis" height="200px" class="mx-auto rounded-circle d-block img-no-show">

                      <h4 class="card-title text-center fw-800 text-naf-blue mt-4 mb-3">Travis</h4>

                      <p class="card-text text-center">
                      "Thank you from the bottom of our hearts for your help. You have truly made our lives more bearable. Now it will not feel like Travis is a prisoner in our home."
                      <br><br>
                      - Cheryl D., Travis' mother</p>

                  </div>
                </div>
              </div>
            </div>


            <div class="carousel-item">
              <div class="d-flex justify-content-center m-5">
                <div class="card p-5 shadow" style="width: 40rem;">
                  <div class="card-body">

                      <img src="img/testimonials/adrienne.jpg" alt="Picture of Adrienne" height="200px" class="mx-auto rounded-circle d-block img-no-show">

                      <h4 class="card-title text-center fw-800 text-naf-blue mt-4 mb-3">Adrienne</h4>

                      <p class="card-text text-center">
                      "Thanks a million for the standing frame! My family has been praying God would provide one for us since February! Answered prayer indeed. I appreciate Neuro Assistance Foundation more than I can explain!"
                      <br><br>
                      - Adrienne, 23, living with quadriplegia</p>

                  </div>
                </div>
              </div>
            </div>


            <div class="carousel-item">
              <div class="d-flex justify-content-center m-5">
                <div class="card p-5 shadow" style="width: 40rem;">
                  <div class="card-body">

                      <img src="img/testimonials/terri-y.jpg" alt="Picture of Terri" height="200px" class="mx-auto rounded-circle d-block img-no-show">

                      <h4 class="card-title text-center fw-800 text-naf-blue mt-4 mb-3">Terri</h4>

                      <p class="card-text text-center">
                      "I never thought I'd be able to have a van like this. I feel like I have an angel on my shoulder whenever I drive it!"
                      <br><br>
                      - Terri</p>

                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="d-flex justify-content-center m-5">
                <div class="card p-5 shadow" style="width: 40rem;">
                  <div class="card-body">

                      <img src="img/testimonials/keith-m.jpg" alt="Picture of Keith" height="200px" class="mx-auto rounded-circle d-block img-no-show">

                      <h4 class="card-title text-center fw-800 text-naf-blue mt-4 mb-3">Keith</h4>

                      <p class="card-text text-center">
                      "A car accident in 2018 left me with a dislocated shoulder, collapsed lung, lacerated kidney, and broken ribs, hip, and pelvis. My left leg was amputated at the hip. After I woke up from a 9-day coma, I was paralyzed for the first 8 weeks. I was fitted with a basic and uncomfortable wheelchair. NAF helped with out with a "real" wheelchair and didn't ask for anything in return. Words can not express the appreciation and gratitude that I have for you."
                      <br><br>
                      - Keith, 52, Army Veteran</p>

                  </div>
                </div>
              </div>
            </div>


  </div>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="false"><i class="fa fa-chevron-right"></i></span>
    <span class="visually-hidden">Previous</span>
  </button>


  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
     <span class="carousel-control-prev-icon" aria-hidden="false"><i class="fa fa-chevron-left"></i></span>>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<button class="btn btn-naf-blue m-4 px-3 py-2 mx-auto d-block btn-tablet-mobile-full"><a class="text-naf-white text-decoration-none" href="testimonials.php">VIEW MORE TESTIMONIALS</a></button>
<!-- Testimonials End -->

 </div>

<?php
  print($htmlFooter);
?>
