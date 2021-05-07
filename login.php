<?php
session_start();
include("shared.php");
// stored shared contents, such as HTML header and page title, page footer, etc. in variables
// make database connection

// clear out session value
if (isset($_GET['logout'])){
    $_SESSION['access'] = false;
}

// check to see if there's a form submission of user name and password
if (isset($_POST['Username']) && isset($_POST['Password']) && !empty($_POST['Username']) && !empty($_POST['Password'])){

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    //echo "u: $username - p: $password <br>";

    // add additional validation here if necessary

    // validate user name and password
    // -- in this example, only one set of user name and password is valid so it's hard-coded here.  If there are multiple accounts, you may want to check the user input against your database records to grand access

    if ($username == "admin" && $password == "123456") {
        // grant access
        $_SESSION['access'] = true;
        // redirect it to the admin page #1
        header('Location: adminMain.php');
        exit;
    } else {
        // error message
        if ($username !== 'admin' && $password == '123456') {
          $errorPd = "<div><p class='text-danger'>The user name you provided is incorrect.  Please try again.</p></div>";
        }else if ($username == 'admin' && $password !== '123456') {
          $errorPd = "<div><p class='text-danger'>The password you provided is incorrect.  Please try again.</p></div>";
        }else {
          $errorPd = "<div><p class='text-danger'>The user name and password you provided are incorrect.  Please try again.</p></div>";
        }
    }

} else if (isset($_POST['Username']) || isset($_POST['Password'])){
    $errorPd = "<div><p class=text-danger>Please enter both the user name and password to log in.</p></div>";

}else {
  $errorPd = "";
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


<div class="container col-md-7 col-12 mx-auto">

	<h1></h1>
	<form class="" id="app-form" action="" method="POST">
	  	<h4 class="text-center">Admin Login</h4>
		<div class="form-group">
	    <label for="UserName">User Name</label>
	    <input type="text" class="form-control" id="UserName" name="Username" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label for="Password">Password</label>
	    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
	  </div>
	  <?php
		print $errorPd;
	   ?>
	  <div class="text-center">
		  <button type="submit" value="Submit" name="submit" id="btn_submit" class="btn btn-naf-blue btn-tablet-mobile-full">Sign in</button>
		  <br>

	   </div>
	</form>

</div>
<?php
  print($htmlFooter);
?>
