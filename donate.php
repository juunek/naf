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


  </head>

<?php print($htmlNav); ?>

<div class="container">
<script type="text/javascript" src="js/donationform.js"></script>

 <h1>Make a Difference</h1>

<!--Local Resources -->

<h2 class="blue-bar">Donations</h2>


  <div class="row m-4">
        <div class="col-md-10 mx-auto">
          <h4>NAF has provided assistance to <strong class="text-naf-blue">227 clients</strong> in 2021 so far!</h4><br>
          
          <p>Make a difference by making a monetary or equipment donation today. Your monetary donation is tax deductible to the full extent allowed by the law. Neuro Assistance is a registered 501(c)(3) organization. A receipt for your gift will be mailed to you within 10 days.</p>

          <p>Whatever you can give is appreciated, and we thank you in advance for your generous support!</p>

          <h4 class="text-naf-blue mt-5 mb-4">Donation by Check</h4>

          <p>Please make your check payable to: <strong> Neuro Assistance Foundation</strong></p>
          <p class="ml-5">Mail to:<br>
          Neuro Assistance Foundation<br>
          2320 Bridgewood Drive<br>
          Keller, TX 76262</p>
        </div>
    </div>
    
    <div class="row m-4">
        <div class="col-md-5 col-12 block-donate-now">
            <h4 class="text-naf-blue mb-4">Donate Online and Pledge</h4>
          
            <p>Click below to make a credit card or echeck donation to our organization. The button below will open in a new tab our donation profile on Click & Pledge, a third-party nonprofit fundraising platform.</p>

             <a class='mt-auto' href='https://connect.clickandpledge.com/w/Organization/neuroassistance/paymentwidget/d01320ca-b4e1-4bbd-bade-eeb2d18d3cd1' target='_blank'><button type='button' class='btn btn-naf-blue'>MAKE A CONTRIBUTION</button></a>
        </div>
        <div class="col-md-5 col-12 mx-auto">
            <a href='https://connect.clickandpledge.com/w/Organization/neuroassistance/paymentwidget/d01320ca-b4e1-4bbd-bade-eeb2d18d3cd1' target='_blank'><img src="img/donate-click-and-pledge.png" alt="NAF Click and Pledge donate and contribute page" width="100%" height="auto"></a>
            <a href='https://connect.clickandpledge.com/w/Organization/neuroassistance/paymentwidget/d01320ca-b4e1-4bbd-bade-eeb2d18d3cd1' target='_blank' class="small-description-link"><p class="mt-1" style="font-size: 12px">Click & Pledge donate online page</p></a>
        </div>
  </div>


 <h2 class="blue-bar my-5">Vehicles & Equipment</h2>



  <div class="row m-4">
      <div class="col-md-10 mx-auto">

          <p>If you have assistive vehicles or equipment you would like to donate, please fill out the form below. If you have any questions about a donation or anything else, <a href='contact.php' class='links-naf-blue'>contact us</a>, and we will get back to you.</p>
          <p class="text-danger">*Required Fields</p>

      </div>

  </div>

  <div class="row">

     <div class="col-md-10 mx-auto">
        <form id="donationForm" action="" method="post" class="p-3 shadow">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputFirstnameDonation" id="inputFirstnameDonationLabel">First name*</label>
                    <input type="text" class="form-control" name="firstname" id="inputFirstnameDonation" placeholder="First name">
                </div>
                <div class="col-sm-6">
                    <label for="inputLastnameDonation" id="inputLastnameDonationLabel">Last name*</label>
                    <input type="text" class="form-control" name="lastname" id="inputLastnameDonation" placeholder="Last name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputEmailDonation" id="inputEmailDonationLabel">Email Address*</label>
                    <input type="text" class="form-control" id="inputEmailDonation" placeholder="abc@xyz.com">
                </div>
                <div class="col-sm-6">
                    <label for="inputPhoneNumberDonation" id="inputPhoneNumberDonationLabel">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhoneNumberDonation" placeholder="1234567890">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="DonationType" id="DonationTypeLabel">Vehicle/Equipment Type*</label>
                    <select class="form-select mb-3" id="DonationType" name="DonationType">
                      <option value="none">Pick an option</option>
                       <option value="Shower Chair">Shower Chair</option>
                       <option value="Tub Transfer Bench">Tub Transfer Bench</option>
                       <option value="Hospital Bed">Hospital Bed</option>
                       <option value="Patient Lift">Patient Lift</option>
                       <option value="Wheelchair - Manual">Wheelchair - Manual</option>
                       <option value="Wheelchair - Power">Wheelchair - Power</option>
                       <option value="Other">Other</option>


                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="" id="typeDetails"></div>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputDetailDonation" id="inputDetailDonationLabel">Donation Details</label>
                    <textarea class="form-control" id="inputDetailDonation" placeholder=""></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                 <button type="submit" name="submit" value="Submit" id="submitDonation"  class="btn-naf-blue btn-block py-2 fs-5">Submit</button>
                 <br>
               </div>
            </div>

        </form>

        <br>
        <div id="response">

        </div>
</div>
</div>

<br>

</div>
<?php
  print($htmlFooter);
?>
