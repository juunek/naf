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
	<div class="container">
			<h2 class='text-center my-5 text-naf-blue'>Donation Form</h2>

		<div class="col-md-10 mx-auto">
			<a href="donationShow.php"><button class='btn btn-danger'>Cancel</button></a>


		  <p><?= $errMsg ?></p>

			<form action="donationEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="KEYID" value="<?=$KEYID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>First Name*:</th><td><input class="form-control mb-1" type="text" name="FirstName" size="45" value="<?= htmlentities($FirstName) ?>"></td></tr>
					<tr><th class='pr-4'>Last Name*:</th><td><input class="form-control mb-1" type="text" name="LastName" size="45" value="<?= htmlentities($LastName) ?>"></td></tr>
					<tr><th class='pr-4'>Email*:</th><td><input class="form-control mb-1" type="email" name="Email" size="45" value="<?= htmlentities($Email) ?>"></td></tr>
					<tr><th class='pr-4'>Phone Number*:</th><td><input class="form-control mb-1" type="text" name="PhoneNumber" size="45" value="<?= htmlentities($PhoneNumber) ?>"></td></tr>
					<tr><th class='pr-4'>Vehicle/Equipment Type*:</th><td>
							<select class="form-control mb-1" id="DonationType" name="DonationType">
								 <option value="none">Pick an option</option>
								 <option value="Shower Chair">Shower Chair</option>
								 <option value="Tub Transfer Bench">Tub Transfer Bench</option>
								 <option value="Hospital Bed">Hospital Bed</option>
								 <option value="Patient Lift">Patient Lift</option>
								 <option value="Wheelchair - Manual">Wheelchair - Manual</option>
								 <option value="Wheelchair - Power">Wheelchair - Power</option>
								 <option value="Other">Other</option>
							</select>
					</td></tr>
					<tr><th class='pr-4'>Donation Detail*:</th><td><input class="form-control mb-1" type="text" name="DonationDetail" size="45" value="<?= htmlentities($DonationDetail) ?>"></td></tr>
					<!--<tr><th>Category*:</th><td><select class='selectcustom' name="GID">CategoryOptionList($GID)?></select></td></tr>-->
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="Submit Donation Information"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
