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
      $(document).ready(function () {
        hideChecks();

        $("#mdErrorAlert").on("click", "#btError", function (e) {
          $("#mdErrorAlert").modal("hide");
        });

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

        $("#passwordID").keyup(function () {
          compare();
        });

        $("#confirm").keyup(function () {
          compare();
        });

        var staffID = "";
        var thisIDExist = 0;
        var usernameExist = false;

        $("#staffID").keyup(function () {
          staffID = $("#staffID").val();

          try {
            var n = staffID.trim();
            staffID = n;
          } catch (error) {
            staffID = "";
            return false;
          }
          if (staffID.length > 3) {
            //$.ajaxSetup({async: false});

            $.post(
              "selectStaffID.php",
              {
                staffID: staffID,
              },
              function (data, status) {
                staffID = "";
                var n = data;

                try {
                  var nn = n.trim();

                  if (nn === "exist") {
                    staffID = "";
                    thisIDExist = 2;

                    $("#staffID").css({
                      "background-color": "white",
                    });

                    $("#staffIDCheck").hide();
                    staffID = "";
                    $("#mdExist").modal("show");
                    return;

                    //     location.reload("")
                  } else {
                    thisIDExist = 0;
                  }

                  if (nn.length > 1) {
                    staffID = nn;

                    $("#staffID").css({
                      "background-color": "#009edf",
                    });
                    $("#staffIDCheck").show();
                  } else {
                    $("#staffID").css({
                      "background-color": "white",
                    });
                    $("#staffIDCheck").hide();
                    staffID = "";

                    $("#mdExist2").modal("show");

                    return;
                  }
                } catch (error) {
                  staffID = "";
                  return false;
                }
              }
            );
          } else {
            staffID = "";
          }
        });

        //end of staffID event

        $("#username").keyup(function () {
          username = $("#username").val();

          if (thisIDExist === 2) {
            $("#mdExist").modal("show");
            //  location.href = "alertSignUpdetailsExist.php";
            return false;
          }

          try {
            var n = username.trim();
            username = n;
          } catch (error) {
            username = "";
            return false;
          }

          if (username.length > 3) {
            //$.ajaxSetup({async: false});
            $.post(
              "selectmemberUserName.php",
              {
                username: username,
              },
              function (data, status) {
                var n = data;
                try {
                  var nn = n.trim();
                  if (nn.length > 1) {
                    username = "";
                    usernameExist = true;

                    $("#username").css({
                      "background-color": "white",
                    });
                    $("#usernameCheck").hide();

                    username = "";
                  } else {
                    usernameExist = false;

                    $("#username").css({
                      "background-color": "#009edf",
                    });
                    $("#usernameCheck").show();
                  }
                } catch (error) {
                  username = "";
                  return false;
                }
              }
            );
          } else {
            username = "";

            $("#username").css({
              "background-color": "white",
            });
            $("#usernameCheck").hide();
          }
        });

        //end of staffID event

        // FORM SUBMIT BEGINS
        $("#form").submit(function (e) {
          e.preventDefault();

          if (usernameExist) {
            $("#username").val("");
            $("#username").focus();

            aeModelTitle = "USERNAME IS ALREADY TAKEN";
            aeModelBody =
              "PLEASE CHANGE YOUR USERNAME BECAUSE IT IS NOT AVAILABLE.";

            $("#aeMBody").text(aeModelBody);
            $("#aeMTitle").text(aeModelTitle);
            $("#aeModelPassive").modal("show");

            return false;
          }

          var correctInput = compare();

          var correctID = checkStaffID_Username();

          if (correctInput && correctID) {
            try {
              $.ajax({
                url: "insertMemberPassword.php",
                type: "post",
                data: {
                  username: username,
                  password: password,
                  staffID: staffID,
                },
                success: function (data) {
                  location.replace("alertSignUpSuccess.html");
                },
              });
            } catch (error) {}
          } else {
            $("#error").show();

            var pp = $("#password").val();

            if (!passwordisOK(pp)) {
              $("#mdErrorAlert").modal("show");
            }
          }
        });

        //END FORM SUBMIT

        // BEGIN FUNCTIONS

        var username = "";

        var confirm = "";

        function compare() {
          //  username = document.getElementById('username').value;
          password = document.getElementById("passwordID").value;
          confirm = document.getElementById("confirm").value;

          if (password == "" && confirm == "") {
            document.querySelector("#error").style.visibility = "hidden";
            return false;
          }

          if (password == "") {
            document.querySelector("#error").style.visibility = "visible";

            return false;
          } else if (confirm == "") {
            document.querySelector("#error").style.visibility = "visible";

            return false;
          }

          try {
            password = password.trim();
            confirm = confirm.trim();
          } catch (err) {}

          try {
            if (password.length > 0) {
              if (password.length > 7) {
                if (passwordisOK(password)) {
                  document.querySelector("#error").style.visibility = "hidden";
                } else {
                  document.querySelector("#error").style.visibility = "visible";
                  $("#errorString").text(
                    "Password Hint: Min 8 letters, 1 number, 1 upper case, 1 lower case, 1 symbol"
                  );
                  return false;
                }
              } else {
                document.querySelector("#error").style.visibility = "visible";
                $("#errorString").text(
                  "Password Hint: Min 8 letters, 1 number, 1 upper case, 1 lower case, 1 symbol"
                );
                return false;
              }

              if (password === confirm) {
                document.querySelector("#error").style.visibility = "hidden";

                return true;
              } else {
                document.querySelector("#error").style.visibility = "visible";
                $("#errorString").text("Password Mismatch");
                return false;
              }
            }
          } catch (error) {
            return false;
          }

          return true;
        }

        function checkStaffID_Username() {
          if (staffID.length < 2) {
            $("#staffID").val("");
            $("#staffID").focus();

            return false;
          }

          if (username.length < 2) {
            $("#username").val("");
            $("#username").focus();

            return false;
          }

          return true;
        }
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

        <h3>GNATOC-AAMUSTED</h3>
        <h6>
          Member Sign Up <i class="fa fa-unlock fa-1x" aria-hidden="true"></i>
        </h6>

        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="staffID">StaffID</label>
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-id-card" aria-hidden="true"></i>
            </div>
            <input
              type="text"
              id="staffID"
              placeholder="Enter Your Staff ID"
              required
            />
            <i
              id="staffIDCheck"
              style="color: blue"
              class="fa fa-check"
              aria-hidden="true"
            ></i>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="username">Username</label>
        </div>
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
          <i
            id="usernameCheck"
            style="color: blue"
            class="fa fa-check"
            aria-hidden="true"
          ></i>
        </div>
      </div>

      <!-- begin -->
      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="password">Password</label>
        </div>
        <br />
        <div class="input-group" id="password">
          <div class="input-group-addon">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </div>
          <input
            type="password"
            id="passwordID"
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

      <!-- begin -->
      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="password">Confirm</label>
        </div>
        <br />
        <div class="input-group" id="password">
          <div class="input-group-addon">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </div>
          <input
            type="password"
            id="confirm"
            placeholder="Confirm  Password"
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

      <button id="submit" type="submit" class="btn btn-default mt-0">
        Sign Up
      </button>
      <span>
        <a style="margin-right: 2rem; color: white" href="index.php">Go Home</a>
        <br />
        <br />
      </span>

      <div
        style="visibility: hidden; margin: 0; padding: 0"
        id="error"
        class="wrap"
      >
        <span id="errorString" class="errorString1">Password Mismatch </span>

        <span>
          <i
            style="font-size: 2rem"
            class="bi bi-exclamation-triangle-fill"
          ></i>
        </span>
      </div>
    </form>
    <!-- partial -->

    <!-- Modal HTML -->
    <div id="mdErrorAlert" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">WEAK PASSWORD!</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <p>WEAK PASSWORD!</p>

            <p class="text-secondary">
              <small
                >Your pass word is too weak. Use at least 8 characters. it must
                contain at least 1 number, 1 upper case, 1 lower case, 1 symbol
              </small>
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
    <div id="mdExist" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">STAFF ID EXISTS!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal">
              X
            </button>
          </div>
          <div class="modal-body">
            <p>YOUR STAFF ID IS USED ALREADY.</p>

            <p class="text-secondary">
              <small
                >Your staff Id Exist. use the edit record form to update your
                data.
              </small>
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
    <div id="mdExist2" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">FILL FORM 1/7 FIRST!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal">
              X
            </button>
          </div>
          <div class="modal-body">
            <p>YOU HAVE NOT FILLED FORM 1/7 SO YOUR STAFF ID IS UNKNOWN!.</p>

            <p class="text-secondary">
              <small
                >please fill the first form (1/7) before you can sign Up.
              </small>
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
      function passwordisOK(str) {
        var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return re.test(str);
      }

      function hideChecks() {
        $("#staffIDCheck").hide();
        $("#usernameCheck").hide();
      }
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
