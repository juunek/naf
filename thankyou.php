<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank you | Neuro Assistance Foundation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="styles.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://kit.fontawesome.com/5d3977cc74.js" crossorigin="anonymous"></script>

  <!-- <script type="text/javascript" src="js/javascript.js"></script> -->

  <script type="text/javascript">

	var timeleft = 3;
		var downloadTimer = setInterval(function(){
		  if(timeleft <= 0){
		    clearInterval(downloadTimer);
		    document.getElementById("countdown").innerHTML = "";
		  } else {
		    document.getElementById("countdown").innerHTML = "Go back to homepage in " + timeleft + " seconds";
		  }
		  timeleft -= 1;
		}, 1000);

  </script>



</head>
<body>


<div class="container mt-3">
     <script type="text/javascript" src="js/js-validation.js"></script>
    <!-- our mission and vision  -->

<div class="text-center my-auto p-5 shadow" style="">
<i class="fa fa-check-circle fa-3x pb-3" style="color: green;"></i>

<p class="h2">Thank you for filling out the form</p>

<p>For further inquiries, please contact admin@naf.com</p>

<a class="btn btn-naf-blue mb-3" href="index.php">Go back</a>

<div id="countdown"></div>

<script>
	setTimeout(() => {window.location.replace("index.php");}, 4000);
</script>



</div>




</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
