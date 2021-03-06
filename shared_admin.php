<?php
// store shared information in this file, such as headers, menu, and footers




//HTML Header
$HTMLHeader = "
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='description' content='' />
        <meta name='author' content='' />
        <title>NAF Admin</title>
        <!-- Favicon-->

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href='css/boostrap.css' rel='stylesheet' />
        <link href='css/styles.css' rel='stylesheet' />
        <link href='css/admin.css' rel='stylesheet' />
    </head>
    <body>
        <div class='d-flex' id='wrapper'>
            <!-- Sidebar-->
            <div class='bg-light border-right' id='sidebar-wrapper'>
                <div class='sidebar-heading'>
                  <a href ='index.php' target='_blank'><img src='img/naf-logo.png' alt='' height='40rem'></a>
                </div>

                <div class='list-group list-group-flush'>
                    <a class='list-group-item list-group-item-action bg-light' href='adminMain.php'>Dashboard</a>
                    <a class='list-group-item list-group-item-action bg-light' href='donationShow.php'>Donation</a>
                    <a class='list-group-item list-group-item-action bg-light' href='contactShow.php'>Contact Us</a>
                    <a class='list-group-item list-group-item-action bg-light' href='eventsShow.php'>Events</a>
                    <a class='list-group-item list-group-item-action bg-light' href='resourcesShow.php'>Resources</a>
                    <a class='list-group-item list-group-item-action bg-light' href='testimonialsShow.php'>Testimonials</a>
                    <a class='list-group-item list-group-item-action bg-light' href='emaillistShow.php'>Email List</a>
                    <a class='list-group-item list-group-item-action bg-light' href='giving-thanksShow.php'>Giving Thanks</a>
                    <a class='list-group-item list-group-item-action bg-light' href='logout.php'>Log out</a>
                </div>
            </div>
            <!-- Page Content-->
            <div id='page-content-wrapper'>
                <nav class='navbar navbar-expand-lg navbar-light bg-light border-bottom'>
                    <button class='btn btn-admin-menu' id='menu-toggle'>MENU</button>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>
                    <h5 class='ml-4 pt-2'>NAF Administration</h5>

                </nav>
";



//Page Footer
$PageFooter = "
</div>
        </div>
        <!-- Bootstrap core JS-->
        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <!-- Core theme JS-->
        <script src='js/scripts.js'></script>
    </body>
</html>

";
?>
