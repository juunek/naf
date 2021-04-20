<?php
  include("shared.php");
  print($htmlNav);
?>

<div class="container">

      <h1 class="my-5 text-center text-naf-blue">Community</h1>



  <!-- Carousel -->
  <h2 class="resources-heading bg-naf-blue fw-800">Testimonials</h2>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center m-5">
            <div class="card p-5 shadow" style="width: 40rem;">
              <div class="card-body">
                <img src="img/staff-1.jpg" height="200px" class="mx-auto d-block rounded-circle mb-4">
                <h4 class="card-title text-center fw-800 text-naf-blue mb-2">Thomas 1</h4>

                <p class="card-text text-center">"You know, in today's world, so much is just crazy and beyond understanding. It's really great when I come across people and organizations that are genuinely helping to make things better, and you guys are doing that. Thanks again, and keep it up!"<br>- Thomas, age 49, living with quadriplegia from mountain biking accident</p>

              </div>
            </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center m-5">
        <div class="card p-5 shadow" style="width: 40rem;">
        <div class="card-body">
          <img src="img/staff-1.jpg" height="200px" class="mx-auto d-block rounded-circle mb-4">
          <h4 class="card-title text-center fw-800 text-naf-blue mb-2">Thomas 2</h4>
          <p class="card-text text-center">"You know, in today's world, so much is just crazy and beyond understanding. It's really great when I come across people and organizations that are genuinely helping to make things better, and you guys are doing that. Thanks again, and keep it up!"<br>- Thomas, age 49, living with quadriplegia from mountain biking accident</p>

        </div>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center m-5">
        <div class="card p-5 shadow" style="width: 40rem;">
        <div class="card-body">
           <img src="img/staff-1.jpg" height="200px" class="mx-auto d-block rounded-circle mb-4">
           <h4 class="card-title text-center fw-800 text-naf-blue mb-2">Thomas 3</h4>

           <p class="card-text text-center">"You know, in today's world, so much is just crazy and beyond understanding. It's really great when I come across people and organizations that are genuinely helping to make things better, and you guys are doing that. Thanks again, and keep it up!"<br>- Thomas, age 49, living with quadriplegia from mountain biking accident</p>

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

<button class="btn-naf-blue m-4 p-2 mx-auto d-block"><a class="text-naf-white text-decoration-none" href="testimonials.php">TESTIMONIALS</a></button>
  <!-- Giving Thanks -->

  <h2 class="resources-heading bg-naf-blue fw-800">Giving Thanks</h2>

  <div class="row m-4">

    <div class="col-md-6">
        <img src="img/giving-thanks-chernosky-van.jpg" width="90%" class="m-4">
    </div>

    <div class='d-flex align-items-start flex-column col-md-6'>
       <h3 class='events-mobile-spacing header-blue'>Adaptive Van Donation in Memory of Dr. Martin Chernosky</h3>
       <p class='cover'>NAF was extremely honored to receive an adaptive minivan as a donation in December, 2010. The donor is Mrs. Jean Hancock Chernosky of Houston and the van was donated in memory of her late husband, Dr. Marvin Chernosky.</p>

       <div class='flex-column w-100 mt-auto'>
          <a class='events-btn-padding-right' href='volunteer.php'>
            <button type='button' class='btn btn-naf-primary-btn w-100'>VIEW MORE</button>
          </a>
       </div>
     </div>
   </div>


</div>

</div>




<?php
  print($htmlFooter);
?>
