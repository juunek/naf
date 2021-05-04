<?php
session_start();
include("dbconn.inc.php"); // database connection 
include("shared_admin.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

function GoToNow ($url){
    echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
}

// make database connection
$conn = dbConnect();
if(!isset($_SESSION["username"])){
 $url = "http://ctec4350.krk1266.uta.cloud/naf/login.php";
 GoToNow($url);
exit(); }

?>

<?php 

print $HTMLHeader;


?>


<?php 


$sql = "SELECT FirstName, LastName, Email, PhoneNumber, DonationType, DonationDetail FROM NAFDonation ORDER BY LastName";

$stmt = $conn->stmt_init();


if ($stmt->prepare($sql)) {
            
            /* execute statement */
            $stmt->execute();
        
            /* bind result variables */
            $stmt->bind_result($FirstName,$LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail);

            $tblRows = "<tbody>";

            while ($stmt->fetch()) {

                $tblRows = $tblRows."<tr>
                <td>$FirstName</td><td>$LastName</td><td>$Email</td><td>$PhoneNumber</td><td>$DonationType</td><td>$DonationDetail</td></tr>";

            }

            $output = "
            <table class='table'>\n
            <thead class='' style='background-color: #0B5BAB!important;'>\n
            <tr><th scope='col'>Last Name</th><th scope='col'>Last Name</th><th scope='col'>Email</th><th scope='col'>Phone Number</th><th scope='col'>Donation Type</th><th scope = 'col'>Donation Detail</th></tr>\n
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
