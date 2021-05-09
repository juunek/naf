<?php include("shared.php");?>

<!doctype html>
<html lang="en">
  <head>
  <title>Volunteer | Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Volunteer to work with Neuro Assistance Foundation, a non-profit charity that helps people find resources for spinal cord injuries.">
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

    <!-- our mission and vision  -->
    <h1>Volunteer</h1>

    <div class="row mb-4">
        <div class="col-md-10 mx-auto">


        <div class="row mr-md-2" id="volunteer-banner">

           <img src="img/volunteer.png" width="100%" id="volunteer-img">

          <div class="col-md-12 bg-naf-blue pt-4" id="volunteer-text">
              <h4 class="fw-800 mt-4">Volunteer today! You CAN make a difference!</h4>
              <p class="text-white">Volunteers are vital to the mission of Neuro Assistance Foundation. We are looking for volunteers in numerous capacities. Whether you would like to assist with a special NAF event, spread the word about NAF, or help us raise valuable financial support—we need your help!</p>
          </div>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="row">
                    <div class="col-2 mx-1">
                      <i class="fas fa-quote-left" id="volunteer-quote-img"></i>
                    </div>

                    <div class="col-9 mx-1 mb-2">
                         <p id="quote-volunteer">It is one of the most beautiful compensations of life, that no man can sincerely try to help another without helping himself.</p>
                         <p class="fs-5">Ralph Waldo Emerson </p>
                    </div>
              </div>
            </div>
         </div>


         </div>
    </div>
    <div class="row">

         <div class="col-md-10 mx-auto">

            <form id="volunteerForm" action="" method="post" class="px-4 pt-4 pb-0 shadow rounded-3">
              <h4 class="fw-800 text-naf-blue mb-3">Volunteer Interest</h4>
              <p class="text-danger">*Required fields</p><br>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstnameDonation" id="inputFirstnameVolunteerLabel">First name*</label>
                        <input type="text" class="form-control" name="firstname" id="inputFirstnameVolunteer" placeholder="First name">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastnameVolunteer" id="inputLastnameVolunteerLabel">Last name*</label>
                        <input type="text" class="form-control" name="lastname" id="inputLastnameVolunteer" placeholder="Last name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmailVolunteer" id="inputEmailVolunteerLabel">Email address*</label>
                        <input type="text" class="form-control" id="inputEmailVolunteer" placeholder="Email address">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPhoneNumberVolunteer" id="inputPhoneNumberVolunteerLabel">Phone number (optional)</label>
                        <input type="text" class="form-control" id="inputPhoneNumberVolunteer" placeholder="10-digit phone number">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputSubjectVolunteer" id="inputSubjectVolunteerLabel">Subject*</label>
                        <input type="text" class="form-control" id="inputSubjectVolunteer" value="I'm interested in volunteering for NAF">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputMessageVolunteer" id="inputMessageVolunteerLabel">Message*</label>
                        <textarea class="form-control" id="inputMessageVolunteer" placeholder=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 pt-4">
                     <button type="submit" name="submit" value="Submit" id="submitVolunteer" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue rounded-2 btn-block py-2 fs-5">SEND MESSAGE</button>
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
