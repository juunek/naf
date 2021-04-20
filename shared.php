<?php
$htmlNav= "<!doctype html>
<html lang='en'>
  <head>
  <title>Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap' rel='stylesheet'>

    <link rel='stylesheet' type='text/css' href='css/styles.css'>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css'>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

    <script src='https://kit.fontawesome.com/5d3977cc74.js' crossorigin='anonymous'></script>

    <script type='text/javascript' src='js/javascript.js'></script>



  </head>
<body>

<div class='container'>
<img height='86px'>
<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='navbar'>
    
    <a href='#' class='navbar-brand'>
      <img src='img/logo.png' alt='' height='70rem'>
    </a>
    <div class='d-flex flex-row'>
    <button class='btn btn-naf-blue ml-5' id='btn-donate-tablet' href='#'><strong>DONATE</strong></button>

    <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>
      <span class='navbar-toggler-icon'></span>
    </button>
    </div>

    <div class='collapse navbar-collapse d-flex-lg justify-content-end' id='navbarCollapse'>
        <div class='navbar-nav'>
           
             <div class='nav-item dropdown'>
                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>About</a>
                <div class='dropdown-menu'>
                    <a href='#' class='dropdown-item'>About</a>
                    <a href='#' class='dropdown-item'>Contact</a>
                    <a href='#' class='dropdown-item'>Join Email List</a>
                </div>
            </div>

              <div class='nav-item dropdown'>
                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Community</a>
                <div class='dropdown-menu'>
                    <a href='#' class='dropdown-item'>Community</a>
                    <a href='#' class='dropdown-item'>Testimonials</a>
                    <a href='#' class='dropdown-item'>Giving Thanks</a>
                    <a href='#' class='dropdown-item'>Newsletter</a>
                </div>
            </div>

            <a href='#' class='nav-item nav-link'>Events</a>

            <a href='#' class='nav-item nav-link'>Resources</a>

            <a href='#' class='nav-item nav-link'>Get Involved</a>

            <button class='btn btn-naf-blue ml-2' id='btn-donate-collapsemenu' href='#'><strong>DONATE</strong></button>

        </div>
        
    </div>
  </nav>
</div>";


$htmlFooter="<footer>
<div class='container-fluid'>

    <div class ='row bg-naf-blue p-lg-5'>


      <div class='col-lg-3 col-md-12 mb-4 footer-col d-flex flex-column order-lg-last' id='group-connect-join'>

              <div class='' id='footer-connect'>

                  <h4 class ='text-white my-4 fw-800'>Connect with us</h4>

                  <div class ='social-media text-white'>
                        <i class='fa fa-facebook-square fs-x2 mr-3'></i>
                        <i class='fa fa-linkedin fs-x2'></i>

                </div>
             </div>

             <div class='order-md-last' id='footer-joiningemaillist-div'>

              <h4 class ='text-white my-4 fw-800' id='footer-joiningemaillist-h4'>Join our email list</h4>

              <button type='button' class='btn-naf-white-squareCorner' id='footer-joiningemaillist-button'>JOIN EMAIL LIST</button>

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
                  <a  class='mb-2' href='spinal-cord-injury.php'>Spinal Cord Injuries</a>
                  <a class='mb-2' href='client-application.php'>Request Assistance</a>
                  <a class='mb-2' href='sitemap.php'>Sitemap</a>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class='row bg-naf-blue '>
         <p class='text-center text-white m-0 pb-5'> © Neuro Assistance Foundation is a a 501(c)(3) Public Charity</p>
    </div>

</div>

</footer>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf\" crossorigin=\"anonymous\"></script>
    <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js\"></script>
    <script src=\"js/modal.js\"></script>
 </body>
</html>";
?>
