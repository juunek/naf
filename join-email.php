<?php include("shared.php");?>

<!doctype html>
<html lang="en">
  <head>
  <title>Join Our Newsletter | Neuro Assitance Foundation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stay updated with all of Neuro Assistance Foundation's latest non-profit news and events.">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">

     <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
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
<script type="text/javascript" src="js/joinemailistform.js"></script>

    <h1>Join Email List</h1>

    <!-- Join Email List -->

      <div class="row m-4">
       <div class="col-md-6 mx-auto">
            <div>
              <p>Sign up to get interesting news, events and updates delivered to your inbox.</p>
              <p class="text-danger">*Required fields</p>
            </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 mx-auto">
            <form id="joinlistForm" action="" method="post" class="px-4 pt-4 pb-0 shadow rounded-3">

                <div class="form-group row">
                  <div class="col-sm-12">
                        <label for="inputFirstnameJoinlist" id="inputFirstnameJoinlistLabel">First name*</label>
                        <input type="text" class="form-control" name="firstname" id="inputFirstnameJoinlist" placeholder="First name">
                    </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputLastnameJoinlist" id="inputLastnameJoinlistLabel">Last name*</label>
                        <input type="text" class="form-control" name="lastname" id="inputLastnameJoinlist" placeholder="Last name">
                      </div>
                    </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputEmailJoinlist" id="inputEmailJoinlistLabel">Email address*</label>
                        <input type="text" class="form-control" id="inputEmailJoinlist" placeholder="Email address">
                    </div>
                </div>

              <div class="row">
                <div class="col-sm-12 pt-4">
                  <button type="submit" name="submit" value="Submit" id="submitJoinlist" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-naf-blue btn-block rounded-2 py-2 fs-5">SIGN UP</button>
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
