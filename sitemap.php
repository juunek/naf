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

<ul>
  <li><a href="index.php"><p><strong>Home</strong></p></a></li>
  <li><a href="about.php"><p><strong>About</strong></p></a></li>
    <ul>
      <li><a href="contact.php"><p>Contact</p></a></li>
      <li><a href="join-email.php"><p>Join Email List</p></a></li>
    </ul>
  <li><a href="community.php"><p><strong>Community</strong></p></a></li>
    <ul>
      <li><a href="testimonials.php"><p>Testimonials</p></a></li>
      <li><a href="giving-thanks.php"><p>Giving Thanks</p></a></li>
      <li><a href="newsletter.php"><p>Newsletter</p></a></li>
    </ul>
  <li><a href="events.php"><p><strong>Events</strong></p></a></li>
    <ul>
      <li><a href="events-naf-topgolf.php"><p>NAF TopGolf Charity</p></a></li>
      <li><a href="events-hot-hatch.php"><p>Hot Hatch</p></a></li>
      <li><a href="events-cinco-de-mayo.php"><p>Cinco De Mayo</p></a></li>
      <li><a href="events-golf-a-thon.php"><p>Golf-A-Thon</p></a></li>
    </ul>
  <li><a href="resources.php"><p><strong>Resources</strong></p></a></li>
    <ul>
      <li><a href="spinal-cord-injury.php"><p>Spinal Cord Injury</p></a></li>
      <li><a href="client-application.php"><p>Request Assistance</p></a></li>
    </ul>
  <li><a href="get-involved.php"><p><strong>Get Involved</strong></p></a></li>
    <ul>
      <li><a href="volunteer.php"><p>Volunteer</p></a></li>
    </ul>
  <li><a href="donate.php"><p><strong>Donate</strong></p></a></li>
</ul>

<?php
  print($htmlFooter);
?>
