<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
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

<?php print($htmlNav); ?>


<?php
print("<div class='container'>");
print("<div class='container'>");


	print("<h1>Testimonials</h1>

  <h2 class='blue-bar'>227 clients assisted in 2021 so far!</h2>");
$sql = "SELECT TTID, TestimonialType FROM TestimonialCategory order by TTID ASC";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($TTID, $TestimonialType);

	print("
  <div class='col-10 mx-auto dropdown mb-3'>
  <a class='btn btn-testimonials-filter dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Testimonial Filter
  </a>

  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
    <a class='dropdown-item' href=testimonials.php>All</a>");
    while ($stmt->fetch()) {
  				print ("<a class='dropdown-item' href=?TTID=$TTID>$TestimonialType</a></li>");
  	}
  print("</div>
</div>");
	/* close statement */
	$stmt->close();

} else {
	print ("query failed");
}
print("</div>");
// check to see if $CID is an number
if (!empty($_GET['TTID']) && is_numeric($_GET['TTID'])){

		// get the CID value (integer value) from the query string
		$TTID = intval($_GET['TTID']);

		//==================================================
		// category information (to print the heading)
		//==================================================

		/* compose a query to retrieve the information for the selected category */
		$sql = "SELECT TestimonialType FROM TestimonialCategory WHERE TTID = ?";

		/* create a prepared statement */
		$stmt = $conn->stmt_init();

		if ($stmt->prepare($sql)) {

			/* bind the parameter onto the query*/
			$stmt->bind_param('i', $TTID);

			/* execute statement */
			$stmt->execute();

			/* bind result variables */
			$stmt->bind_result($TestimonialType);

			/* close statement */
    $stmt->close();

		} else {
			print ("query failed");
		}

/* close connection */
//$conn->close();

//============================================
// Item List
//============================================

/* compose a query to retrieve the link information for the selected category */
	$sql = "SELECT TID, TDate, TName, TDetails, TImage, TImageAltText, TTID FROM Testimonials Where TTID=? ORDER BY TDate DESC";

/* create a prepared statement */
	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)) {

	/* bind the parameter onto the query*/
		$stmt->bind_param('i', $TTID);

	/* execute statement */
		$stmt->execute();

	/* store result: this will allow the use of $stmt->num_rows (providing the number of the rows/records in the result set).  Note that num_rows is not used in this version. */
		$stmt->store_result();

		$stmt->execute();

	/* store result: need to add this line before we use $stmt->num_rows*/
	$stmt->store_result();

	/* bind result variables */
	$stmt->bind_result($TID, $TDate, $TName, $TDetails, $TImage, $TImageAltText, $TTID);

	if ($stmt->num_rows > 0){
		/* fetch records to compose the link list */
		/* fetch values */
		print ("<div>");
		/* fetch values */
		while ($stmt->fetch()) {

	    $date=date('F Y', strtotime($TDate));

			print ("<div class='col-md-10 mx-auto row py-4'>
	    <div class='col-md-4'>
	      <img class='cover' src='img/testimonials/$TImage'  alt='$TImageAltText' title= '$TImageAltText'>
	    </div>
	     <div class='mx-auto d-flex align-items-start flex-column col-md-6'>
	     <h3 class='events-mobile-spacing header-blue'>$TName</h3><p class='cover'>$date</p>
       <p>$TDetails</p>
	     </div>
	     </div>");
	}
	print ("</div>");
	/* close statement */
}else{
  print ("<div class='container col-10'>No testimonials are found that matches your request. If you believe this is an error, please <a href = 'contact.php'>contact us</a></div>");
}$stmt->close();

	} else {
		print ("<div class='error'>Query failed</div>");
	}

}else {

	$sql = "SELECT TID, TDate, TName, TDetails, TImage, TImageAltText, TTID FROM Testimonials ORDER BY TDate DESC";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($TID, $TDate, $TName, $TDetails, $TImage, $TImageAltText, $TTID);

	print ("<div>");
	/* fetch values */
	while ($stmt->fetch()) {

		$date=date('F Y', strtotime($TDate));

		print ("<div class='col-md-10 mx-auto row py-4'>
		<div class='col-md-4'>
			<img class='cover' src='img/testimonials/$TImage'  alt='$TImageAltText' title= '$TImageAltText'>
		</div>
		 <div class='mx-auto d-flex align-items-start flex-column col-md-6'>
		 <h3 class='events-mobile-spacing header-blue'>$TName</h3><p class='cover'>$date</p><p>$TDetails</p>
		 </div>
		 </div>");
}
print ("</div>");

/* close statement */
$stmt->close();

} else {
print ("query failed");
}

}
print("</div>");

$conn->close();
?>

<?php
  print($htmlFooter);
?>
