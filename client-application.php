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

<div class="mb-5">
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
          <div class="d-flex flex-row">
            <div class="pe-5">
              <input type="radio" name="client_childrenHome" value="client_childrenHome_yes" id="client_childrenHome_yes">
              <label for="client_childrenHome_yes">Yes</label>
            </div>
            <div>
              <input type="radio" name="client_childrenHome" value="client_childrenHome_no" id="client_childrenHome_no">
              <label for="client_childrenHome_no">No</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-6">
        <label>Ages of Children</label>
        <input type="text" id="client_childrenAge">
      </div>

      <div class="d-flex flex-column col-12">
        <label>Describe spinal cord injury (level and cause, i.e., MVA, Fall, etc.). If not a traumatic injury, please explain</label>
        <textarea name="client_explaination" id="client_explaination"></textarea>
      </div>

      <div class="d-flex flex-column col-12">
        <label>Type of assistance requested</label>
          <div class="d-flex flex-row">
            <div class="col-3">
              <input type="checkbox" name="client_assistType" value="client_assistType_home" id="client_assistType_home">
              <label for="client_assistType_home">Home Modifications</label>
            </div>
            <div class="col-3">
              <input type="checkbox" name="client_assistType" value="client_assistType_mobility" id="client_assistType_mobility">
              <label for="client_assistType_mobility">Mobility Equipment</label>
          </div>
          <div class="col-3">
            <input type="checkbox" name="client_assistType" value="client_assistType_catheters" id="client_assistType_catheters">
            <label for="client_assistType_catheters">Catheters</label>
          </div>
          <div class="col-3">
            <input type="checkbox" name="client_assistType" value="client_assistType_other" id="client_assistType_other">
            <label for="client_assistType_other">Other</label>
        </div>
        </div>
      </div>

      <div class="d-flex flex-column col-12">
        <label>Describe patient's needs in order of importance</label>
        <textarea name="client_needs" id="client_needs"></textarea>
      </div>

      <div class="d-flex flex-column col-6">
        <label>Patient discharge date (mm/dd/yyyy)</label>
        <input type="date" id="client_discharge">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Will patient be using catheters</label>
            <div class="d-flex flex-row">
              <div class="pe-5">
                <input type="radio" name="client_catheterUse" value="client_catheterUse_yes" id="client_catheterUse_yes">
                <label for="client_catheterUse_yes">Yes</label>
              </div>
            <div>
              <input type="radio" name="client_catheterUse" value="client_catheterUse_no" id="client_catheterUse_no">
              <label for="client_catheterUse_no">No</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-4">
        <label>Is patient insured?</label>
          <div class="d-flex flex-row">
            <div class="pe-5">
              <input type="radio" name="client_insured" value="client_insured_yes" id="client_insured_yes">
              <label for="client_insured_yes">Yes</label>
            </div>
            <div>
              <input type="radio" name="client_insured" value="client_insured_no" id="client_insured_no">
              <label for="client_insured_no">No</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-4">
        <label>Does patient have Medicare/Medicaid</label>
          <div class="d-flex flex-row">
              <div class="pe-5">
                <input type="radio" name="client_medicare" value="client_medicare_yes" id="client_medicare_yes">
                <label for="client_medicare_yes">Yes</label>
              </div>
              <div class="pe-5">
                <input type="radio" name="client_medicare" value="client_medicare_no" id="client_medicare_no">
                <label for="client_medicare_no">No</label>
            </div>
            <div>
              <input type="radio" name="client_medicare" value="client_medicare_unsure" id="client_medicare_unsure">
              <label for="client_medicare_unsure">Awaiting Approval</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-4">
        <label>Is patient a veteran?</label>
          <div class="d-flex flex-row">
            <div class="pe-5">
              <input type="radio" name="client_veteran" value="client_veteran_yes" id="client_veteran_yes">
              <label for="client_veteran_yes">Yes</label>
            </div>
            <div>
              <input type="radio" name="client_veteran" value="client_veteran_no" id="client_veteran_no">
              <label for="client_veteran_no">No</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-12">
        <label>Describe other program eligibility</label>
        <textarea name="client_eligibility" id="client_eligibility"></textarea>
      </div>
    </div>

    <h3>Social Worker Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-6">
        <label>First Name</label>
        <input type="text" id="client_social_firstname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Last Name</label>
        <input type="text" id="client_social_lastname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Email Address</label>
        <input type="email" id="client_social_email">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Phone Number</label>
        <input type="tel" id="client_social_phone">
      </div>
    </div>

    <h3>Person Submitting Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-6">
        <label>First Name</label>
        <input type="text" id="client_contact_firstname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Last Name</label>
        <input type="text" id="client_contact_lastname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Email Address</label>
        <input type="email" id="client_contact_email">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Phone Number</label>
        <input type="tel" id="client_contact_phone">
      </div>
    </div>

    <h3>Primary Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-6">
        <label>First Name</label>
        <input type="text" id="client_primary_firstname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Last Name</label>
        <input type="text" id="client_primary_lastname">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Email Address</label>
        <input type="email" id="client_primary_email">
      </div>

      <div class="d-flex flex-column col-6">
        <label>Phone Number</label>
        <input type="tel" id="client_primary_phone">
      </div>
    </div>

    <div class="col-12">
		<input type="submit" value="Submit Query" name="client_submit" id="client_submit">
	</div>

  </form>
</div>
<?php
  print($htmlFooter);
?>
