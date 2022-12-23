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

    <link rel="stylesheet" href="dist/style.css" />
  </head>

  <body>

  <?php
  include "checkSession.php";
  ?>
    <!-- BEGIN SCRIPT -->
    <script>
      var staffID = "";

      $(document).ready(function () {

        if (navigator.onLine) {
          getVcode();
        } else {
          $("#mdErrorOffline").modal("show");
          return;
        }

        $("#mdSuccessAlert").on("click", "#goNext", function (e) {
          window.location = "memberSignUp.html";
        });

        $("#mdErrorAlert").on("click", "#btError", function (e) {
          $("#mdErrorAlert").modal("hide");
          $("#myModal").modal("show");
        });

        $("#btResend").click(function () {
          $("#myModal").modal("show");
        });

        $("#myModal").on("click", "#mdBtresend", function (e) {
          staffID = $("#resendStaffID").val();

          try {
            var staff = staffID.trim();

            if (staffID.length < 1) {
              return false;
            }
          } catch (error) {}

          $.post(
            "selectEmailResend.php",
            {
              staffID: staffID,
            },
            function (data, status) {
              try {
                var output = data.split("|");
                var e = output[0];
                var c = output[1];

                if (typeof c == "undefined") {
                  $("#myModal").modal("hide");
                  $("#mdErrorAlert").modal("show");

                  return false;
                }
              } catch (error) {}

              try {
                email = e.trim();
                //  email = "prignutt@gmail.com";
                code = c.trim();
              } catch (error) {
                return;
              }

              $("#address").text(email);

              var subject = "GNATOC-AAMUSTED-K EMAIL VERIFICATION";
              var message = "Hi! \n Your Email Verification Code is:\n" + code;
              var receiver = email;
              //  alert("codeleth:"+code)

              if (code.length > 1) {
                $("#myModal").modal("hide");
                sendEmail(receiver, subject, message);
                $("#myModal").modal("hide");

                aeModelTitle = "EMAIL RESEND MADE SUCCESSFULLY!";
                aeModelBody = "We have resent your code check your email.";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
              } else {
                $("#myModal").modal("hide");
                $("#mdErrorAlert").modal("show");
              }
            }
          );
        });

        $("btResend").click(function () {
          // staffID=$("#resendID").val();
          $("#myModal").modal("hidden");
        });

        $("#myModal").modal({
          backdrop: "static",
          keyboard: false,
        });

        $("#mdSuccessAlert").modal({
          backdrop: "static",
          keyboard: false,
        });

        // FORM SUBMIT BEGINS
        $("#form").submit(function (e) {
          e.preventDefault();
          var userCode = $("#username").val();

          if (!(userCode == code)) {
            document.getElementById("invalid").style.visibility = "visible";
            return false;
          }

          $.ajax({
            url: "deleteEmailVerifiedCode.php",
            type: "post",

            data: {
              staffID: staffID,
            },
            success: function (data, status) {
              $("#mdSuccessAlert").modal("show");
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
            id="gnatocImage"
            style="width: 4rem"
            src="image/ghatocLogo.jpg"
            alt=""
          />
          <img style="width: 5rem" src="image/aamusted.png" alt="" />
        </div>

        <h3>GNATOC</h3>
        <h6>AAMUSTED-K</h6>

        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>

        <div class="form-group">
          <div class="col-12">
            <label style="float: left" for="username"
              >Email verification Code</label
            ><br />
            <div
              style="text-align: left; justify-content: flex-start; float: left"
              class="wrap"
            >
              <span style="text-align: left">We have sent a code to </span
              ><br />
              <span
                id="address"
                style="font-weight: bold; text-decoration: underline"
              >
                ***********</span
              ><br />

              <span style="text-align: left"
                >Enter the code to confirm your Email.</span
              >
            </div>
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <input
              type="text"
              id="username"
              placeholder="Enter Code"
              required
            />
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-default mt-0">Verify</button>
      <button id="btResend" type="submit" class="btn btn-default mt-2">
        Resend Code
      </button>
      <span>
        <a style="color: white; font-style: italic" href="index.php">Go Home</a>
        <br />
      </span>

      <span style="visibility: hidden" id="invalid" class="errorString"
        >Inavlid Code!
        <span>
          <i style="font-size: 2rem" class="bi bi-exclamation-triangle-fill"></i
        ></span>
      </span>
    </form>
    <!-- partial -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
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
            <p>Enter your staff ID we will resend the code to your email.</p>

            <label for="resendStaffID">Enter Staff ID</label>
            <input name="resendStaffID" id="resendStaffID" type="text" />

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
            <button id="mdBtresend" type="button" class="btn btn-primary">
              Resend Code
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL -->

    <!-- Modal HTML -->
    <div id="mdSuccessAlert" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">SUCCESS!</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <p>WE HAVE VERIFIED YOUR EMAIL SUCCESSFULLY!.</p>

            <p class="text-secondary">
              <small
                >You may now continue with the rest of the registration.</small
              >
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="goNext">
              Ok
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL -->

    <!-- Modal HTML -->
    <div id="mdErrorAlert" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">INVALID!</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <p>INVALID STAFF ID!</p>

            <p class="text-secondary">
              <small
                >Your staff Id does Not Exist. This can happen If You have
                aready verified your Email.</small
              >
            </p>
          </div>
          <div class="modal-footer">
            <button
              id="btError"
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
            >
              Ok
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL -->

    <!-- Modal HTML -->
    <div id="mdErrorOffline" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">YOU ARE OFFLINE!</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <p>NO INTERNET CONNECTION!</p>

            <p class="text-secondary">
              <small>WE COULD NOT SEND YOU YOUR CODE!</small>
            </p>
          </div>
          <div class="modal-footer">
            <button
              id="btError"
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
            >
              Ok
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
            <i
              style="font-size: 2rem; color: blue"
              class="bi bi-exclamation-triangle-fill"
            >
            </i>
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

    <script>
      var email = "";
      var code = "";

      function getVcode() {
        $.post("selectEmailVerificationCode.php", {}, function (data, status) {
          var output = data.split("|");

          var e = output[0];
          var c = output[1];
          var st = output[2];

        //  alert("email:"+e)
         // alert("code:"+c)
       //  alert("saff:"+st)

          if (typeof c == "undefined") {
            $("#myModal").modal("show");
            return;
          }

          if (c == "") {
            $("#myModal").modal("show");
            return;
          }

          if (c.length < 1) {
            $("#myModal").modal("show");
            return;
          }

          email = e.trim();
          //  email = "prignutt@gmail.com";
          code = c.trim();
          staffID = st.trim();

          $("#address").text(email);

          var subject = "GNATOC-AAMUSTED-K EMAIL VERIFICATION";
          var message = "Hi! \n Your Email Verification Code is:\n" + code;
          var receiver = email;

          try {
            var c = code.trim();
            code = c;
            if (code.length > 2) {
              sendEmail(receiver, subject, message);
            } else {
            }
          } catch (error) {}
        });
      }

      function sendEmail(receiver, subject, message) {
        $.post(
          "sendEmail2.php",
          {
            subject: subject,
            message: message,
            receiver: receiver,
          },
          function (data, status) {}
        );
      }
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
