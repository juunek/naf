<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$KEYID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$FirstName = "";
$LastName = "";
$Email="";
$PhoneNumber="";
$DonationType="";
$DonationDetail="";

$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['KEYID'])) {

	$KEYID = intval($_GET['KEYID']);

	// validate the book id -- $KEYID should be greater than zero.
	if ($KEYID > 0){

		//compose a select query
		$sql = "SELECT FirstName, LastName, Email, PhoneNumber, DonationType, DonationDetail FROM NAFDonation WHERE KEYID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$KEYID);
			$stmt->execute();

			$stmt->bind_result($FirstName,$LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$KEYID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$KEYID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, some error occured in the process -- the selected donation is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}

		$stmt->close();
	} // close if(is_int($pid))

}

// function to create the options for the category drop-down list.
//  -- the value of parameter $selectedCID comes from the function call
/*function CategoryOptionList($selectedG){

	$list = ""; //placeholder for the CD category option list

	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT GID, Genre FROM GenreCategory order by Genre";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($GID, $Genre);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($GID == $selectedGID){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$GID' $selected>$Genre</option>";
		}
	}
	$stmt->close();
	return $list;
}*/
?>
<?php
	print $HTMLHeader;
?>

<main>
	<div class="middle-wrap">
		<div>
			<h1>Donation</h1>

			<a href="donationShow.php"><button class='cancel-btn'>Cancel</button></a>

			<h2>Donation Information Form</h2>

		  <p><?= $errMsg ?></p>

			<form action="donationEdit.php" method="POST" enctype="multipart/form-data">
			* Required
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="KEYID" value="<?=$KEYID?>">

				<table class='formTable'>
					<tr><th>First Name*:</th><td><input type="text" name="FirstName" size="45" value="<?= htmlentities($FirstName) ?>"></td></tr>
					<tr><th>Last Name*:</th><td><input type="text" name="LastName" size="45" value="<?= htmlentities($LastName) ?>"></td></tr>
					<tr><th>Email*:</th><td><input type="email" name="Email" size="45" value="<?= htmlentities($Email) ?>"></td></tr>
					<tr><th>Phone Number*:</th><td><input type="text" name="PhoneNumber" size="45" value="<?= htmlentities($PhoneNumber) ?>"></td></tr>
					<tr><th>Donation Type*:</th><td><input type="text" name="DonationType" size="45" value="<?= htmlentities($DonationType) ?>"></td></tr>
					<tr><th>Donation Detail*:</th><td><input type="text" name="DonationDetail" size="45" value="<?= htmlentities($DonationDetail) ?>"></td></tr>
					<!--<tr><th>Category*:</th><td><select class='selectcustom' name="GID">CategoryOptionList($GID)?></select></td></tr>-->
					<tr><td colspan=2><input class='submit-btn' type=submit name="Submit" value="Submit Product Information"></td></tr>
				</table>
			</form>
	</div>
</div>
</main>

<?php print $PageFooter; ?>
