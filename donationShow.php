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


$sql = "SELECT KEYID, FirstName, LastName, Email, PhoneNumber, DonationType, DonationDetail FROM NAFDonation ORDER BY LastName";

$stmt = $conn->stmt_init();


if ($stmt->prepare($sql)) {

            /* execute statement */
            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($KEYID, $FirstName,$LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail);

            $tblRows = "<tbody>";

            while ($stmt->fetch()) {
              $Delete_js = htmlspecialchars($FirstName, ENT_QUOTES);

                $tblRows = $tblRows."<tr>
                <td>$FirstName</td><td>$LastName</td><td>$Email</td><td>$PhoneNumber</td><td>$DonationType</td><td>$DonationDetail</td><td><a href='donationForm.php?KEYID=$KEYID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$KEYID)'>Delete</a></td></tr></tr>";

            }

            $output = "
            <table class='table'>\n
            <thead class='' style='background-color: #0B5BAB!important;'>\n
            <tr><th scope='col'>First Name</th><th scope='col'>Last Name</th><th scope='col'>Email</th><th scope='col'>Phone Number</th><th scope='col'>Donation Type</th><th scope = 'col'>Donation Detail</th><th scope = 'col'>Options</th></tr>\n
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
