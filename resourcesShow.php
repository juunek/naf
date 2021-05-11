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
print("<h2 class='text-center my-5 text-naf-blue'>Resources</h2>");

?>

<script>
function confirmDel(FirstName, ResID) {
// javascript function to ask for deletion confirmation

    url = "resourcesDelete.php?ResID="+ResID;
    var agree = confirm("Are you sure you want to delete this " + FirstName + " ? ");
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

$total_pages_sql = "SELECT COUNT(*) FROM Resources";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


    $sql = "SELECT Resources.ResID, Resources.Img, Resources.Title, Resources.Lead, Resources.Description, Resources.Link, ResourcesCategory.ResourcesType FROM Resources, ResourcesCategory WHERE Resources.RID = ResourcesCategory.RID ORDER BY Resources.RID ASC LIMIT $offset, $no_of_records_per_page";

 $res_data = mysqli_query($conn,$sql);

?>

<div class="container-fluid">
    <div class='flexboxContainer'>
      <div><a href="resourcesForm.php"><span class='button'> + </span> Add a new item</a></div>
      <div>
        <table class='table adminTable'>
            <thead class='table-head'>
                <tr><th scope='col'>Resources Type</th><th scope='col'>Image</th><th scope='col'>Title</th><th scope='col'>Lead</th><th scope='col'>Description</th><th scope = 'col'>Link
                </th><th scope = 'col'>Options</th></tr>
            </thead>
            <tbody>

    <?php
           while($row = mysqli_fetch_array($res_data)){


    ?>

    <?php
           $ResourcesImg = $row["Img"];

    ?>

            <tr>
                <td><?php echo $row["ResourcesType"]; ?></td>
                <td><?php echo "<img class='img-fluid' src=img/resources/$ResourcesImg>";?></td>
                <td><?php echo $row["Title"]; ?></td>
                <td><?php echo $row["Lead"]; ?></td>
                <td><?php echo $row["Description"]; ?></td>
                <td><?php echo $row["Link"]; ?></td>

                   <?php
                  $ResourceType = $row["ResourcesType"];
                  $Title = $row["Title"];
                  $deleteInfo = "$ResourceType - $Title";
   	              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $ResID = $row['ResID'];

                 echo "<td><a href='resourcesForm.php?ResID=$ResID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$ResID)'>Delete</a></td>"
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
