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
print("<h2 class='text-center my-5 text-naf-blue'>Manage Giving Thanks Donors</h2>");

?>

<script>
function confirmDel(FirstName, GTID) {
// javascript function to ask for deletion confirmation

    url = "giving-thanksDelete.php?GTID="+GTID;
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

$total_pages_sql = "SELECT COUNT(*) FROM GivingThanks";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


    $sql = "SELECT GTID, GTImage, GTAdditionalImage, GTAdditionalImageAltText, GTHeader, GTDetails, GTPersonName, GTPersonDetails FROM GivingThanks  ORDER BY GTID ASC LIMIT $offset, $no_of_records_per_page";

 $res_data = mysqli_query($conn,$sql);

?>

<div class="container-fluid">
    <div class='flexboxContainer'>
      <div><a href="giving-thanksForm.php"><span class='button'> + </span> Add a new donor</a></div>
      <div>
        <table class='table adminTable'>
            <thead class='table-head'>
                <tr><th scope='col'>Image</th><th scope = 'col'>Additional Image</th><th scope='col'>Additional Image Details</th><th scope='col'>GivingThanks Information</th><th scope='col'>Additional Details</th><th scope = 'col'>Options</th></tr>
            </thead>
            <tbody>

    <?php
           while($row = mysqli_fetch_array($res_data)){


    ?>

    <?php
           $GivingThanksImg = $row["GTImage"];
           $AdditionalGivingThanksImg = $row["GTAdditionalImage"];
           $GTHeader = $row["GTHeader"];
           $GTDetails = $row["GTDetails"];
           $GTPersonName = $row["GTPersonName"];
           $GTPersonDetails = $row["GTPersonDetails"];

    ?>

            <tr>
                <?php if (empty($GivingThanksImg)) {
                  echo "<td></td>";
                }else {
                  echo "<td><img class='img-fluid' src=img/$GivingThanksImg></td>";
                }

                if (empty($AdditionalGivingThanksImg)) {
                  echo "<td></td>";
                }else {
                  echo "<td><img class='img-fluid' src=img/$AdditionalGivingThanksImg></td>";
                }
                ?>

                <td><?php echo $row["GTAdditionalImageAltText"]; ?></td>
                <td><?php echo "<b>$GTHeader</b><br><br>$GTDetails"; ?></td>
                <td><?php echo "<b>$GTPersonName</b><br><br>$GTPersonDetails"; ?></td>

                   <?php
                  $deleteInfo = "$GTHeader";
   	              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $GTID = $row['GTID'];

                 echo "<td><a href='giving-thanksForm.php?GTID=$GTID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$GTID)'>Delete</a></td>"
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
