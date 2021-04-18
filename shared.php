<?php
$htmlNav= "<!doctype html>
<html lang=\"en\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">
    <!-- Bootstrap CSS -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" integrity=\"sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN\" crossorigin=\"anonymous\">

    <script type=\"text/javascript\">

    </script>

    <title>Neuro Assitance Foundation</title>


  </head>
<body>

<div class=\"container\">
      <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">

         <a class=\"navbar-brand\" href=\"index.php\">
          <img src=\"img/naf-logo.png\" alt=\"Neuro Assistance Foundation Logo\" height=\"40rem\">
        </a>

        <button class=\"btn btn-primary ms-auto\" id=\"btn-donate-tablet\" href=\"#\">DONATE</button>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse d-flex-lg justify-content-end\" id=\"navbarSupportedContent\">

          <ul class=\"navbar-nav mb-2 mb-lg-0 text-center\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"about.php\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">About</a>
                  <div class=\"dropdown-menu bg-light text-lg-left text-md-center text-sm-center border-0\">
                    <a class=\"dropdown-item\" href=\"contact.php\">Contact</a>
                    <a class=\"dropdown-item\" href=\"email-list.php\">Join Email List</a>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"community.php\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Community</a>
                  <div class=\"dropdown-menu bg-light text-lg-left text-md-center text-sm-center border-0\">
                    <a class=\"dropdown-item\" href=\"testimonials.php\">Testimonials</a>
                    <a class=\"dropdown-item\" href=\"giving-thanks\">Giving Thanks</a>
                    <a class=\"dropdown-item\" href=\"newsletter.php\">Newsletter</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"events.php\">Events</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"resources.php\">Resources</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"\">Get Involved</a>
            </li>
             <li class=\"nav-item\">
              <button class=\"btn btn-primary\" id=\"btn-donate-collapsemenu\" href=\"#\">DONATE</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>";


$htmlFooter="<footer>
<div class =\"row bg-primary p-5\">
  <div class=\"col-lg-4\">
    <h4 class =\"text-white\">Connect with us</h4>
    <div class =\"social-media text-white\">
      <i class=\"fa fa-facebook-square\"></i>
      <i class=\"fa fa-linkedin\"></i>
    </div>
  </div>
  <div class=\"col-lg-4\">
    <h4 class =\"text-white\">Sitemap</h4>
      <div class=\"row\">
        <div class=\"col-lg-2\">
            <div class=\"textwhite\">
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
              <a href=\"#\">Home</a>
            </div>
        </div>
        <div class=\"col-lg-2\">
          <div class=\"textwhite\">
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
            <a href=\"#\">Home</a>
          </div>
      </div>
    </div>
  </div>
      <div class=\"col-lg-4\">
        <h4 class =\"text-white\">Join our email list</h4>
        <form>
            <div class=\"mb-3\">
              <label for=\"email-newsletter\" class=\"form-label text-white\">Email Address</label>
              <input type=\"email\" class=\"form-control\" id=\"email-newsletter\" aria-describedby=\"emailHelp\">
            </div>
            <div class=\"mb-3\">
              <label for=\"firstname-newsletter\" class=\"form-label text-white\">First Name:</label>
              <input type=\"text\" class=\"form-control\" id=\"firstname-newsletter\">
            </div>
            <div class=\"mb-3\">
              <label for=\"lastname-newsletter\" class=\"form-label text-white\">Last Name:</label>
              <input type=\"text\" class=\"form-control\" id=\"lastname-newsletter\">
            </div>
            <button type=\"submit\" class=\"clear-bg\">SIGN UP</button>
        </form>
      </div>
      <div class=\"text-center text-white mt-5\">
          © Neuro Assistance Foundation is a a 501(c)(3) Public Charity
      </div>
</div>

 </div>

</footer>



    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf\" crossorigin=\"anonymous\"></script>
    <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js\"></script>

 </body>
</html>";
?>
