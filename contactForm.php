<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$CID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$CFirstName = "";
$CLastName = "";
$CEmail="";
$CSubject="";
$CDetails="";

$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['CID'])) {

	$CID = intval($_GET['CID']);

	// validate the book id -- $CID should be greater than zero.
	if ($CID > 0){

		//compose a select query
		$sql = "SELECT CFirstName, CLastName, CEmail, CSubject, CDetails FROM NAFContact WHERE CID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$CID);
			$stmt->execute();

			$stmt->bind_result($CFirstName,$CLastName, $CEmail, $CSubject, $CDetails); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$CID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$CID = "";
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
			<h2 class='text-center my-5 text-naf-blue'>Contact - Admin Reply</h2>

		<div class="col-md-10 mx-auto">
			<a href="donationShow.php"><button class='btn btn-danger'>Cancel</button></a>


		  <p><?= $errMsg ?></p>

			<form action="contactEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="CID" value="<?=$CID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>Full Name:</th><td><input type="text" readonly class="form-control-plaintext" name="CFirstName" size="45" value="<?=$CFirstName?>"></td>
					<td><input type="text" readonly class="form-control-plaintext" name="CLastName" size="45" value="<?=$CLastName?>"></td></tr>
					<input type="hidden" name="CEmail" value="<?=$CEmail?>">
					<input type="hidden" name="CSubject" value="<?=$CSubject?>">
					<tr><th class='pr-4'>Message:</th><td><input type="text" readonly class="form-control-plaintext" name="CDetails" size="45" value="<?=$CDetails?>"></td></tr>
					<tr><th class='pr-4'>Admin Response*:</th></tr><tr><td><input class="form-control mb-1" type="text" name="Reply" size="45" value="<?= htmlentities($DonationDetail) ?>"></td></tr>
					<!--<tr><th>Category*:</th><td><select class='selectcustom' name="GID">CategoryOptionList($GID)?></select></td></tr>-->
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="Submit Contact Response"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
