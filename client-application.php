<?php include("shared.php");?>

<!doctype html>
<html lang="en">
  <head>
  <title>Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <h1>Request Assistance</h1>

  <!--Local Resources -->

  <h2 class="blue-bar">Do you need assistance?</h2>
  <div class="col-11 mx-auto">
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

  <h2 class="blue-bar">Client Application</h2>
  <div class="col-10 mx-auto">
    <p>Thank you for your interest in NAF. To request assistance, please complete the application below. Applications must be completed by a physician, therapist, or hospital case manager, and clients must not have alternative means to receive assistance. We will contact you after the application is received.</p>
    <p class="text-danger">*Required Fields</p>
</div>

<div class="col-md-10 mx-auto mb-5">
  <form action="" method="post" class="p-3 shadow">
    <h3 class="text-naf-blue">Patient/Client Info</h3>
    <div class="from-group row">
      <div class="d-flex flex-column col-sm-6">
        <label>First Name*</label>
        <input type="text" class="form-control" id="client_firstname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Last Name*</label>
        <input type="text" class="form-control" id="client_lastname">
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-6">
        <label>Birthdate (mm/dd/yyyy)*</label>
        <input type="date" class="form-control" id="client_birthday">
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-12">
        <label>Street Address*</label>
        <input type="text" class="form-control" id="client_address">
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-6">
        <label>City*</label>
        <input type="text" class="form-control" id="client_city">
      </div>

      <div class="d-flex flex-column col-sm-3">
        <label>State*</label>
        <input type="text" class="form-control" id="client_state">
      </div>

      <div class="d-flex flex-column col-sm-3">
        <label>Zip Code*</label>
        <input type="text" class="form-control" id="client_zip">
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-6">
        <label>Patient has children at home*</label>
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

      <div class="d-flex flex-column col-sm-6">
        <label>Ages of Children</label>
        <input type="text" class="form-control" id="client_childrenAge">
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-12">
        <label>Describe spinal cord injury (level and cause, i.e., MVA, Fall, etc.). If not a traumatic injury, please explain*</label>
        <textarea name="client_explaination" class="form-control" id="client_explaination"></textarea>
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-12">
        <div class= "row">
        <label>Type of assistance requested*</label>
            <div class="col-sm-6">
              <input type="checkbox" name="client_assistType" value="client_assistType_home" id="client_assistType_home">
              <label for="client_assistType_home">Home Modifications</label>
            </div>
            <div class="col-sm-6">
              <input type="checkbox" name="client_assistType" value="client_assistType_mobility" id="client_assistType_mobility">
              <label for="client_assistType_mobility">Mobility Equipment</label>
          </div>
          <div class="col-sm-6">
            <input type="checkbox" name="client_assistType" value="client_assistType_catheters" id="client_assistType_catheters">
            <label for="client_assistType_catheters">Catheters</label>
          </div>
          <div class="col-sm-6">
            <input type="checkbox" name="client_assistType" value="client_assistType_other" id="client_assistType_other">
            <label for="client_assistType_other">Other</label>
        </div>
      </div>
    </div>
  </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-12">
        <label>Describe patient's needs in order of importance*</label>
        <textarea name="client_needs" class="form-control" id="client_needs"></textarea>
      </div>
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-6">
        <label>Patient discharge date (mm/dd/yyyy)</label>
        <input type="date" class="form-control" id="client_discharge">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Will patient be using catheters*</label>
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
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-3">
        <label>Is patient insured?*</label>
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

      <div class="d-flex flex-column col-sm-6">
        <label>Does patient have Medicare/Medicaid*</label>
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

      <div class="d-flex flex-column col-sm-3">
        <label>Is patient a veteran?*</label>
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
    </div>

    <div class="from-group row">
      <div class="d-flex flex-column col-sm-12">
        <label>Describe other program eligibility</label>
        <textarea name="client_eligibility" class="form-control" id="client_eligibility"></textarea>
      </div>
    </div>

    <h3 class="text-naf-blue">Social Worker Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-sm-6">
        <label>First Name</label>
        <input type="text" class="form-control" id="client_social_firstname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Last Name</label>
        <input type="text" class="form-control" id="client_social_lastname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Email Address</label>
        <input type="email" class="form-control" id="client_social_email">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Phone Number</label>
        <input type="tel" class="form-control" id="client_social_phone">
      </div>
    </div>

    <h3 class="text-naf-blue">Person Submitting Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-sm-6">
        <label>First Name</label>
        <input type="text" class="form-control" id="client_contact_firstname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Last Name</label>
        <input type="text" class="form-control" id="client_contact_lastname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Email Address</label>
        <input type="email" class="form-control" id="client_contact_email">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Phone Number</label>
        <input type="tel" class="form-control" id="client_contact_phone">
      </div>
    </div>

    <h3 class="text-naf-blue">Primary Contact Info</h3>
    <div class="row">
      <div class="d-flex flex-column col-sm-6">
        <label>First Name</label>
        <input type="text" class="form-control" id="client_primary_firstname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Last Name</label>
        <input type="text" class="form-control" id="client_primary_lastname">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Email Address</label>
        <input type="email" class="form-control" id="client_primary_email">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label>Phone Number</label>
        <input type="tel" class="form-control" id="client_primary_phone">
      </div>
    </div>

    <div class="row">
                    <div class="col-sm-12 pt-4">
                     <button type="submit" name="submit" value="Submit" id="submitDonation" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue btn-block py-2 fs-5">Submit Query</button>
                     <br>
                   </div>
     </div>


  </form>
</div>
</div>
<?php
  print($htmlFooter);
?>
