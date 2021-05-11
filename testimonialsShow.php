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
print("<h2 class='text-center my-5 text-naf-blue'>Testimonials</h2>");

?>

<script>
function confirmDel(FirstName, TID) {
// javascript function to ask for deletion confirmation

    url = "testimonialsDelete.php?TID="+TID;
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

$total_pages_sql = "SELECT COUNT(*) FROM Testimonials";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


    $sql = "SELECT Testimonials.TID, Testimonials.TDate, Testimonials.TName, Testimonials.TDetails, Testimonials.TImage, Testimonials.TImageAltText, TestimonialCategory.TestimonialType FROM Testimonials, TestimonialCategory WHERE Testimonials.TTID = TestimonialCategory.TTID ORDER BY Testimonials.TDate DESC LIMIT $offset, $no_of_records_per_page";

 $res_data = mysqli_query($conn,$sql);

?>

<div class="container-fluid">
    <div class='flexboxContainer'>
      <div><a href="testimonialsForm.php"><span class='button'> + </span> Add a new testimonial</a></div>
      <div>
        <table class='table adminTable'>
            <thead class='table-head'>
                <tr><th scope='col'>Name</th><th scope='col'>Image</th><th scope = 'col'>Image Description</th><th scope='col'>Review Date</th><th scope='col'>Testimonial Type</th><th scope='col'>Testimonial Details</th><th scope = 'col'>Options</th></tr>
            </thead>
            <tbody>

    <?php
           while($row = mysqli_fetch_array($res_data)){


    ?>

    <?php
           $TestimonialImg = $row["TImage"];
           $TDate = date('F Y', strtotime($row["TDate"]));

    ?>

            <tr>
                <td><?php echo $row["TName"]; ?></td>
                <?php if (empty($TestimonialImg)) {
                  echo "<td></td>";
                }else {
                  echo "<td><img class='img-fluid' src=img/testimonials/$TestimonialImg></td>";
                }
                ?>

                <td><?php echo $row["TImageAltText"]; ?></td>
                <td><?php echo $TDate; ?></td>
                <td><?php echo $row["TestimonialType"]; ?></td>
                <td><?php echo $row["TDetails"]; ?></td>

                   <?php
                  $TName = $row["TName"];
                  $deleteInfo = "$TName's $TDate Testimonial";
   	              $Delete_js = htmlspecialchars($deleteInfo, ENT_QUOTES);

                $TID = $row['TID'];

                 echo "<td><a href='testimonialsForm.php?TID=$TID'>Edit</a> | <a href='javascript:confirmDel(\"$Delete_js\",$TID)'>Delete</a></td>"
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
