<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("access.php");
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

?>

<?php

print $HTMLHeader;
print("<h2 class='text-center my-5 text-naf-blue'>Manage Contact Inquiries</h2>");

?>

<script>
function confirmDel(FirstName, CID) {
// javascript function to ask for deletion confirmation

	url = "contactDelete.php?CID="+CID;
	var agree = confirm("Delete this item: " + FirstName + " ? ");
	if (agree) {
		// redirect to the deletion script
		location.href = url;
	}
	else {
		// do nothing
		return;
	}
}
</script>


<?php


$sql = "SELECT CID, CTimeStamp, CFirstName, CLastName, CEmail, CPhone, CSubject, CDetails FROM NAFContact ORDER BY CTimeStamp DESC";

$stmt = $conn->stmt_init();


if ($stmt->prepare($sql)) {

            /* execute statement */
            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($CID, $CTimeStamp, $FirstName,$LastName, $Email, $Phone, $Subject, $CDetails);

            $tblRows = "<tbody>";

            while ($stmt->fetch()) {
							$date=date('m/d/Y', strtotime($CTimeStamp));
							$fullName = "$FirstName $LastName";
							$deleteInfo = "$date - $fullName";
              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $tblRows = $tblRows."<tr>
                <td>$date</td><td>$fullName</td><td>$Email</td><td>$Phone</td><td>$Subject</td><td>$CDetails</td><td><a href='contactForm.php?CID=$CID'>Reply</a> | <a href='javascript:confirmDel(\"$Delete_js\",$CID)'>Delete</a></td></tr></tr>";

            }

            $output = "
            <table class='table'>\n
            <thead class='table-head'>\n
            <tr><th scope='col'>Submission Date</th><th scope='col'>Full Name</th><th scope='col'>Email</th><th scope='col'>Phone Number</th><th scope='col'>Subject</th><th scope = 'col'>Contact Detail</th><th scope = 'col'>Options</th></tr>\n
            <thead>\n".$tblRows.
            "</tbody>\n</table>\n";

            $stmt->close();

    } else {
            $output = "Query to retrieve product information failed.";
    }

    $conn->close();

?>

                 <!-- Content start here-->
                <div class="container-fluid">
                <div class='flexboxContainer'>
                        <div>

                            <?php echo $output ?>
                        </div>
                    </div>
                </div>


<?php

print $PageFooter;


?>
