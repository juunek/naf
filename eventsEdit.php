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

	// define constant for upload folder
	  define('UPLOAD_DIR', '/home/krk1266/ctec4350.krk1266.uta.cloud/naf/img/resources/');

	  $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM);
	  $detectedType =exif_imagetype($_FILES['Img']['tmp_name']);

	  if (in_array($detectedType, $allowedTypes))  {

	    trim($_FILES['Img']['name']);
	    $_FILES['Img']['name']= str_replace(" ", "_", $_FILES['Img']['name']);
	    // move the file to the upload folder and rename it
	    if (move_uploaded_file($_FILES['Img']['tmp_name'], UPLOAD_DIR.$_FILES['Img']['name'])){

	        $Img = $_FILES['Img']['name'];

	        //$message = "The selected file has been successfully uploaded. <br>
	       // <a href='/upload/uploadassignment/storage/$fileName'>Click to see your uploaded file.</a>";
				 $uploadMessage="";
			} else {
	        // something is wrong
	        $uploadMessage = "<p>We have encountered issues in uploading this file.  Please try again later or contact the web master.</p>";
	    }

	  }else {
	    $uploadMessage = "<p>You cannot upload that file type! Accepted file types are .TIFF, .PNG, .JPEG, and .GIF.</p>";
		}
		if (!empty($uploadMessage)) {
			if($_POST['LogoExists'] == 'No'){
				$uploadMessage = "<ul><li>Resource Logo File $uploadMessage</li></ul>";
			}else {
				$Img = $_POST['LogoExists'];
				$uploadMessage = "";
			}
		}
	//validate user input

	// set up the required array
	$required = array("Title", "Lead", "Description", "Link", "RID"); // note that, in this array, the spelling of each item should match the form field names

	// set up the expected array
	$expected = array("ResID", "Title", "Lead", "Description", "Link", "RID", "LogoExists"); // again, the spelling of each item should match the form field names

    // set up a label array, use the field name as the key and label as the value
  $label = array ("ResID" => "Resource ID (ResID)", 'Img'=>'Image', "Title"=>'Title', "Lead"=>'Lead', "Description"=>'Description', "Link"=>'Resource Link', "RID"=>'Resource Category ID (RID)', "LogoExists"=>'Logo Exists');


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
	if (empty($missing) && empty($uploadMessage)){

		//========================
		// processing user input

		$stmt = $conn->stmt_init();


		// compose a query: Insert or Update? Depending on whether there is a $pid.

		if ($ResID != "") {
			/* there is an existing pid ==> need to deal with an existing reocrd ==> use an update query */

			// Ensure $pid contains an integer.
			$ResID = intval($ResID);

			$sql = "Update Resources SET Img = ?, Title = ?, Lead = ?, Description = ?, Link = ?, RID = ? WHERE ResID = ?";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
				$stmt->bind_param('sssssii',$Img, $Title, $Lead, $Description, $Link, $RID, $ResID);
				$stmt_prepared = 1;// set up a variable to signal that the query statement is successfully prepared.
			}

		} else {
			// no existing pid ==> this means no existing record to deal with, then it must be a new record ==> use an insert query
			$sql = "Insert Into Resources (Img, Title, Lead, Description, Link, RID) values (?, ?, ?, ?, ?, ?)";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.

				$stmt->bind_param('sssssi',$Img, $Title, $Lead, $Description, $Link, $RID);
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
			}
		}

		if ($stmt_prepared == 1){
			if ($stmt->execute()){

                // NOTE: the following code does not produce most user-friendly message.  Particularly the category information is presented as an number which the user will have no idea about.  Can you fix it?

				$output = "<h2 class='text-center text-success my-5'>Success!</h2><p>The following information has been saved in the database:</p>";
				foreach($expected as $key){
					if ($key == "LogoExists") {
						$v = $Img;
					}else {
						$v = ${$key};
					}
					$output .= "<p><b class= 'text-naf-blue'>{$label[$key]}:</b>  $v</p>";
				}
				$output .= "<p><a href='resourcesShow.php'><button class='btn btn-naf-blue w-100 mt-5'>BACK TO THE RESOURCES MANAGEMENT PAGE</button></a></p>";
			} else {
				//$stmt->execute() failed.
				$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>Database operation failed.  Please contact the webmaster.</p>";
			}
		} else {
			// statement is not successfully prepared (issues with the query).
			$output = "<h2 class='text-center text-danger my-5'>Error</h2><p class='text-center'>Database query failed.  Please contact the webmaster.<p>";
		}

	} else {
		if (!empty($missing)) {
		// $missing is not empty
		$output = "<h2 class='text-center text-danger my-5'>Missing Form Fields</h2><p class='text-center'>The following required fields are missing in your form submission.  Please check your form again and fill them out.</p>\n<ul>\n";
		foreach($missing as $m){
			$output .= "<li class='text-naf-blue'>{$label[$m]}\n";
		}
		$output .=" <p>$uploadMessage</p>\n";
		if ($ResID != "") {
			$output .= "</ul><a href='resourcesForm.php?ResID=$ResID'> <p>$uploadMessage</p>\n <button class='btn btn-naf-blue w-100 mt-5'>BACK TO THE RESOURCES FORM PAGE</button></a></div>\n";
		}else {
			$output .= "</ul><a href='resourcesForm.php'><button class='btn btn-naf-blue w-100 mt-5'>BACK TO THE RESOURCES FORM PAGE</button></a></div>\n";
		}
	}
}

} else {
	$output = "<h2 class='text-center text-danger my-5'>Invalid Request</h2><p class='text-center'>Please begin your donation managment operation from the <a href='resourcesShow.php'>Resources Page</a>.</p>";
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
