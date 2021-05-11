<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

$EID = ""; // place holder for product id information


//See if a product id is available from the client side. If yes, then retrieve the info from the database based on the product id.  If not, present the form.
if (isset($_GET['EID'])) { // note that the spelling 'pid' is based on the query string variable name

	// product id available, validate the information, then compose a query accordingly to retrieve information.

	$EID = intval($_GET['EID']); // force all input into an integer.  If the input is a string or empty, it will be converted to 0.

	// validate the product id -- check to see if it is greater than 0
		if ($EID>0 ){
			//compose the query
			$sql = "DELETE from Events WHERE EID = ?"; // note that the spelling "PID" is based on the field name in the database product table.

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($sql)){

				$stmt->bind_param('i',$EID);

				if ($stmt->execute()){ // $stmt->execute() will return true (successful) or false
					$output = "<h2 class='text-center text-success my-5'>Success!</h2><p class='text-center'>The selected record has been seccessfully deleted.</p>";
				} else {
					$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>The database operation to delete the record has been failed.  Please try again or contact the system administrator.</p>";
				}

			}


		} else {
			// product id <= 0. reset $pid. prepare error message
			$EID = "";
			// compose an error message
			$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>If you are expecting to delete an exiting item, there are some error occured in the process -- the item you selected is not recognizable. Please contact the webmaster.  Thank you.</p>";
		}
} else {
	// $_GET['pid'] is not set, which means that no product id is provided
	$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>To manage resources records, please follow the link below to visit the admin page.  Thank you. </p>";
}

?>
<br>
<?php
	print $HTMLHeader;
?>
<div class='container'>

    <div class='col-10 mx-auto'>
        <?= $output ?>

        <p class='text-center'>Back to the <a href='eventsShow.php'>Events Page</a></p>
    </div>

</div>

<?php print $PageFooter; ?>

</body>
</html>
