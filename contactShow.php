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
print("<h2 class='text-center my-5 text-naf-blue'>Contact Inquiries</h2>");

?>

<script>
function confirmDel(FirstName, CID) {
// javascript function to ask for deletion confirmation

	url = "contactDelete.php?CID="+CID;
	var agree = confirm("Delete this message from " + FirstName + " ? ");
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

$total_pages_sql = "SELECT COUNT(*) FROM NAFContact";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);



$sql = "SELECT CID, CTimeStamp, CFirstName, CLastName, CEmail, CPhone, CSubject, CDetails, CReplied FROM NAFContact ORDER BY CTimeStamp DESC LIMIT $offset, $no_of_records_per_page";

 $res_data = mysqli_query($conn,$sql);

?>
<div class="container-fluid">
    <div class='flexboxContainer'>
      <div>
        <table class='table adminTable'>
            <thead class='table-head'>
                <tr><th scope='col'>Submission Date</th><th scope='col'>Full Name</th><th scope='col'>Email</th><th scope='col'>Phone Number</th><th scope = 'col'>Subject</th><th scope = 'col'>Details</th><th scope = 'col'>Replied</th><th scope = 'col'>Option</th></tr>
            </thead>
            <tbody>

    <?php
           while($row = mysqli_fetch_array($res_data)){

    ?>

		<?php
				$CFirstName = $row["CFirstName"];
				$CLastName = $row["CLastName"];
				$fullName = "$CFirstName $CLastName";
		?>

            <tr>
                <td><?php echo $date=date('m/d/Y', strtotime($row["CTimeStamp"])); ?></td>
                <td><?php echo $fullName?></td>
                <td><?php echo $row["CEmail"]; ?></td>
                <td><?php echo $row["CPhone"]; ?></td>
                <td><?php echo $row["CSubject"]; ?></td>
                <td><?php echo $row["CDetails"]; ?></td>
								<td><?php echo $row["CReplied"]; ?></td>

                <?php
								$deleteInfo = "$fullName on $date";
	              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $CID = $row['CID'];

                 echo "<td><a href='contactForm.php?CID=$CID'>Reply</a> | <a href='javascript:confirmDel(\"$Delete_js\",$CID)'>Delete</a></td>"
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
