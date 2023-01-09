
<?php
  session_start();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GNATOC-AAMUSTED-K</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    $(document).ready(function() {
        $("#btnRegister").click(function() {
            location.replace("memberBio1.html");
        });
    });
    </script>




</head>

<body>




    <!-- NAV BAR BEGINS-->

    <nav class="navbar  navbar-expand-md navbar-expand-lg py-3 navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img style="border-radius: 50%; width: 5rem;"   src="image/ghatocLogo.jpg" alt="" />
                <span style="font-weight: bold; color: #3d8bfd">
                    GNATOC-AAMUSTED-K</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">News
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>

                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </li>

                 
                </ul>
                <a href="memberBio1.html" class="btn btn-primary ms-lg-3">Register</a>
            </div>
        </div>
    </nav>
    <!-- END NAV BAR-->

    <!-- HERO SESSION BEGINS-->

    <div class="row m-0">
        <marquee style="width: 100" behavior="scroll" direction="left" scrollamount="5">
            <h3>
                All continuing students (level 200-400 students) must complete their
                registration on our new database before school resumes. Thank you.
            </h3>
        </marquee>
    </div>

    <div class="hero vh-100 d-flex align-items-lg-start align-items-sm-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1 style="margin: 0; font-weight: bold" class="display-4">
                        GNATOC-AAMUSTED-K
                    </h1>

                    <a id="btnRegisterNow" href="memberBio1.html" class="btn btn-primary">
                        Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>
            &copy; 2022 GNATOC-AAMUSTED-K <br />
            <i class="bi bi-envelope-fill"></i>
            <span>aamustedgnatoc@gmail.com</span> <br />
            <i class="bi bi-telephone-forward-fill"></i>
            <span>Tel: 0257705314 </span>
            <br>
            <span style="align-items: left;  text-align: left;">Powered by: AECleanCodes: 0549822202 </span>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>




</body>

</html>