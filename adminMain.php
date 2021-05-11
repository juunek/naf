<?php
include("dbconn.inc.php"); // database connection
include("shared_admin.php");
include("access.php");
// make database connection
$conn = dbConnect();
?>
<?php

print $HTMLHeader;


?>

                 <!-- Content start here-->
                 <div class="container-fluid">
                     <h2 class="text-center my-5 text-naf-blue">Welcome to NAF Administration</h2>

                     <div class="border-top mb-5">
                       <h3 class="text-center my-5 text-naf-blue">Forms</h3>
                       <div class="row">
                        <div class="col-lg-4">
                          <a href="donationShow.php" class="text-decoration-none">
                              <div class="admin-card d-flex justify-content-center pt-4">
                                  <h4 class="p-0 m-0 text-light">Donation</h4>

                              </div></a>
                        </div>


                            <div class="col-lg-4">
                          <a href="contactShow.php" class="text-decoration-none">
                              <div class="admin-card d-flex justify-content-center pt-4">
                                  <h4 class="p-0 m-0 text-light">Contact</h4>

                              </div></a>
                        </div>
                      </div>
                    </div>

                    <div class="border-top  mb-5">
                      <h3 class="text-center my-5 text-naf-blue">Frequently Updated</h3>
                      <div class="row">
                       <div class="col-lg-4">
                         <a href="eventsShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h4 class="p-0 m-0 text-light">Events</h4>

                             </div></a>
                       </div>

                           <div class="col-lg-4">
                         <a href="resourcesShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h4 class="p-0 m-0 text-light">Resources</h4>

                             </div></a>
                       </div>

                           <div class="col-lg-4">
                         <a href="testimonialsShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h4 class="p-0 m-0 text-light">Testimonials</h4>

                             </div></a>
                       </div>
                    </div>
                  </div>

                  <div class="border-top  mb-5">
                    <h3 class="text-center my-5 text-naf-blue">Misc</h3>
                    <div class="row">
                      <div class="col-lg-4">
                    <a href="emaillistShow.php" class="text-decoration-none">
                        <div class="admin-card d-flex justify-content-center pt-4">
                            <h4 class="p-0 m-0 text-light">Email List</h4>

                        </div></a>
                      </div>

                         <div class="col-lg-4">
                       <a href="giving-thanksShow.php" class="text-decoration-none">
                           <div class="admin-card d-flex justify-content-center pt-4">
                               <h4 class="p-0 m-0 text-light">Giving Thanks</h4>

                           </div></a>
                     </div>
                  </div>
                </div>

</div>


<?php

print $PageFooter;


?>
