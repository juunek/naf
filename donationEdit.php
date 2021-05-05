<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// Process only if there is any submission
if (isset($_POST['Submit'])) {
	// ==========================
	//validate user input

	// set up the required array
	$required = array("FirstName", "LastName", "Email", "PhoneNumber", "DonationType", "DonationDetail"); // note that, in this array, the spelling of each item should match the form field names

	// set up the expected array
	$expected = array("KEYID", "FirstName", "LastName", "Email", "PhoneNumber", "DonationType", "DonationDetail"); // again, the spelling of each item should match the form field names

    // set up a label array, use the field name as the key and label as the value
  $label = array ('FirstName'=>'FirstName', "LastName"=>'LastName', "Email"=>'Email', "PhoneNumber"=>'PhoneNumber', "DonationType"=>'DonationType', "DonationDetail"=>'DonationDetail');


	$missing = array();

	foreach ($expected as $field){
		// Under what conditions the script needs to record a field as missing -- $field is required and one of the following two (1)  $_POST[$field] is not set or (2) $_POST[$field] is empty

        // Enable the line below to debug
		//echo "$field: in_array(): ".in_array($field, $required)." empty(_POST[$field]): ".empty($_POST[$field])."<br>";

		if (in_array($field, $required) && empty($_POST[$field])) {
			array_push ($missing, $field);

		} else {
			// Passed the required field test, set up a variable to carry the user input.
			// Note the variable set up here uses the $field value as the veriable name. Notice the syntax ${$field}.  This is a "variable variable". For example, the first $field in the foreach loop here is "title" (the first one in the $expected array) and a $title variable will be created.  The value of this variable will be either "" or $_POST["title"] depending on whether $_POST["title"] is set up.
            // once we run through the whole $expected array, then these variables, $title, $artist, $price, $categoryID, $pDtail, and $pid, will be generated.

			if (!isset($_POST[$field])) {
				//$_POST[$field] is not set, set the value as ""
				${$field} = "";
			} else {

				${$field} = $_POST[$field];

			}

		}

	}

	//print_r ($missing); // for debugging purpose

	/* add more data validation here */
	// ex. $price should be a number

	/* proceed only if there is no required fields missing and all other data validation rules are satisfied */
	if (empty($missing)){

		//========================
		// processing user input

		$stmt = $conn->stmt_init();


		// compose a query: Insert or Update? Depending on whether there is a $pid.

		if ($KEYID != "") {
			/* there is an existing pid ==> need to deal with an existing reocrd ==> use an update query */

			// Ensure $pid contains an integer.
			$KEYID = intval($KEYID);

			$sql = "Update NAFDonation SET FirstName = ?, LastName = ?, Email = ?, PhoneNumber = ?, DonationType = ?, DonationDetail = ? WHERE KEYID = ?";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
				$stmt->bind_param('sssissi',$FirstName, $LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail, $KEYID);
				$stmt_prepared = 1;// set up a variable to signal that the query statement is successfully prepared.
			}

		} else {
			// no existing pid ==> this means no existing record to deal with, then it must be a new record ==> use an insert query
			$sql = "Insert Into NAFDonation (FirstName, LastName,  Email, PhoneNumber, DonationType, DonationDetail) values (?, ?, ?, ?, ?, ?)";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.

				$stmt->bind_param('sssiss',$FirstName, $LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail);
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
			}
		}

		if ($stmt_prepared == 1){
			if ($stmt->execute()){

                // NOTE: the following code does not produce most user-friendly message.  Particularly the category information is presented as an number which the user will have no idea about.  Can you fix it?

				$output = "<span class='success'>Success!</span><p>The following information has been saved in the database:</p>";
				foreach($expected as $key){
					$output .= "<b>{$label[$key]}</b>: {$_POST[$key]} <br>";
				}
				$output .= "<p><a href='donationShow.php'><button class='submit-btn'>Back to the Product List Page</button></a></p>";
			} else {
				//$stmt->execute() failed.
				$output = "<div class='error'>Database operation failed.  Please contact the webmaster.</div>";
			}
		} else {
			// statement is not successfully prepared (issues with the query).
			$output = "<div class='error'>Database query failed.  Please contact the webmaster.</div>";
		}

	} else {
		if (!empty($missing)) {
		// $missing is not empty
		$output = "<div class='error'><p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you.<br>\n<ul>\n";
		foreach($missing as $m){
			$output .= "<li>{$label[$m]}\n";
		}
		$output .= "</ul></div>\n";
	}
	$output .=" <p>$uploadMessage</p>\n";
}

} else {
	$output = "<div class='error'>Please begin your product managment operation from the <a href='donationShow.php'>admin page</a>.</div>";
}


?>

<?php
	print $HTMLHeader;
?>

<main class='flexboxContainer'>

    <div class="loginClass mobile-margin">
		<div>
        <?= $output ?>
    </div></div>

</main>

<?php print $PageFooter; ?>

</body>
</html>
