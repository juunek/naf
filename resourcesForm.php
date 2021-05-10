<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$ResID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.
$Img = "";
$Title = "";
$Lead="";
$Description="";
$Link="";
$RID="";
$ResourceLogo = "<input type='hidden' name='LogoExists' value='No'>";
$errMsg = "";

// check to see if a book id available via the query string
if (isset($_GET['ResID'])) {

	$ResID = intval($_GET['ResID']);

	// validate the book id -- $ResID should be greater than zero.
	if ($ResID > 0){

		//compose a select query
		$sql = "SELECT Img, Title, Lead, Description, Link, RID FROM Resources WHERE ResID=?";

		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$ResID);
			$stmt->execute();

			$stmt->bind_result($Img, $Title, $Lead, $Description, $Link, $RID); // bind the five pieces of information necessary for the form.

			$stmt->store_result();

			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
				if (file_exists('/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/resources/'.$Img)) {
					$ResourceLogo = "<img src='img/resources/$Img'><input type='hidden' name='LogoExists' value='$Img'>";
				}else {
					$ResourceLogo = "<p>$Img is not found</p>$ResourceLogo";
				}
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$ResID = ""; // reset $pid
			}

		} else {
			// reset $pid
			$ResID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, some error occured in the process -- the selected donation is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}

		$stmt->close();
	} // close if(is_int($pid))

}

// function to create the options for the category drop-down list.
//  -- the value of parameter $selectedCID comes from the function call
function CategoryOptionList($selectedR){

	$list = ""; //placeholder for the CD category option list

	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT RID, ResourcesType FROM ResourcesCategory order by RID";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($RID, $ResourcesType);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($RID == $selectedRID){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$RID' $selected>$ResourcesType</option>";
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
			<h2 class='text-center my-5 text-naf-blue'>Resource Form</h2>

		<div class="col-md-10 mx-auto">
			<a href="resourcesShow.php"><button class='btn btn-danger'>CANCEL</button></a>


		  <p><?= $errMsg ?></p>

			<form action="resourcesEdit.php" method="POST" enctype="multipart/form-data">
				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="ResID" value="<?=$ResID?>">
				<p class="text-danger mb-1">*Required Fields</p>

				<table class='formTable mx-auto'>
					<tr><th class='pr-4'>Resource Logo*:</th><td><?=$ResourceLogo?><input type="file" name="Img" id="Img"></td></tr>
					<tr><th class='pr-4'>Resource Name*:</th><td><input class="form-control mb-1" type="text" name="Title" size="45" value="<?= htmlentities($Title) ?>"></td></tr>
					<tr><th class='pr-4'>Lead*:</th><td><input class="form-control mb-1" type="text" name="Lead" size="45" value="<?= htmlentities($Lead) ?>"></td></tr>
					<tr><th class='pr-4'>Description*:</th><td><input class="form-control mb-1" type="text" name="Description" size="45" value="<?= htmlentities($Description) ?>"></td></tr>
					<tr><th class='pr-4'>Link*:</th><td><input class="form-control mb-1" type="text" name="Link" size="45" value="<?= htmlentities($Link) ?>"></td></tr>
					<tr><th class='pr-4'>Category*:</th><td><select class='form-control mb-1' name="RID"><?= CategoryOptionList($RID)?></select></td></tr>
					<tr><td colspan=2><input class='btn btn-naf-blue w-100 mt-5' type=submit name="Submit" value="SUBMIT RESOURCE INFORMATION"></td></tr>
				</table>
			</form>
		</div>
</div>

<?php print $PageFooter; ?>
