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

                 <!-- Content start here-->
                 <div class="container-fluid">
                     <h2 class="text-center my-5 text-naf-blue">Welcome to NAF Administration</h2>

                     <div class="row">
                      <div class="col-lg-4">
                        <a href="" class="text-decoration-none">
                            <div class="admin-card d-flex justify-content-center pt-4">
                                <h4 class="p-0 m-0 text-light">Donation</h4>

                            </div></a>
                      </div>

                          <div class="col-lg-4">
                        <a href="" class="text-decoration-none">
                            <div class="admin-card d-flex justify-content-center pt-4">
                                <h4 class="p-0 m-0 text-light">Events</h4>

                            </div></a>
                      </div>

                          <div class="col-lg-4">
                        <a href="" class="text-decoration-none">
                            <div class="admin-card d-flex justify-content-center pt-4">
                                <h4 class="p-0 m-0 text-light">Contact</h4>

                            </div></a>
                      </div>


                    </div>
                </div>
    


<?php 

print $PageFooter;


?>