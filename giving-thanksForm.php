<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$GTID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$GTImage = "";
$GTAdditionalImage = "";
$GTAdditionalImageAltText="";
$GTHeader="";
$GTDetails="";
$GTPersonName="";
$GTPersonDetails="";
$GivingThanksImg = "<input type='hidden' name='GTExists' value='No'>";
$AdditionalGivingThanksImg = "<input type='hidden' name='AdditionalExists' value='No'>";
$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['GTID'])) {

	$GTID = intval($_GET['GTID']);

	// validate the book id -- $GTID should be greater than zero.
	if ($GTID > 0){

		//compose a select query
		$sql = "SELECT GTImage, GTAdditionalImage, GTAdditionalImageAltText, GTHeader, GTDetails, GTPersonName, GTPersonDetails FROM GivingThanks WHERE GTID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$GTID);
			$stmt->execute();

			$stmt->bind_result($GTImage, $GTAdditionalImage, $GTAdditionalImageAltText, $GTHeader, $GTDetails, $GTPersonName, $GTPersonDetails); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
				if (file_exists('/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/'.$GTImage) || file_exists('/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/'.$GTAdditionalImage)) {
					$GivingThanksImg = "<img src='img/$GTImage'><input type='hidden' name='GTExists' value='$GTImage'>";
					$AdditionalGivingThanksImg = "<img src='img/$GTAdditionalImage'><input type='hidden' name='AdditionalExists' value='$GTAdditionalImage'>";
				}else {
					$GivingThanksImg = "<p>$GTImage is not found</p>$GivingThanksImg";
					$AdditionalGivingThanksImg = "<p>$GTAdditionalImage is not found</p>$AdditionalGivingThanksImg";
				}
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$GTID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$GTID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, some error occured in the process -- the selected donation is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}

		$stmt->close();
	} // close if(is_int($pid))

}

?>
<?php
	print $HTMLHeader;
?>
	<div class="container">
			<h2 class='text-center my-5 text-naf-blue'>Giving Thanks Form</h2>

		<div class="col-md-10 mx-auto">
			<a href="giving-thanksShow.php"><button class='btn btn-danger'>CANCEL</button></a>


		  <p><?= $errMsg ?></p>

			<form action="giving-thanksEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="GTID" value="<?=$GTID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>Giving Thanks Image*:</th><td><?=$GivingThanksImg?><input type="file" name="GTImage" id="GTImage"></td></tr>
					<tr><th class='pr-4'>Additional Image:</th><td><?=$AdditionalGivingThanksImg?><input type="file" name="GTAdditionalImage" id="GTAdditionalImage"></td></tr>
					<tr><th class='pr-4'>Additional Image Description:</th><td><input class="form-control mb-1" type="text" name="GTAdditionalImageAltText" size="45" value="<?= htmlentities($GTAdditionalImageAltText) ?>"></td></tr>
					<tr><th class='pr-4'>Article Title*:</th><td><input class="form-control mb-1" type="text" name="GTHeader" size="45" value="<?= htmlentities($GTHeader) ?>"></td></tr>
					<tr><th class='pr-4'>Article Details*:</th><td><textarea class="form-control mb-1" type="text" name="GTDetails" size="45" value=""><?= htmlentities($GTDetails) ?></textarea></td></tr>
					<tr><th class='pr-4'>Donor Name:</th><td><input class="form-control mb-1" type="text" name="GTPersonName" size="45" value="<?= htmlentities($GTPersonName) ?>"></td></tr>
					<tr><th class='pr-4'>Donor Details:</th><td><textarea class="form-control mb-1" type="text" name="GTPersonDetails" size="45" value=""><?= htmlentities($GTPersonDetails) ?></textarea></td></tr>
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="SUBMIT GIVING THANKS INFORMATION"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
