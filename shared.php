<?php

function GoToNow ($url){
    echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
}



$htmlNav= "
<body>

<button onclick='topFunction()' id='goTop' title='Back to top of page'><i class='fa fa-angle-double-up'></i></button>

<div class='container'>

<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='navbar'>

    <a href='index.php' class='navbar-brand'>
      <img src='img/naf-logo.png' height='86px' alt='Neuro Assistance Foundation Home' id='navbar-brand-img'>
    </a>
    <div class='d-flex flex-row'>
    <a class='text-decoration-none' href='donate.php'><button class='btn btn-naf-blue' id='btn-donate-tablet' href='#'><strong>DONATE</strong></button></a>

    <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>
      <span class='navbar-toggler-icon'></span>
    </button>
    </div>

    <div class='collapse navbar-collapse d-flex-lg justify-content-end' id='navbarCollapse'>
        <div class='navbar-nav'>

             <div class='nav-item dropdown'>
                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>About</a>
                <div class='dropdown-menu'>
                    <a href='about.php' class='dropdown-item'>About</a>
                    <a href='contact.php' class='dropdown-item'>Contact</a>
                    <a href='join-email.php' class='dropdown-item'>Join Email List</a>
                </div>
            </div>

            <div class='nav-item dropdown'>
                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Community</a>
                <div class='dropdown-menu'>
                    <a href='community.php' class='dropdown-item'>Community</a>
                    <a href='testimonials.php' class='dropdown-item'>Testimonials</a>
                    <a href='giving-thanks.php' class='dropdown-item'>Giving Thanks</a>
                    <a href='newsletter.php' class='dropdown-item'>Newsletter</a>
                </div>
            </div>

          <div class='nav-item dropdown'>
              <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Events</a>
              <div class='dropdown-menu'>
                  <a href='events.php' class='dropdown-item'>Events</a>
                  <a href='events-cinco-de-mayo.php?EID=1' class='dropdown-item'>Cinco De Mayo</a>
                  <a href='events-hot-hatch.php?EID=2' class='dropdown-item'>Annual Hot Hatch</a>
                  <a href='events-naf-topgolf.php?EID=3' class='dropdown-item'>NAF Top Golf</a>
                  <a href='events-golf-a-thon.php?EID=4' class='dropdown-item'>Golf-A-Thon</a>
              </div>
          </div>

          <div class='nav-item dropdown'>
              <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Resources</a>
              <div class='dropdown-menu'>
                  <a href='resources.php' class='dropdown-item'>Resources</a>
                  <a href='spinal-cord-injury.php' class='dropdown-item'>Spinal Cord Injury</a>
                  <a href='client-application.php' class='dropdown-item'>Request Assistance</a>
              </div>
          </div>

          <div class='nav-item dropdown'>
              <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Get Involved</a>
              <div class='dropdown-menu'>
                  <a href='get-involved.php' class='dropdown-item'>Get Involved</a>
                  <a href='volunteer.php' class='dropdown-item'>Volunteer</a>
              </div>
          </div>

            <a class='text-decoration-none' href='donate.php'><button class='btn btn-naf-blue ml-2' id='btn-donate-collapsemenu'><strong>DONATE</strong></button></a>

        </div>

    </div>
  </nav>
</div>";


$htmlFooter="<footer>
<div class='container-fluid mt-5'>

    <div class ='row bg-naf-blue p-lg-5'>


      <div class='col-lg-3 col-md-12 mb-4 footer-col d-flex flex-column order-lg-last' id='group-connect-join'>

              <div class='' id='footer-connect'>

                  
                  <h4 class='text-white connect-with-us fw-800'>Connect with us</h4>
                  

                  <div class ='social-media text-white'>
                        <a href='https://www.facebook.com/NeuroAssistanceFoundation/' target='_blank' alt='Neuro Assistance Foundation Facebook'><i class='fa fa-facebook-square fs-x2 mr-2'></i></a>
                        <a href='https://twitter.com/neuroassistance' target='_blank' alt='Neuro Assistance Foundation Twitter'><i class='fa fa-twitter mr-2 fs-x2'></i></a>
                        <a href='https://www.linkedin.com/company/neuro-assistance-foundation/' target='_blank' alt='Neuro Assistance Foundation LinkedIn'><i class='fa fa-linkedin fs-x2'></i></a>

                </div>
             </div>

             <div class='order-md-last' id='footer-joiningemaillist-div'>

              <h4 class ='text-white fw-800 mb-3' id='footer-joiningemaillist-h4'>Join our email list</h4>

              <a href='join-email.php' alt='Join NAF Email List'><button type='button' class='btn btn-naf-white-squareCorner' id='footer-joiningemaillist-button'>JOIN EMAIL LIST</button></a>

            </div>
      </div>


      <div>
        <a class ='text-white my-4 fw-800 text-center fs-3' data-toggle='collapse' data-target='#footer-links' aria-expanded='true' aria-controls='footer-links' id='footer-dropdown'>

        Sitemap <i class='fa' aria-hidden='true'></i>

      </a>
      </div>
      <div class='col-lg-9 col-md-12 footer-links collapse show' id='footer-links'>
        <div class='row p-md-4 p-lg-0'>
            <div class='col-md-4 mb-4 footer-col'>
              <div class='d-flex flex-column'>
                <h4 class ='text-white my-4 fw-800'>About</h4>
                <a class='mb-2' href='about.php'>About</a>
                <a class ='mb-2' href='contact.php'>Contact Us</a>
                <a class='mb-2' href='testimonials.php'>Testimonials</a>
                <a class='mb-2' href='giving-thanks.php'>Giving Thanks</a>
                <a class='mb-2' href='newsletter.php'>Newsletter</a>
              </div>
            </div>

            <div class='col-md-4 mb-4 footer-col d-flex flex-column'>
              <div class='d-flex flex-column'>
              <h4 class ='text-white my-4 fw-800'>Community</h4>
              <a class='mb-2' href='community.php'>Community</a>
              <a  class='mb-2' href='get-involved.php'>Get Involved</a>
              <a class='mb-2' href='events.php'>Events</a>
              <a class='mb-2' href='volunteer.php'>Volunteer</a>
              <a class='mb-2' href='donate.php'>Donate</a>
            </div>
            </div>

            <div class='col-md-4 mb-4 footer-col d-flex flex-column'>
              <div class='d-flex flex-column'>
                  <h4 class ='text-white my-4 fw-800'>Resources</h4>
                  <a class='mb-2' href='resources.php'>Resources</a>
                  <a class='mb-2' href='spinal-cord-injury.php'>Spinal Cord Injuries</a>
                  <a class='mb-2' href='client-application.php'>Request Assistance</a>
                  <a class='mb-2' href='sitemap.php'>Sitemap</a>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class='row bg-naf-blue text-center'>
        <p class='text-center text-white m-0 pb-3' style='font-size:85%;'>© Neuro Assistance Foundation is a a 501(c)(3) Public Charity</p>
        <p class='text-center text-naf-white' style='font-size:75%;'>Brigade | For class use only | <a href='http://ctec4350.krk1266.uta.cloud/naf/login.php' class='text-naf-white text-decoration-none font-weight-bold' target='_blank' >Admin Login</a>
        </p>
    </div>




</div>

</footer>

     <script type=\"text/javascript\" src=\"js/bottomRun.js\"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js' integrity='sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf' crossorigin='anonymous'></script>

 </body>
</html>";
?>
