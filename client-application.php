<?php
  include("shared.php");
  print($htmlNav);
?>
<div class="container">
  <h1 class="my-5 text-center">Request Assistance</h1>

  <!--Local Resources -->

  <h2 class="resources-heading">Do you need assistance?</h2>
  <br>
  <div class="test">
    <p>Are you living with a spinal cord injury, spinal cord disability, or congenital disorder (birth defect)? NAF's mission is to help with mobility equipment, home modifications, vehicle modifications and technology to ensure maximum independence and self-sufficiency for our clients.</p>
    <p>We assist people in the following Texas counties:</p>
    <div class="row pb-4">
      <div class="col-md-3 col-sm-3 col-6" id="sm-client-app-counties-first">
        <p>
          Austin<br>
          Bosque<br>
          Brazoria<br>
          Chambers<br>
          Collin<br>
          Cooke<br>
          Dallas<br>
          Delta<br>
          Denton
        </p>
      </div>
      <div class="col-md-3 col-sm-3 col-6" id="sm-client-app-counties-third">
        <p>
          Ellis<br>
          Erath<br>
          Fannin<br>
          Fort Bend<br>
          Galveston<br>
          Grayson<br>
          Harris<br>
          Henderson<br>
          Hill
        </p>
      </div>
      <div class="col-md-3 col-sm-3 col-6" id="sm-client-app-counties-second">
        <p>
          Hood<br>
          Hunt<br>
          Jack<br>
          Johnson<br>
          Kaufman<br>
          Liberty<br>
          Montague<br>
          Montgomery<br>
          Navarro
        </p>
      </div>
      <div class="col-md-3 col-sm-3 col-6" id="sm-client-app-counties-fourth">
        <p>
          Palo Pinto<br>
          Parker<br>
          Rains<br>
          Rockwall<br>
          Somervell<br>
          Tarrant<br>
          Van Zandt<br>
          Waller<br>
          Wise
        </p>
      </div>
    </div>
  </div>

  <h2 class="resources-heading">Client Application</h2>
  <br>
  <div class="test">
    <p>Thank you for your interest in NAF. To request assistance, please complete the application below. Applications must be completed by a physician, therapist, or hospital case manager, and clients must not have alternative means to receive assistance. We will contact you after the application is received.</p>
</div>

<div>
  <form action="" method="post">
    <h3>Patient/Client Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-6">
        <label>First Name</label>
        <input type="text" id="client_firstname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Last Name</label>
        <input type="text" id="client_lastname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Birthdate (mm/dd/yyyy)</label>
        <input type="date" id="client_birthday">
      </div>

      <div class="d-flex flex-column col-12">
        <label>Street Address</label>
        <input type="text" id="client_address">
      </div>

      <div class="d-flex flex-column col-6">
        <label>City</label>
        <input type="text" id="client_city">
      </div>

      <div class="d-flex flex-column col-3">
        <label>State</label>
        <input type="text" id="client_state">
      </div>

      <div class="d-flex flex-column col-3">
        <label>Zip Code</label>
        <input type="text" id="client_zip">
      </div>
      <div class="d-flex flex-column col-6">
        <label>Patient has children at home</label>
        <div class="d-flex flex-row justify-content-between">
          <div>
            <input type="radio" name="client_childrenHome" value="client_childrenHome_yes" id="client_childrenHome_yes">
            <label for="client_childrenHome_yes">Yes</label>
          </div>
          <div>
            <input type="radio" name="client_childrenHome" value="client_childrenHome_no" id="client_childrenHome_no">
            <label for="client_childrenHome_no">No</label>
        </div>
        </div>
      </div>
    </div>

  </form>
</div>
<?php
  print($htmlFooter);
?>