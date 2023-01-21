<?php
 include "verifyAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gnatoc Database AAMUSTED</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

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
      html,
      body {
        background-color: #b0dbee;
        height: 100%;
        width: 100%;
        margin: auto auto;
      }

      #form {
        color: white;
        background-color: #009edf;
        border-radius: 0.3rem;
        margin: auto;
        padding: 2rem 2rem;

        -webkit-box-shadow: -1px 3px 18px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -1px 3px 18px 0px rgba(0, 0, 0, 0.75);
        box-shadow: -1px 3px 18px 0px rgba(0, 0, 0, 0.75);
      }
    </style>
    

    <style>
      #sp {
        margin-left: -2rem;
        cursor: pointer;
        position: absolute;
        z-index: 2000;
        float: right;
      }
    </style>

    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("fa-eye-slash");
            $("#show_hide_password i").removeClass("fa-eye");
          } else if (
            $("#show_hide_password input").attr("type") == "password"
          ) {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("fa-eye-slash");
            $("#show_hide_password i").addClass("fa-eye");
          }
        });

        $("#username").blur(function () {});

        $("#aeMdSuccess").on("click", "#btClose", function (e) {
          $("#aeMdSuccess").modal("hide");

          location.replace("adminPage.php");
        });

        $("#form").submit(function (e) {
          e.preventDefault();

          var staffID = $("#staffID").val();
          var email = $("#email").val();
          var mobile = $("#mobile").val();
          var username = $("#username").val();
          var password = $("#password").val();
          var confirm = $("#confirm").val();




          if(nameExists()){
          $("#username").val('')
          aeModelTitle = "USERNAME ALREADY TAKEN";
              aeModelBody =
                "Please change your username";

              $("#aeMBody").text(aeModelBody);
              $("#aeMTitle").text(aeModelTitle);
              $("#aeModelPassive").modal("show");

          return;

         }








         
          try {
            var p = password.trim();
            var c = confirm.trim();

            if (!(p == c)) {
              aeModelTitle = "PASSWORD MISMATCH";
              aeModelBody =
                "Password is not equal to confirm password. Make sure they are equal.";

              $("#aeMBody").text(aeModelBody);
              $("#aeMTitle").text(aeModelTitle);
              $("#aeModelPassive").modal("show");

              return;
            }
          } catch (error) {}

          $.post(
            "addNewAdmin_Insert.php",
            {
              staffID: staffID,
              email: email,
              mobile: mobile,
              username: username,
              password: password,
            },
            function (data, status) {
              var v = data.trim();

              if (v == 1) {
                $("#aeMdSuccess").modal("show");
              } else {
                aeModelTitle = "COULD NOT SAVE YOUR RECORD";
                aeModelBody = "STAFF ID ALREADY EXISTS.";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
              }
            }
          );
        });
      });
    </script>
  </head>
  <body>
    <div class="h-100 d-flex align-items-center justify-content-center m-1">
      <div
        class="h-100 d-flex align-items-center justify-content-center m-auto"
      >
        <form id="form">
          <div class="form-outline mb-2 text-center">
            <h3>ADD NEW ADMIN</h3>
            <i class="fa fa-male fa-3x" aria-hidden="true"></i>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-2">
            <input
              required
              type="text"
              id="staffID"
              class="form-control"
              placeholder="StaffID"
              style="font-weight: bold; color: black; background-color: white"
            />
          </div>

          <!-- Email input -->
          <div class="form-outline mb-2">
            <input
              required
              type="email"
              id="email"
              class="form-control"
              placeholder="Email"
              style="font-weight: bold; color: black; background-color: white"
            />
          </div>

          <!-- Email input -->
          <div class="form-outline mb-2">
            <input
              required
              type="tel"
              pattern="[0-9]{10}"
              id="mobile"
              class="form-control"
              placeholder="Mobile"
              style="font-weight: bold; color: black; background-color: white"
            />
          </div>

          <!-- Email input -->
          <div class="form-outline mb-2">
            <input
              required
              type="text"
              id="username"
              class="form-control"
              placeholder="New Username"
              style="font-weight: bold; color: black; background-color: white"
            />
          </div>

          <!-- Password input -->
          <div class="input-group mb-2" id="show_hide_password">
            <input
              minlength="8"
              required
              class="form-control w-100"
              id="password"
              type="password"
              placeholder="New Password"
              style="font-weight: bold; color: black; background-color: white"
            />

            <span>
              <a id="sp" href="">
                <i
                  id="eyeID"
                  style="color: rgb(33, 3, 51)"
                  class="fa fa-eye-slash"
                  aria-hidden="true"
                ></i
              ></a>
            </span>
          </div>
          <!-- Password input -->
          <div class="input-group mb-2" id="show_hide_password">
            <input
              minlength="8"
              required
              class="form-control w-100"
              id="confirm"
              type="password"
              placeholder="Confirm Password"
              style="font-weight: bold; color: black; background-color: white"
            />

            <span>
              <a id="sp" href="">
                <i
                  id="eyeID"
                  style="color: rgb(33, 3, 51)"
                  class="fa fa-eye-slash"
                  aria-hidden="true"
                ></i
              ></a>
            </span>
          </div>

          <div class="form-outline mb-2">
            <button
              style="font-weight: bold"
              class="btn-primary w-100"
              type="submit"
            >
              ADD
            </button>
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-start">
              <!-- Checkbox -->
              <div class="form-check justify-content-lg-start">
                <a style="font-weight: bold; color: blue" href="adminPage.php"
                  >Go Back?</a
                >
                <br />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

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

    <!-- BEGIN AEMODEL-->
    <div id="aeMdSuccess" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="aeMTitle" class="modal-title"><strong>SUCCESS!</strong></h5>
          </div>
          <div class="modal-body">
            <p id="aeMBody">Action Performed successfully.</p>
          </div>
          <div class="modal-footer">
            <button id="btClose" type="button" class="btn btn-primary">
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

    <script>
      function myAjax1() {
        $.ajax({
          type: "post",
          data: {
            id: id,
          },
          cache: false,
          url: "",
          dataType: "text",
          success: function (data, status) {
            //alert(data);
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }

 

      function nameExists() {
        username = $(" #username").val();

        var exist=true;

        $.ajax({
          type: "post",
          data: {
            username: username,
          },
          cache: false,
          url: "checkAdminName.php",
          async: false,
          dataType: "text",
          success: function (data, status) {
         

            if (data == "0") {
              exist=false;
            }

            if (data =="1") {
              //alert("data1: "+data);
              exist=true;
            }
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });

        return exist;
      }

      function getInput() {
        email = $("#tf_email").val();
        mobile = $("#tf_mobile").val();
        ghanaCard = $("#tf_ghanaCard").val();

        email = trimV(email);
        mobile = trimV(mobile);
        ghanaCard = trimV(ghanaCard);
      }

      function validate_mobile_g(mobile) {
        var phoneRe = /^[0-9]{10}$/;
        var digits = mobile.replace(/\D/g, "");
        return phoneRe.test(digits);
      }

      const validateEmail = (email) => {
        return String(email)
          .toLowerCase()
          .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
      };

      function aeEmpty(e) {
        var ee = "";
        try {
          ee = e.trim();
        } catch (error) {
          return true;
        }
        try {
          switch (e) {
            case "":
            case 0:
            case "0":
            case null:
            case false:
            case undefined:
              return true;
            default:
              return false;
          }
        } catch (error) {
          return true;
        }
      }

      function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

      function showErrorText(message) {
        $("#error_message").text(message);
        $("#error_message").show();
      }

      function hideErrorText() {
        $("#error_message").text("");
        $("#error_message").hide();
      }

      function showSpin() {
        $("#spin").show();
      }
      function hideSpin() {
        $("#spin").hide();
      }

      function openPage_blank(url) {
        window.open(url, "_blank");
      }
      function openPage(url) {
        window.open(url);
      }

      function showAEMsuccess(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeAlertTitle").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeAlertBody").text(aeBody);
        }
        $("#aeMsuccess").modal("show");
      }

      function showAEMsuccessw(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeAlertTitlew").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeAlertBodyw").text(aeBody);
        }
        $("#aeMsuccessw").modal("show");
      }

      function showAEMerror(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeMerrorTitle").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeMerrorBody").text(aeBody);
        }
        $("#aeMerror").modal("show");
      }

      function showMYesNo(aeBody) {
        if (!aeEmpty(aeBody)) {
          $("#aeMBody").text(aeBody);
        }
        $("#aeMyesNo").modal("show");
      }

      function passwordConfirm(a, b) {
        return a == b;
      }

      function trimV(a) {
        try {
          a = a.trim();
        } catch (error) {}
        return a;
      }

      function refreshPage() {
        location.reload();
      }

      function showCodeField() {
        $("#codeHide").show();
      }
      function hideCodeField() {
        $("#codeHide").hide();
      }

      function validateGhanaCard(ghanaCard) {
        if (aeEmpty(ghanaCard)) {
          return false;
        }
        ghanaCard = ghanaCard.toUpperCase();
        var i = ghanaCard.length;

        if (i < 8) {
          return false;
        }

        if (i > 20) {
          return false;
        }

        ii = ghanaCard.substring(0, 4);

        if (!passwordConfirm(ii, "GHA-")) {
          return false;
        }

        return true;
      }

      function openPageReplace(url) {
        location.href = url;
      }

      function validatePassword(password) {
        var passwordRegex =
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        var m =
          "must be at least 8 characters long " +
          " and contains at least one lowercase letter, one " +
          "uppercase letter, one number, and one special character";

        return passwordRegex.test(password);
      }

      function checkImageFileSize(id) {
        var file = document.getElementById(id).files[0];
        if (file.size > 1258291) {
          showAEMerror("FILE TOO LARGE");

          return false;
        }
        if (!file.type.startsWith("image/")) {
          showAEMerror("CHOOSE IMAGE FILE ONLY");
          return false;
        }
        return true;
      }

      function changeImageSRC(fileID, imageTagID) {
        var file = document.getElementById(fileID).files[0];
        document.getElementById(imageTagID).src = URL.createObjectURL(file);
      }
    </script>
  </body>
</html>
