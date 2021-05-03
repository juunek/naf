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
