<?php include("shared.php");?>

<!doctype html>
<html lang="en">
  <head>
  <title>Sitemap | Neuro Assitance Foundation</title>
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

      <h1>Sitemap</h1>

        <div class="row">

            <div class="col-10 mx-3">
              <p>
              <ul style="line-height:200%">
                <li><a href="index.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Home</strong></a></li>
                <li><a href="about.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>About</strong></a></li>
                  <ul>
                    <li><a href="contact.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Contact</a></li>
                    <li><a href="join-email.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Join Email List</a></li>
                  </ul>
                <li><a href="community.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Community</strong></a></li>
                  <ul>
                    <li><a href="testimonials.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Testimonials</a></li>
                    <li><a href="giving-thanks.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Giving Thanks</a></li>
                    <li><a href="newsletter.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Newsletter</a></li>
                  </ul>
                <li><a href="events.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Events</strong></a></li>
                  <ul>
                    <li><a href="events-cinco-de-mayo.php?EID=1" target='_blank' class='sitemap-links text-decoration-none pb-3'>Cinco De Mayo</a></li>
                    <li><a href="events-hot-hatch.php?EID=2" target='_blank' class='sitemap-links text-decoration-none pb-3'>Hot Hatch</a></li>
                    <li><a href="events-naf-topgolf.php?EID=3" target='_blank' class='sitemap-links text-decoration-none pb-3'>NAF TopGolf Charity</a></li>
                    <li><a href="events-golf-a-thon.php?EID=4" target='_blank' class='sitemap-links text-decoration-none pb-3'>Golf-A-Thon</a></li>
                  </ul>
                <li><a href="resources.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Resources</strong></a></li>
                  <ul>
                    <li><a href="spinal-cord-injury.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Spinal Cord Injury</a></li>
                    <li><a href="client-application.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Request Assistance</a></li>
                  </ul>
                <li><a href="get-involved.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Get Involved</strong></a></li>
                  <ul>
                    <li><a href="volunteer.php" target='_blank' class='sitemap-links text-decoration-none pb-3'>Volunteer</a></li>
                  </ul>
                <li><a href="donate.php" target='_blank' class='sitemap-links text-decoration-none pb-3'><strong>Donate</strong></a></li>
              </ul>
            </p>
        </div>

    </div>

</div>

<?php
  print($htmlFooter);
?>
