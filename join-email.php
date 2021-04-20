<?php
  include("shared.php");
  print($htmlNav);
?>

<div class="container">


    <h1 class="my-5 text-center text-naf-blue">Join Email List</h1>

    <!-- Join Email List -->

      <div class="row m-4">
       <div class="col-md-6 mx-auto">
            <div>
              <p>Sign up to get interesting news, events and updates delivered to your inbox.</p>
              <p>*Required fields.</p>
            </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 mx-auto">
            <form id="contactForm" action="" method="post" class="p-3 shadow">

                <div class="form-group row">
                  <div class="col-sm-12">
                        <label for="inputFirstnameContact" id="inputFirstnameContactLabel">First name*</label>
                        <input type="text" class="form-control" name="firstname" id="inputFirstnameContact" placeholder="First name">
                    </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputLastnameContact" id="inputLastnameContactLabel">Last name*</label>
                        <input type="text" class="form-control" name="lastname" id="inputLastnameContact" placeholder="Last name">
                      </div>
                    </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputEmailContact" id="inputEmailContactLabel">Email Address*</label>
                        <input type="text" class="form-control" id="inputEmailContact" placeholder="abc@xyz.com">
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

</div>



<?php
  print($htmlFooter);
?>
