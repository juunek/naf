<?php include("shared.php");?>

<!doctype html>
<html lang="en">
  <head>
  <title>Contact | Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact Neuro Assistance Foundation for assistance with wheelchair vans Dallas tx, spinal cord injuries, SCI resources, and resrouces for paraplegics. ">
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

<div class="container">
<script type="text/javascript" src="js/contactform.js"></script>

 <h1>Contact Us</h1>

<!-- Contact Us -->

  <div class="row m-4">
      <div class="col-md-8 mx-auto">
        <div>
          <p>We are happy to answer any questions you may have about our organization, the services we offer,  or any other inquires.</p>
          <p class="text-danger">*Required Fields</p>
      </div>
    </div>
  </div>

  <div class="row">

     <div class="col-md-8 mx-auto">
        <form id="contactForm" action="contact_post.php" method="post" class="p-3 shadow">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputFirstnameContact" id="inputFirstnameContactLabel">First name*</label>
                    <input type="text" class="form-control" name="firstname" id="inputFirstnameContact" placeholder="First name">
                </div>
                <div class="col-sm-6">
                    <label for="inputLastnameContact" id="inputLastnameContactLabel">Last name*</label>
                    <input type="text" class="form-control" name="lastname" id="inputLastnameContact" placeholder="Last name">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputEmailContact" id="inputEmailContactLabel">Email Address*</label>
                    <input type="email" class="form-control" name="email" id="inputEmailContact" placeholder="Email address">
                </div>
                <div class="col-sm-6">
                    <label for="inputPhoneNumberContact" id="inputPhoneNumberContactLabel">Phone Number (optional)</label>
                    <input type="phone" class="form-control"name="phone" id="inputPhoneNumberContact" placeholder="1234567890">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputSubjectContact" id="inputSubjectContactLabel">Subject*</label>
                    <input type="text" class="form-control" name="subject" id="inputSubjectContact" placeholder="Subject">
              </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputMessageContact" id="inputMessageContactLabel">Message*</label>
                    <textarea class="form-control" id="inputMessageContact" name="message" placeholder="Type your message here"></textarea>
              </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                 <button type="submit" name="submit" value="Submit" id="submitContact" class="btn-naf-blue btn-block py-2 fs-5">SEND MESSAGE</button>
                 <br>
               </div>
            </div>

        </form>

        <br>
        <div id="response">

        </div>
</div>

<br>

</div>
</div>




<?php
  print($htmlFooter);
?>
