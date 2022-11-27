<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GNATOC-AAMUSTED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c1db89cf54.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dist/style.css">
</head>

<body>
    <!-- BEGIN SCRIPT -->
    <script>
    $(document).ready(function() {




        $("#submit").click(function() {


            location.replace("memberSignUp.html");

        });



    });
    </script>

    <!-- END SCRIPT -->

    <!-- partial:index.partial.html -->
    <form id="form">
        <div class="form-outline mb-2 text-center m-1">
            <div class="row align-items-center justify-content-center">
                <img id="gnatocImage" style="width: 4rem;"   src="image/ghatocLogo.jpg" alt="" />
                <img style="width: 5rem" src="image/aamusted.png" alt="" />
            </div>

            <h3>GNATOC-AAMUSTED</h3>
            <!-- begin -->

            <div class="form-group">
                <h5>ERROR!</h5>
                <H6>YOUR STAFF ID ALREADY EXIST. USE THE PASSWORD RESET FORM TO RESET YOUR PASSWORD</H6>



            </div>
            <!-- end -->



            <button id="submit" type="button" class="btn btn-default mt-0">OK
                <i style="margin-left: 1rem ; " class="bi bi-exclamation-triangle-fill"></i>
            </button>

    </form>
    <!-- partial -->








































































    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>