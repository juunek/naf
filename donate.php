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
<script type="text/javascript" src="js/donationform.js"></script>

 <h1>Make a Difference</h1>

<!--Local Resources -->

<h2 class="blue-bar">Donations</h2>


  <div class="row m-4">
      <div class="col-md-10 mx-auto">
        <div>
          <p>Thank you in advance for your generous support!</p>
          <p>Make a difference by making a monetary or equipment donation today. Your monetary donation is tax deductible to the full extent allowed by the law. Neuro Assistance is a registered 501(c)(3) organization. A receipt for your gift will be mailed to you within 10 days.</p>

          <h4 class="text-naf-blue">Donation by Check</h4>

          <p>Please make your check payable to: <span class="text-naf-blue"> Neuro Assistance Foundation</span><br><br>Mail to:<br>
          Neuro Assistance Foundation<br>
          2320 Bridgewood Drive<br>
          Keller, TX 76262</p>

          <h4 class="text-naf-blue">Donate via Credit Card and Pledge</h4>

          <p>Click below to make an online donation.</p>

          <a class='mt-auto' href='https://connect.clickandpledge.com/w/Organization/neuroassistance/paymentwidget/d01320ca-b4e1-4bbd-bade-eeb2d18d3cd1' target='_blank'><button type='button' class='btn-naf-blue-squareCorner'>MAKE A CONTRIBUTION</button></a>
          <br>
      </div>
    </div>
  </div>


 <h2 class="blue-bar">Vehicles & Equipment</h2>



  <div class="row m-4">
      <div class="col-md-10 mx-auto">

          <p>If you have assistive vehicles or equipment you would like to donate, please fill out the form below. If you have any questions about a donation or anything else, <a href='contact.php'><span class="text-naf-blue">contact us</span></a>, and we will get back to you.</p>

      </div>

  </div>

  <div class="row">

     <div class="col-md-10 mx-auto">
        <form id="donationForm" action="" method="post" class="p-3 shadow">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputFirstnameDonation" id="inputFirstnameDonationLabel">First name</label>
                    <input type="text" class="form-control" name="firstname" id="inputFirstnameDonation" placeholder="First name">
                </div>
                <div class="col-sm-6">
                    <label for="inputLastnameDonation" id="inputLastnameDonationLabel">Last name</label>
                    <input type="text" class="form-control" name="lastname" id="inputLastnameDonation" placeholder="Last name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputEmailDonation" id="inputEmailDonationLabel">Email Address</label>
                    <input type="text" class="form-control" id="inputEmailDonation" placeholder="abc@xyz.com">
                </div>
                <div class="col-sm-6">
                    <label for="inputPhoneNumberDonation" id="inputPhoneNumberDonationLabel">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhoneNumberDonation" placeholder="1234567890">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="DonationType" id="DonationTypeLabel">Vehicle/Equipment Type</label>
                    <select class="form-select" id="DonationType" name="DonationType">
                       <option value="none">Pick an option</option>
                       <option value="vehicle">vehicle</option>
                       <option value="equipment">equipment</option>
                       <option value="other">other</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="border border-secondary" id="typeDetails"></div>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="inputDetailDonation" id="inputDetailDonationLabel">Donation Details</label>
                    <input type="text" class="form-control" id="inputDetailDonation" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                 <button type="submit" name="submit" value="Submit" id="submitDonation" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue btn-block py-2 fs-5">Submit</button>
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
