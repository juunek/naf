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
                 <div class="container pt-md-4 pt-sm-3">
                
                     <div class="mb-5 mt-5">
                       <h3 class="text-center mb-4 mt-5 text-naf-blue">Forms</h3>
                       <div class="row">
                        <div class="col-lg-4">
                          <a href="donationShow.php" class="text-decoration-none">
                              <div class="admin-card d-flex justify-content-center pt-4">
                                  <h5 class="p-0 m-0 text-light">DONATION</h5>
                              </div></a>
                        </div>


                            <div class="col-lg-4">
                          <a href="contactShow.php" class="text-decoration-none">
                              <div class="admin-card d-flex justify-content-center pt-4">
                                  <h5 class="p-0 m-0 text-light">CONTACT US</h5>

                              </div></a>
                        </div>
                      </div>
                    </div>

                    <div class="border-top mb-3">
                      <h3 class="text-center mb-4 mt-5 text-naf-blue">Other</h3>
                      <div class="row">
                       <div class="col-lg-4">
                         <a href="eventsShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h5 class="p-0 m-0 text-light">EVENTS</h5>
                             </div></a>
                       </div>

                           <div class="col-lg-4">
                         <a href="resourcesShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h5 class="p-0 m-0 text-light">RESOURCES</h5>
                             </div></a>
                       </div>

                           <div class="col-lg-4">
                         <a href="testimonialsShow.php" class="text-decoration-none">
                             <div class="admin-card d-flex justify-content-center pt-4">
                                 <h5 class="p-0 m-0 text-light">TESTIMONIALS</h5>
                             </div></a>
                       </div>
                    </div>
                  </div>

                  
                    <div class="row">
                      <div class="col-lg-4">
                    <a href="emaillistShow.php" class="text-decoration-none">
                        <div class="admin-card d-flex justify-content-center pt-4">
                            <h5 class="p-0 m-0 text-light">EMAIL LIST</h5>

                        </div></a>
                      </div>

                         <div class="col-lg-4">
                       <a href="giving-thanksShow.php" class="text-decoration-none">
                           <div class="admin-card d-flex justify-content-center pt-4">
                               <h5 class="p-0 m-0 text-light">GIVING THANKS</h5>

                           </div></a>
                     </div>
                  </div>
                

</div>


<?php

print $PageFooter;


?>
