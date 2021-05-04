<?php
session_start();
include("dbconn.inc.php"); // database connection 
include("shared.php");
// stored shared contents, such as HTML header and page title, page footer, etc. in variables
// make database connection
$conn = dbConnect();


if(isset($_POST['UserName'])){

    $username = $_POST['UserName'];
    $password = $_POST['Password'];
	
      $sql = "SELECT username, password FROM User WHERE username = '$username' AND password = '$password'";
	  $stmt = $conn->stmt_init();
		
	  if ($stmt->prepare($sql)) {
		  
		  $stmt->execute();
		  
		  $stmt->store_result();
		  
		  $rows = $stmt->num_rows;
		  
		  if ($rows==1){
				
				$_SESSION['username'] = $username;
				
				 $url = "http://ctec4350.krk1266.uta.cloud/naf/adminMain.php";
				 GoToNow($url);
				  
			  } else {$errorPd = "<h5 class='text-danger'>Username/password is incorrect.</h5>";} 
			  
		 $stmt->close();
			  
		  } else {echo "query error";}
}

?>
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
<?php
print($htmlNav); 
?>


<div class="container">

	<h1></h1>
	<form class="" id="app-form" action="" method="POST">
	  	<h4 class="text-center">Admin Login</h4>
		<div class="form-group">
	    <label for="UserName">User Name</label>
	    <input type="text" class="form-control" id="UserName" name="UserName" placeholder="admin">
	  </div>
	  <div class="form-group">
	    <label for="Password">Password</label>
	    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
	  </div>
	  <?php 
		print $errorPd;
	   ?>
	  <div class="text-center">
		  <button type="submit" value="Submit" name="but_submit" id="btn_submit" class="btn btn-naf-blue">Sign in</button>
		  <br>
		  
	   </div>
	</form>

</div>
<?php
  print($htmlFooter);
?>
