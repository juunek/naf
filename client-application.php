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
   <script type="text/javascript" src="js/clientform.js"></script>
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

  <h2 class="blue-bar mb-4">Client Application</h2>
  <div class="col-md-10 col-12 mx-auto px-4">
    <p>Thank you for your interest in NAF. To request assistance, please complete the application below. Applications must be completed by a physician, therapist, or hospital case manager, and clients must not have alternative means to receive assistance. We will contact you after the application is received.</p>
    <p class="text-danger">*Required Fields</p>
 </div>


        <!-- strat heere------------------------------------------------------------------>
<div class="col-md-10 col-12 mx-auto mb-5">
          
<form id="clientForm" action="" method="post" class="px-4 pt-4 pb-0 shadow rounded-3">
    <h3 class="text-naf-blue">Patient/Client Info</h3>
    <div class="from-group row">

      <div class="d-flex flex-column col-sm-6">
        <label for="inputFirstnameInfoClient" id="inputFirstnameInfoClientLabel">First name*</label>
        <input type="text" class="form-control" id="inputFirstnameInfoClient" placeholder="First name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputLastnameInfoClient" id="inputLastnameInfoClientLabel">Last name*</label>
        <input type="text" class="form-control" id="inputLastnameInfoClient" placeholder="Last name">
      </div>

    </div>

     <div class="from-group row">
      <div class="d-flex flex-column col-sm-6 mt-3">
        <label for="inputBirthdayInfoClient" id="inputBirthdayInfoClientLabel">Birthdate* (mm/dd/yyyy)</label>
        <input type="date" class="form-control" id="inputBirthdayInfoClient">
      </div>
    </div>

    <div class="form-group row">
      <div class="d-flex flex-column col-sm-12 mt-3">
        <label for="inputStreetAddClient" id="inputStreetAddClientLabel">Street address*</label>
        <input type="text" class="form-control" id="inputStreetAddClient">
      </div>
    </div>

    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputCityAddClient" id="inputCityAddClientLabel">City*</label>
        <input type="text" class="form-control" id="inputCityAddClient">
      </div>

      <div class="d-flex flex-column col-sm-3">
        <label for="inputStateAddClient" id="inputStateAddClientLabel">State*</label>
        <input type="text" class="form-control" id="inputStateAddClient">
      </div>

      <div class="d-flex flex-column col-sm-3">
        <label for="inputZipcodeAddClient" id="inputZipcodeAddClientLabel">ZIP Code*</label>
        <input type="text" class="form-control" id="inputZipcodeAddClient">
      </div>
    </div>

     <div class="form-group row">
      <div class="d-flex flex-column col-sm-6 mt-3">
        <label id="client_childrenHomeLabel">Patient has children at home*</label>
          <div class="d-flex flex-row">
            <div class="pe-5" id="client_childrenHome_yesSection">
              <input type="radio" name="client_childrenHome" value="yes" id="yes_ChildrenHome">
              <label for="client_childrenHome_yes">Yes</label>
            </div>
            <div>
              <input type="radio" name="client_childrenHome" value="no">
              <label for="client_childrenHome_no">No</label>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column col-sm-6 mt-3" id="AgeChildrenClient">
        <label for="inputAgeChildrenClient" id="inputAgeChildrenClientLabel">Ages of children (leave blank, if none)</label>
        <input type="text" class="form-control" id="inputAgeChildrenClient">
      </div>
    </div>


   <div class="form-group row">
      <div class="d-flex flex-column col-sm-12 mt-3">
        <label for="inputDescribeSCIClient" id="inputDescribeSCIClientLabel">Describe spinal cord injury (level and cause, i.e., MVA, Fall, etc.). If not a traumatic injury, please explain*</label>
        <textarea name="client_explaination" class="form-control" id="inputDescribeSCIClient"></textarea>
      </div>
   </div>

   <div class="form-group row">
      <div class="d-flex flex-column col-sm-12">
         <label id="client_assistTypeLabel">Type of assistance requested</label>
        <div class= "row">
       
            <div class="col-sm-6 mt-1">
              <input type="checkbox" name="client_assistType" value="client_assistType_home" id="client_assistType_home">
              <label for="client_assistType_home">Home Modifications</label>
            </div>
            <div class="col-sm-6 mt-1">
              <input type="checkbox" name="client_assistType" value="client_assistType_mobility" id="client_assistType_mobility">
              <label for="client_assistType_mobility">Mobility Equipment</label>
          </div>
          <div class="col-sm-6 mt-1">
            <input type="checkbox" name="client_assistType" value="client_assistType_catheters" id="client_assistType_catheters">
            <label for="client_assistType_catheters">Catheters</label>
          </div>
          <div class="col-sm-6 mt-1">
            <input type="checkbox" name="client_assistType" value="client_assistType_other" id="client_assistType_other">
            <label for="client_assistType_other">Other</label>
        </div>
      </div>
    </div>
  </div>


  <div class="form-group row">
      <div class="d-flex flex-column col-sm-12">
        <label for="inputPatientNeedsClient" id="inputPatientNeedsClientLabel">Describe patient's needs in order of importance*</label>
        <textarea name="client_needs" class="form-control" id="inputPatientNeedsClient"></textarea>
      </div>
  </div>

   <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputDischargeDateClient" id="inputDischargeDateClientLabel">Patient discharge date (mm/dd/yyyy)</label>
        <input type="date" class="form-control" id="inputDischargeDateClient">
      </div>
  </div>

  <div class="form-group row">
            <div class="d-flex flex-column col-sm-6">
              <label id="client_catheterUseLabel">Will patient be using catheters*</label>
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


            <div class="d-flex flex-column col-sm-6 mt-3">
              <label id="client_insuredLabel">Is patient insured?*</label>
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
  </div>


 <div class="form-group row">
              <div class="d-flex flex-column col-sm-6">
                <label id="client_medicareLabel">Does patient have Medicare/Medicaid*</label>
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

              <div class="d-flex flex-column col-sm-6 mt-3">
                <label id="client_veteranLabel">Is patient a veteran*?</label>
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


   <div class="form-group row">
      <div class="d-flex flex-column col-sm-12">
        <label >Describe other program eligibility</label>
        <textarea name="client_eligibility" class="form-control" id="client_eligibility"></textarea>
      </div>
  </div>


    <h3 class="text-naf-blue mt-5">Social Worker Contact Info</h3>
    <p>Leave blank if the patient/client does not have a social worker.</p>
    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputFirstnameSocialClient" id="inputFirstnameSocialClientLabel">First name</label>
        <input type="text" class="form-control" id="inputFirstnameSocialClient" placeholder="First name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputLastnameSocialClient" id="inputLastnameSocialClientLabel">Last name</label>
        <input type="text" class="form-control" id="inputLastnameSocialClient" placeholder="Last name">
      </div>
    </div>

    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputEmailSocialClient" id="inputEmailSocialClientLabel">Email address</label>
        <input type="email" class="form-control" id="inputEmailSocialClient" placeholder="Last name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputPhoneSocialClient" id="inputPhoneSocialClientLabel">Phone number</label>
        <input type="tel" class="form-control" id="inputPhoneSocialClient" placeholder="10-digit phone number">
      </div>
    </div>
  

    <h3 class="text-naf-blue mt-5">Person Submitting Application*</h3>
    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputFirstnameSubmittingClient" id="inputFirstnameSubmittingClientLabel">First name</label>
        <input type="text" class="form-control" id="inputFirstnameSubmittingClient" placeholder="First name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputLastnameSubmittingClient" id="inputLastnameSubmittingClientLabel">Last name</label>
        <input type="text" class="form-control" id="inputLastnameSubmittingClient" placeholder="Last name">
      </div>
    </div>


    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputEmailSubmittingClient" id="inputEmailSubmittingClientLabel">Email address</label>
        <input type="email" class="form-control" id="inputEmailSubmittingClient" placeholder="Last name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputPhoneSubmittingClient" id="inputPhoneSubmittingClientLabel">Phone number</label>
        <input type="tel" class="form-control" id="inputPhoneSubmittingClient" placeholder="10-digit phone number">
      </div>
    </div>



    <h3 class="text-naf-blue mt-5">Primary Contact Info</h3>
    <p>Please enter the contact information for the patient/client or the primary contact for the patient/client.</p>
    <div class="form-group row">
      <div class="d-flex flex-row align-item-center col-sm-12">
          <input type="checkbox" value="yes" name="sameAsperson" id="sameAsperson" class="my-1"> 
          <label for='sameAsperson' id="forTerms" class="pl-1 m-0">Same as person submitting</label>
      </div>
    
   </div>
    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputFirstnamePrimarygClient" id="inputFirstnamePrimaryClientLabel">First name</label>
        <input type="text" class="form-control" id="inputFirstnamePrimaryClient" placeholder="First name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputLastnamePrimarygClient" id="inputLastnamePrimaryClientLabel">Last name</label>
        <input type="text" class="form-control" id="inputLastnamePrimaryClient" placeholder="Last name">
      </div>
    </div>

    <div class="form-group row">
      <div class="d-flex flex-column col-sm-6">
        <label for="inputEmailPrimarygClient" id="inputEmailPrimaryClientLabel">Email address</label>
        <input type="email" class="form-control" id="inputEmailPrimaryClient" placeholder="Last name">
      </div>

      <div class="d-flex flex-column col-sm-6">
        <label for="inputPhonePrimarygClient" id="inputPhonePrimaryClientLabel">Phone number</label>
        <input type="tel" class="form-control" id="inputPhonePrimaryClient" placeholder="10-digit phone number">
      </div>
    </div>

    <div class="form-group row">
          <div class="col-sm-12 pt-4">
              <button type="submit" name="submit" value="Submit" id="submitClient" class="btn-naf-blue rounded-2 btn-block py-2 fs-5">SUBMIT APPLICATION</button>
              <br>
          </div>
     </div>
    
  </form>
</div>
</div>
<?php
  print($htmlFooter);
?>
