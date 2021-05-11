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
print("<h2 class='text-center my-5 text-naf-blue'>Manage Events</h2>");

?>

<script>
function confirmDel(FirstName, EID) {
// javascript function to ask for deletion confirmation

    url = "eventsDelete.php?EID="+EID;
    var agree = confirm("Are you sure you want to delete " + FirstName + " ? ");
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

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM Events";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


    $sql = "SELECT EID, EImagePreview, EName, EDate, EStart, EEnd, ELocation, EDescriptionPreview, FullDescription, ELinks, RegisterEvtBtn, DetailsHeader1, Details1, DetailsHeader2, Details2, DonateBtn, VolunteerBtn, SponsorBtn FROM Events ORDER BY EDate ASC LIMIT $offset, $no_of_records_per_page";

 $res_data = mysqli_query($conn,$sql);

?>

<div class="container-fluid">
    <div class='flexboxContainer'>
      <div><a href="eventsForm.php"><span class='button'> + </span> Add a new event</a></div>
      <div>
        <table class='table adminTable'>
            <thead class='table-head'>
                <tr><th scope='col'>Image Preview</th><th scope='col'>Event Name</th><th scope='col'>Event Time, Location, and Date</th><th scope='col'>Description Preview</th><th scope='col'>Full Description</th><th scope = 'col'>Information Blurb 1</th><th scope = 'col'>Information Blurb 2</th>
                <th scope = 'col'>Event Links</th><th scope = 'col'>Options</th></tr>
            </thead>
            <tbody>

    <?php
           while($row = mysqli_fetch_array($res_data)){


    ?>

    <?php
           $EventsImg = $row["EImagePreview"];
           $EName = $row["EName"];
           $EDate = date('l\,\ F jS\,\ Y', strtotime($row["EDate"]));
           $EStart = date('g:i A', strtotime($row["EStart"]));
           $EEnd = date('g:i A', strtotime($row["EEnd"]));
           $ELocation = $row["ELocation"];
           $DetailsHeader1 = $row["DetailsHeader1"];
           $Details1 = $row["Details1"];
           $DetailsHeader2 = $row["DetailsHeader2"];
           $Details2 = $row["Details2"];
           $ELinks = $row["ELinks"];
           $RegisterEvtBtn = $row["RegisterEvtBtn"];
           $DonateBtn = $row["DonateBtn"];
           $VolunteerBtn = $row["VolunteerBtn"];
           $SponsorBtn = $row["SponsorBtn"];

    ?>

            <tr>
                <td><?php echo "<img class='img-fluid' src=img/$EventsImg>";?></td>
                <td><?php echo "$EName";?></td>
                <td><?php echo "$EStart - $EEnd on $EDate at $ELocation"; ?></td>
                <td><?php echo $row["EDescriptionPreview"]; ?></td>
                <td><?php echo $row["FullDescription"]; ?></td>
                <td><?php echo "<b>$DetailsHeader1</b><br><br>$Details1"; ?></td>
                <td><?php echo "<b>$DetailsHeader2</b><br><br>$Details2"; ?></td>
                <td><?php echo "<b>Event page link:</b> $ELinks<br><br>
                                <b>Registration link:</b> $RegisterEvtBtn<br><br>
                                <b>Donation link:</b> $DonateBtn<br><br>
                                <b>Volunteer link:</b> $VolunteerBtn<br><br>
                                <b>Sponsor link:</b> $SponsorBtn<br><br>"; ?></td>

                   <?php
                  $deleteInfo = "$EName";
   	              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $EID = $row['EID'];

                 echo "<td> <a href='eventsForm.php?EID=$EID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$EID)'>Delete</a></td>"
                 ?>
            </tr>

    <?php
    };
    ?>
    </tbody>
    </table>

    <?php
    mysqli_close($conn);

    ?>
    </div>
    </div>
     <div class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a href="?pageno=1" class="page-link">First  </a></li>
            <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev  </a>
            </li>
            <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next  </a>
            </li>
            <li page-item ><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
        </ul>
    </div>






     </div>


<?php

print $PageFooter;


?>
