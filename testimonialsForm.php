<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$TID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$TDate = "";
$TName = "";
$TDetails="";
$TImage="";
$TImageAltText="";
$TTID="";
$TestimonialImg = "<input type='hidden' name='TestimonialExists' value='No'>";
$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['TID'])) {

	$TID = intval($_GET['TID']);

	// validate the book id -- $TID should be greater than zero.
	if ($TID > 0){

		//compose a select query
		$sql = "SELECT TDate, TName, TDetails, TImage, TImageAltText, TTID FROM Testimonials WHERE TID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$TID);
			$stmt->execute();

			$stmt->bind_result($TDate, $TName, $TDetails, $TImage, $TImageAltText, $TTID); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
				if (file_exists('/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/testimonials/'.$TImage)) {
					$TestimonialImg = "<img src='img/testimonials/$TImage'><input type='hidden' name='TestimonialExists' value='$TImage'>";
				}else {
					$TestimonialImg = "<p>$TImage is not found</p>$TestimonialImg";
				}
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$TID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$TID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, some error occured in the process -- the selected donation is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}

		$stmt->close();
	} // close if(is_int($pid))

}

// function to create the options for the category drop-down list.
//  -- the value of parameter $selectedCID comes from the function call
function CategoryOptionList($selectedTTID){

	$list = ""; //placeholder for the CD category option list

	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT TTID, TestimonialType FROM TestimonialCategory order by TTID";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($TTID, $TestimonialType);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($TTID == $selectedTTID){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$TTID' $selected>$TestimonialType</option>";
		}
	}
	$stmt->close();
	return $list;
}
?>
<?php
	print $HTMLHeader;
?>
	<div class="container">
			<h2 class='text-center my-5 text-naf-blue'>Testimonial Form</h2>

		<div class="col-md-10 mx-auto">
			<a href="testimonialsShow.php"><button class='btn btn-danger'>CANCEL</button></a>


		  <p><?= $errMsg ?></p>

			<form action="testimonialsEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="TID" value="<?=$TID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>Testimonial Image:</th><td><?=$TestimonialImg?><input type="file" name="TImage" id="TImage"></td></tr>
					<tr><th class='pr-4'>Image Description*:</th><td><input class="form-control mb-1" type="text" name="TImageAltText" size="45" value="<?= htmlentities($TImageAltText) ?>"></td></tr>
					<tr><th class='pr-4'>Name*:</th><td><input class="form-control mb-1" type="text" name="TName" size="45" value="<?= htmlentities($TName) ?>"></td></tr>
					<tr><th class='pr-4'>Date*:</th><td><input class="form-control mb-1" type="date" name="TDate" size="45" value="<?= htmlentities($TDate) ?>"></td></tr>
					<tr><th class='pr-4'>Testimonial*:</th><td><textarea class="form-control mb-1" type="text" name="TDetails" size="45" value=""><?= htmlentities($TDetails) ?></textarea></td></tr>
					<tr><th class='pr-4'>Category*:</th><td><select class='form-control mb-1' name="TTID"><?= CategoryOptionList($TTID)?></select></td></tr>
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="SUBMIT TESTIMONIAL INFORMATION"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
