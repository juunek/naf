<?php
  include("shared.php");
  print($htmlNav);
?>

<div class="container">


 <h1 class="my-5 text-center text-naf-blue">Contact Us</h1>

<!-- Contact Us -->

  <div class="row m-4">
      <div class="col-md-10 mx-auto">
        <div>
          <p>We are happy to answer any questions you may have about our organization, the services we offer,  or any other inquires.</p>
          <p>*Required Fields</p>
      </div>
    </div>
  </div>

  <div class="row">

     <div class="col-md-10 mx-auto">
        <form id="contactForm" action="" method="post" class="p-3 shadow">
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
                    <input type="text" class="form-control" id="inputEmailContact" placeholder="abc@xyz.com">
                </div>
                <div class="col-sm-6">
                    <label for="inputPhoneNumberContact" id="inputPhoneNumberContactLabel">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhoneNumberContact" placeholder="123 456 7890">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputSubjectContact" id="inputsubjectContactLabel">Subject*</label>
                    <input type="text" class="form-control" id="inputSubjectContact" placeholder="">
              </div>
            </div>
 
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputMessageContact" id="inputMessageContactLabel">Message*</label>
                    <input type="text" class="form-control" id="inputMessageContact" placeholder="">
              </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                 <button type="submit" name="submit" value="Submit" id="submitContact" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue btn-block py-2 fs-5">SEND MESSAGE</button>
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




<?php
  print($htmlFooter);
?>
