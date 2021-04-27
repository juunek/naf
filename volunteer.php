<?php
  include("shared.php");
  print($htmlNav);
?>

<div class="container">
    
    <!-- our mission and vision  -->
    <h1 class="my-5 text-center text-naf-blue">Volunteer</h1>

    <div class="row mb-4">
        <div class="col-md-10 mx-auto">

       
        <div class="row" id="volunteer-banner">
          
           <img src="img/volunteer.png" width="100%" id="volunteer-img">
          
          <div class="col-md-12 bg-naf-blue" id="volunteer-text">
              <h4>Volunteer today! You CAN make a difference!</h4>
              <p class="text-white">Volunteers are vital to the mission of Neuro Assistance Foundation. We are looking for volunteers in numerous capacities. Whether you would like to assist with a special NAF event, spread the word about NAF, or help us raise valuable financial support—we need your help!</p>
          </div>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="row">
                    <div class="col-sm-2">

                      <i class="fas fa-quote-left" id="volunteer-quote-img"></i>

                    </div>

                    <div class="col-sm-10">

                         <p id="quote-volunteer">It is one of the most beautiful compensations of life, that no man can sincerely try to help another without helping himself.</p>
                         <hr width="5%" height="2px"><p class="fs-4">Ralph Waldo Emerson </p>

                    </div>
              </div>
            </div>
         </div>


         </div>
    </div>
    <div class="row">
        
         <div class="col-md-10 mx-auto">
          
            <form id="volunteerForm" action="" method="post" class="p-3 shadow">
              <h4 class="fw-800 text-naf-blue my-3">Volunteer Interest</h4>
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
                        <label for="inputEmailVolunteer" id="inputEmailVolunteerLabel">Email Address*</label>
                        <input type="text" class="form-control" id="inputEmailVolunteer" placeholder="abc@xyz.com">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPhoneNumberVolunteer" id="inputPhoneNumberVolunteerLabel">Phone Number</label>
                        <input type="text" class="form-control" id="inputPhoneNumberVolunteer" placeholder="123 456 7890">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputSubjectVolunteer" id="inputSubjectVolunteerLabel">Subject*</label>
                        <input type="text" class="form-control" id="inputSubjectVolunteer" placeholder="123 456 7890">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputMessageVolunteer" id="inputMessageVolunteerLabel">Message*</label>
                        <input type="text" class="form-control" id="inputMessageVolunteer" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                     <button type="submit" name="submit" value="Submit" id="submitVolunteer" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue btn-block py-2 fs-5">SEND MESSAGE</button>
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
