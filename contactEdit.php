<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// Process only if there is any submission
if (isset($_POST['Submit'])) {
	// ==========================
	//validate user input

	// set up the required array
	$required = array("Reply"); // note that, in this array, the spelling of each item should match the form field names

	// set up the expected array
	$expected = array("CID", "CFirstName", "CLastName", "CEmail", "CSubject", "Reply"); // again, the spelling of each item should match the form field names

    // set up a label array, use the field name as the key and label as the value
  $label = array ("CID" => "CID", "CFirstName" => "CFirstName", "CLastName" => "CLastName", "CEmail" => "CEmail", "CSubject" => "CSubject", "Reply"=>'Reply');


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
		// compose a query: Insert or Update? Depending on whether there is a $pid.

		if ($CID != "") {
			/* there is an existing pid ==> need to deal with an existing reocrd ==> use an update query */

			// Ensure $pid contains an integer.
			$CID = intval($CID);


			$output = "<h2 class='text-center text-success my-5'>Success!</h2><p>Your reply was sent, you sent the following information:</p>";
			foreach($expected as $key){
				$output .= "<p><b class= 'text-naf-blue'>{$label[$key]}:</b>  {$_POST[$key]}</p>";
			}
			$emailC = "<a href=mailto:$CEmail>$CEmail</a>";
			$to="kathryn.kerr@mavs.uta.edu, $CEmail"; // change this to your own email address
			$subject="RE: $CSubject";
			$header="From: Neuro Assistance Foundation <naf@gmail.com>";
			$message="$Reply";
	// try setting $message = $output; and see what you receive in the email

			$mailSent = mail($to,$subject,$message,$header);

	// add $emailResultMessage to the comment preview table as the final output
			$output = $output.$emailResultMessage;

			$output .= "<p><a href='contactShow.php'><button class='btn btn-naf-blue w-100 mt-5'>Back to the Contact Management Page</button></a></p>";

		} else {
			// no existing pid ==> this means no existing record to deal with, then it must be a new record ==> use an insert query
			$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>The contact request doesn't exist</p>";
		}
} else {
		if (!empty($missing)) {
		// $missing is not empty
		$output = "<h2 class='text-center text-danger my-5'>Missing Form Fields</h2><p class='text-center'>The following required fields are missing in your form submission.  Please check your form again and fill them out.</p>\n<ul>\n";
		foreach($missing as $m){
			$output .= "<li class='text-naf-blue'>{$label[$m]}\n";
		}
		if ($CID != "") {
			$output .= "</ul><a href='contactForm.php?CID=$CID'><button class='btn btn-naf-blue w-100 mt-5'>Back to the Contact Form Page</button></a></div>\n";
		}else {
			$output .= "</ul><a href='contactForm.php'><button class='btn btn-naf-blue w-100 mt-5'>Back to the Contact Form Page</button></a></div>\n";
		}
	}
}

} else {
	$output = "<h2 class='text-center text-danger my-5'>Invalid Request</h2><p class='text-center'>Please begin your contact managment operation from the <a href='contactShow.php'>Contact Page</a>.</p>";
}

?>

<?php
	print $HTMLHeader;
?>
  <div class="container">
		<div class="col-10 mx-auto">
        <?= $output ?>
    </div>
	</div>


<?php print $PageFooter; ?>

</body>
</html>
