<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GNATOC-AAMUSTED</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Merriweather+Sans"
      rel="stylesheet"
    />

    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />

    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
      integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <style>
      body {
        line-height: 1.7;
        background-color: #031633;
        color: white;
      }

      .navbar {
        width: 100%;
        color: #b0dbee;
        font-weight: bolder;

        position: sticky;
        z-index: 1;
        top: 0;
      }

      .hero {
        background-image: url("devImage/db.PNG");
        background-position: center;
        background-size: cover;

        background-attachment: fixed;
        background-size: contain;
        background-repeat: no-repeat;

        position: relative;
        background-color: #031633;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #212529;
        color: white;
        text-align: center;
      }
    </style>

    <!-- SCRIPTS BEGIN-->

    <script>
      $(document).ready(function () {
        $("#btnRegister").click(function () {
          location.replace("memberBio1.html");
        });
        $("#resetPassword").click(function () {
          $("#myModalResetPassword").modal("show");
        });
      });
    </script>
  </head>

  <body>

  <?php
  include "verifyAdmin.php";
  ?>
    <!-- NAV BAR BEGINS-->

    <nav
      class="navbar navbar-expand-md navbar-expand-lg py-3 navbar-dark bg-dark"
    >
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img style="width: 5rem" src="devImage/Ll3.png" alt="" />
          <span style="font-weight: bold; color: #3d8bfd">
            GNATOC-AAMUSTED-K</span
          >
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="generateCode.php">CODE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Receive Dues</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Records</a>
            </li>
            <li class="nav-item">
              <a
                id="resetPassword"
                class="nav-link"
                href="resetAdminPassword.html"
                >Reset Password</a
              >
            </li>
            <li class="nav-item">
              <a id="resetPassword" class="nav-link" href="addAdmin.php"
                >New Admin</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAV BAR-->

    <div class="footer">
      <p>
        &copy; 2022 GNATOC-AAMUSTED-K <br />
        <i class="bi bi-envelope-fill"></i>
        <span>aamustedgnatoc@gmail.com</span> <br />
        <i class="bi bi-telephone-forward-fill"></i>
        <span>Tel: 0257705314 </span>
      </p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>