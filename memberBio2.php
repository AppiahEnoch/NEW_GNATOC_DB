<?php
  include "checkSession.php";
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>GNATOC-AAMUSTED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- FONTS -->
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
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <style>
      #success-alert {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        text-align: center;
        font-size: large;
        display: none;
      }
    </style>
  </head>
  <link rel="stylesheet" href="dist/style.css" />
  <link rel="stylesheet" href="w3css.css" />
  <body>



<div id="success-alert" class="w3-panel">
      Your message was sent successfully!
    </div>
    <!-- BEGIN SCRIPT -->
    <script>
      $(document).ready(function () {
        $("#password a").on("click", function (event) {
          event.preventDefault();

          if ($("#password input").attr("type") == "text") {
            $("#password input").attr("type", "password");
            $("#password #eyeID").addClass("fa-eye-slash");
            $("#password #eyeID").removeClass("fa-eye");
          } else if ($("#password input").attr("type") == "password") {
            $("#password input").attr("type", "text");
            $("#password #eyeID").removeClass("fa-eye-slash");
            $("#password #eyeID").addClass("fa-eye");
          }
        });
      });
    </script>

    <!-- END SCRIPT -->

    <!-- partial:index.partial.html -->
    <form id="form" action="memberBio2_insert.php" method="post">
      <div class="form-outline mb-2 text-center m-1">
        <div class="row align-items-center justify-content-center">
          <img
            style="width: 4rem; height: 4rem; border-radius: 50%"
            id="gnatocImage"
            src="image/ghatocLogo.jpg"
            alt=""
          />
          <img style="width: 5rem" src="image/aamusted.png" alt="" />
        </div>
        <h3>GNATOC</h3>
        <h6>AAMUSTED-K</h6>
        2 of 8

        <!-- begin -->

        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="fName">First Name</label>
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <input
              name="fName"
              type="text"
              id="fName"
              placeholder="First name"
              required
              minlength="2"
            />
          </div>
        </div>
      </div>
      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="email">Middle name(s)</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <input
            name="mName"
            type="text"
            id="mName"
            placeholder="Middle name(s)"
          />
        </div>
      </div>

      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="lName">Last name</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <input
            name="lName"
            type="text"
            id="lName"
            placeholder="Last name"
            required
            minlength="2"
          />
        </div>
      </div>

      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="regNumber">Registered Number</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-id-card" aria-hidden="true"></i>
          </div>
          <input
            name="regNumber"
            type="text"
            id="regNumber"
            placeholder="Registered Number"
            required
            minlength="4"
          />
        </div>
      </div>

      <!-- end -->

      <button type="submit" class="btn btn-default mt-0">
        Next
        <i style="margin-left: 1rem" class="bi bi-fast-forward-fill"></i>
      </button>

      <span>
        <a style="margin-right: 2rem; color: white" href="#!">Back to Login</a>
        <br />
        <br />
      </span>
    </form>
    <!-- partial -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
