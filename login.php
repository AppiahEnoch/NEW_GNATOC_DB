<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>GNATOC-AAMUSTED KUMASI</title>
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

    <link rel="stylesheet" href="dist/style.css" />


    <?php
  session_start();
  session_destroy();
?>


  </head>

  <body>


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

        $("#forgotPassword").click(function () {
          $("#mdForgotPassword").modal("show");
        });

        $("#mdForgotPassword").on("click", "#btSendPassword", function (e) {
          var id = $("#resendPassword").val();

          $.post(
            "getLoginDetails.php",
            {
              id: id,
            },
            function (data, status) {
              var output = data.split("|");
              var realName = output[0];
              var username2 = output[1];
              var password2 = output[2];
              var email = output[3];
              var em = "";
              try {
                em = email.trim();
              } catch (error) {}

              if (em.length < 2) {
                $("#mdForgotPassword").modal("hide");
                aeModelTitle = "UNKNOWN STAFF ID";
                aeModelBody = "Please complete Your Registration.";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
              }

              if (em.length > 2) {
                $("#mdForgotPassword").modal("hide");

                var subject = "GNATOC-AAMUSTED-K PASSWORD RECOVERY";
                var message =
                  "   Hi " +
                  realName +
                  "\n" +
                  " Your Correct login Details Are Below: \n\n" +
                  "  USERNAME: " +
                  username2 +
                  " \n" +
                  "  PASSWORD: " +
                  password2 +
                  "\n ";
                var receiver = em;

                $.post(
                  "sendEmail2.php",
                  {
                    subject: subject,
                    message: message,
                    receiver: receiver,
                  },
                  function (data, status) {
                    aeModelTitle = "LOGIN DETAILS RECOVERED SUCCESSFULLY!";
                    aeModelBody = "Check your email.";

                    $("#aeMBody").text(aeModelBody);
                    $("#aeMTitle").text(aeModelTitle);
                    $("#aeModelPassive").modal("show");
                  }
                );
              }
            }
          );
        });

        $("#username").keyup(function () {
          document.getElementById("invalid").style.visibility = "hidden";
        });
        $("#password").keyup(function () {
          document.getElementById("invalid").style.visibility = "hidden";
        });

        // FORM SUBMIT BEGINS
        $("#form").submit(function (e) {
          e.preventDefault();
          var username = $("#username").val();
          var password = $("#password1").val();

          $.ajax({
            url: "validateLogin.php",
            type: "post",

            data: {
              username: username,
              password: password,
            },
            success: function (data, status) {
              //alert(data);
              try {
                var output = data;
                var nn = output.trim();
                //  alert("raw data: "+data);

                var outputValue = 0;
                try {
                  outputValue = parseFloat(nn);
                } catch (error) {
                  outputValue = 0;
                }

                 alert(outputValue);

                if (outputValue > 0) {
                  if (outputValue == 1) {
                    location.replace("memberPortal.php");
                  } else if (outputValue == 2) {
                    location.replace("memberBio2.php");
                  } else if (outputValue == 3) {
                    location.replace("memberBio3.php");
                  } else if (outputValue == 4) {
                    location.replace("memberBio4.php");
                  } else if (outputValue == 5) {
                    location.replace("memberBio5.php");
                  } else if (outputValue == 6) {
                    location.replace("memberBio6.php");
                  } else if (outputValue == 7) {
                    location.replace("memberBio7.php");
                  } else if (outputValue == 8) {
                    location.replace("memberBio8.php");
                  } else if (outputValue == 900) {
                    location.replace("adminPage.php");
                  }

                  //location.replace("in.dex.html");
                  // location.replace("login.php");
                } else {
                  document.getElementById("invalid").style.visibility =
                    "visible";
                }
              } catch (error) {
                $(".errorString").show();
              }
            },
          });
        });

        //END FORM SUBMIT
      });
    </script>

    <!-- END SCRIPT -->

    <!-- partial:index.partial.html -->
    <form id="form" method="post">
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

        <div class="form-group">
          <div class="col w-100"></div>
          <label style="float: left" for="username">Username</label>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <input
              type="text"
              id="username"
              placeholder="Enter Your Username"
              required
            />
          </div>
        </div>
      </div>

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100"></div>
        <label style="float: left" for="password">Password</label>
        <br />
        <div class="input-group" id="password">
          <div class="input-group-addon">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </div>
          <input
            type="password"
            id="password1"
            placeholder="Enter Your Password"
            required
          />
          <span>
            <a id="sp" href="">
              <i id="eyeID" class="fa fa-eye-slash" aria-hidden="true"></i
            ></a>
          </span>
        </div>
      </div>

      <!-- end -->

      <button type="submit" class="btn btn-default mt-0">Login</button>
      <span>
        <br />
        <br />
        <a
          style="margin-right: 2rem; color: white"
          href="memberBio1.html
            "
          >New Gnatoc Member</a
        >
        <br />

        <a id="forgotPassword" style="color: white; font-style: italic" href="#"
          >Forgot Password</a
        >
        <br />
        <a style="color: white; font-style: italic" href="index.php">Go Home</a>
        <br />
      </span>

      <span style="visibility: hidden" id="invalid" class="errorString"
        >Inavlid Login Details
        <span>
          <i style="font-size: 2rem" class="bi bi-exclamation-triangle-fill"></i
        ></span>
      </span>
    </form>
    <!-- partial -->

    <!-- Modal HTML -->
    <div id="mdForgotPassword" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ENTER YOUR STAFF ID</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <p>We will send Your Login Details to your email.</p>

            <label for="resendStaffID">Enter Staff ID</label>
            <input id="resendPassword" type="text" />

            <p class="text-secondary"><small></small></p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              cancel
            </button>
            <button id="btSendPassword" type="button" class="btn btn-primary">
              Send
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL -->

    <!-- BEGIN AEMODEL-->
    <div id="aeModelPassive" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="aeMTitle" class="modal-title">Modal title</h5>
          </div>
          <div class="modal-body">
            <p id="aeMBody">Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              data-bs-dismiss="modal"
              class="btn btn-primary"
            >
              Ok
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- END AEMODEL-->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
