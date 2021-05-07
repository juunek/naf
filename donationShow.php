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
print("<h2 class='text-center my-5 text-naf-blue'>Manage Donations</h2>");

?>

<script>
function confirmDel(FirstName, KEYID) {
// javascript function to ask for deletion confirmation

	url = "donationDelete.php?KEYID="+KEYID;
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


$sql = "SELECT KEYID, DTimeStamp, FirstName, LastName, Email, PhoneNumber, DonationType, DonationDetail FROM NAFDonation ORDER BY DTimeStamp DESC, LastName ASC";

$stmt = $conn->stmt_init();


if ($stmt->prepare($sql)) {

            /* execute statement */
            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($KEYID, $DTimeStamp, $FirstName,$LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail);

            $tblRows = "<tbody>";

            while ($stmt->fetch()) {
							$date=date('m/d/Y', strtotime($DTimeStamp));
							$fullName = "$FirstName $LastName";
							$deleteInfo = "$date - $fullName";
              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $tblRows = $tblRows."<tr>
                <td>$date</td><td>$fullName</td><td>$Email</td><td>$PhoneNumber</td><td>$DonationType</td><td>$DonationDetail</td><td><a href='donationForm.php?KEYID=$KEYID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$KEYID)'>Delete</a></td></tr></tr>";

            }

            $output = "
            <table class='table'>\n
            <thead class='table-head'>\n
            <tr><th scope='col'>Submission Date</th><th scope='col'>Full Name</th><th scope='col'>Email</th><th scope='col'>Phone Number</th><th scope='col'>Donation Type</th><th scope = 'col'>Donation Detail</th><th scope = 'col'>Options</th></tr>\n
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
                  <div><a href="donationForm.php"><span class='button'> + </span> Add a new item</a></div>
                        <div>

                            <?php echo $output ?>
                        </div>
                    </div>
                </div>


<?php

print $PageFooter;


?>
