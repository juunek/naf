<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page EName, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$EID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$EImagePreview = "";
$EName = "";
$EDate = "";
$EStart= "";
$EEnd = "";
$ELocation = "";
$EDescriptionPreview = "";
$FullDescription = "";
$ELinks = "";
$RegisterEvtBtn = "";
$DetailsHeader1 = "";
$Details1 = "";
$DetailsHeader2 = "";
$Details2 = "";
$DonateBtn = "";
$VolunteerBtn = "";
$SponsorBtn = "";
$EventsImage = "<input type='hidden' name='PreviewExists' value='No'>";
$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['EID'])) {

	$EID = intval($_GET['EID']);

	// validate the book id -- $EID should be greater than zero.
	if ($EID > 0){

		//compose a select query
		$sql = "SELECT EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, FullDescription, ELinks, RegisterEvtBtn, DetailsHeader1, Details1, DetailsHeader2, Details2, DonateBtn, VolunteerBtn, SponsorBtn FROM Events WHERE EID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$EID);
			$stmt->execute();

			$stmt->bind_result($EImagePreview, $EName, $EDate, $EStart, $EEnd, $ELocation, $EDescriptionPreview, $FullDescription, $ELinks, $RegisterEvtBtn, $DetailsHeader1, $Details1, $DetailsHeader2, $Details2, $DonateBtn, $VolunteerBtn, $SponsorBtn); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
				if (file_exists('/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/'.$EImagePreview)) {
					$EventsImage = "<img src='img/$EImagePreview'><input type='hidden' name='PreviewExists' value='$EImagePreview'>";
				}else {
					$EventsImage = "<p>$EImagePreview is not found</p>$EventsImage";
				}
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$EID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$EID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, some error occured in the process -- the selected donation is not recognizable.  Please follow the links below to the events adminstration interface or contact the webmaster.  Thank you.</div>";
		}

		$stmt->close();
	} // close if(is_int($pid))

}

?>
<?php
	print $HTMLHeader;
?>
	<div class="container">
			<h2 class='text-center my-5 text-naf-blue'>Events Form</h2>

		<div class="col-md-10 mx-auto">
			<a href="eventsShow.php"><button class='btn btn-danger'>CANCEL</button></a>


		  <p><?= $errMsg ?></p>

			<form action="eventsEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="EID" value="<?=$EID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>Preview Image*:</th><td><?=$EventsImage?><input type="file" name="EImagePreview" id="EImagePreview"></td></tr>
					<tr><th class='pr-4'>Event Name*:</th><td><input class="form-control mb-1" type="text" name="EName" size="45" value="<?= htmlentities($EName) ?>"></td></tr>
					<tr><th class='pr-4'>Event Date*:</th><td><input class="form-control mb-1" type="date" name="EDate" size="45" value="<?= htmlentities($EDate) ?>"></td></tr>
					<tr><th class='pr-4'>Start Time (12-hour clock)*:</th><td><input class="form-control mb-1" type="time" name="EStart" size="45" value="<?= htmlentities($EStart) ?>"></td></tr>
					<tr><th class='pr-4'>End Time (12-hour clock)*:</th><td><input class="form-control mb-1" type="time" name="EEnd" size="45" value="<?= htmlentities($EEnd) ?>"></td></tr>
					<tr><th class='pr-4'>Location (full address)*:</th><td><input class="form-control mb-1" type="text" name="ELocation" size="45" value="<?= htmlentities($ELocation) ?>"></td></tr>
					<tr><th class='pr-4'>Description Preview*:</th><td><textarea class="form-control mb-1" type="text" name="EDescriptionPreview" size="45"><?=htmlentities($EDescriptionPreview)?></textarea></td></tr>
					<tr><th class='pr-4'>Full Description*:</th><td><textarea class="form-control mb-1" type="text" name="FullDescription" size="45"><?=htmlentities($FullDescription)?></textarea></td></tr>
					<tr><th class='pr-4'>Event Page Link*:</th><td><input class="form-control mb-1" type="text" name="ELinks" size="45" value="<?= htmlentities($ELinks) ?>"></td></tr>
					<tr><th class='pr-4'>Registration Link*:</th><td><input class="form-control mb-1" type="text" name="RegisterEvtBtn" size="45" value="<?= htmlentities($RegisterEvtBtn) ?>"></td></tr>
					<tr><th class='pr-4'>Blurb 1: Header:</th><td><input class="form-control mb-1" type="text" name="DetailsHeader1" size="45" value="<?= htmlentities($DetailsHeader1) ?>"></td></tr>
					<tr><th class='pr-4'>Blurb 1: Details:</th><td><textarea class="form-control mb-1" type="text" name="Details1" size="45" placeholder=""><?=htmlentities($Details1)?></textarea></td></tr>
					<tr><th class='pr-4'>Blurb 2: Header:</th><td><input class="form-control mb-1" type="text" name="DetailsHeader2" size="45" value="<?= htmlentities($DetailsHeader2) ?>"></td></tr>
					<tr><th class='pr-4'>Blurb 2: Details:</th><td><textarea class="form-control mb-1" type="text" name="Details2" size="45" placeholder=""><?=htmlentities($Details2)?></textarea></td></tr>
					<tr><th class='pr-4'>Donate Link*:</th><td><input class="form-control mb-1" type="text" name="DonateBtn" size="45" value="<?= htmlentities($DonateBtn) ?>"></td></tr>
					<tr><th class='pr-4'>Volunteer Link*:</th><td><input class="form-control mb-1" type="text" name="VolunteerBtn" size="45" value="<?= htmlentities($VolunteerBtn) ?>"></td></tr>
					<tr><th class='pr-4'>Sponsor Link*:</th><td><input class="form-control mb-1" type="text" name="SponsorBtn" size="45" value="<?= htmlentities($SponsorBtn) ?>"></td></tr>
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="SUBMIT EVENT INFORMATION"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
