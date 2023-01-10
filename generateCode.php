<?php
  include "verifyAdmin.php";
  ?>
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

    <link rel="stylesheet" href="w3css.css" />
    <link rel="stylesheet" href="dist/style.css" />
  </head>

  <body >
    

    



    <!-- BEGIN SCRIPT -->
    <script>
      $(document).ready(function () {
        $("#download").click(function (e) {
          e.preventDefault();
          var level = $("#level").val();

          if(aeEmpty(level)){

            aeModelTitle = "WHICH LEVEL ?";
                aeModelBody =
                  "Enter Members level to Download their Codes";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
                return false;
          }

  

          $.post(
            "selectAllAutCodes.php",
            {
              level: level,
            },
            function (data, status) {

      
       
              window.open('output/AUTHENTICATION_CODES.pdf', '_blank');
              
      
         
            }
          );
        });

        $("#aeMdSuccess").on("click", "#btClose", function (e) {
          $("#aeMdSuccess").modal("hide");
        });

        $("#delete").click(function () {
          $("#aeModelConfirmdelete").modal("show");
          return false;
        });

        $("#aeModelConfirmdelete").on(
          "click",
          "#btConfirmDelete",
          function (e) {
            $("#aeModelConfirmdelete").modal("hide");
            $.post(
              "DeleteAllAutCodes.php",

              function (data, status) {}
            );
          }
        );

        $("#generate").click(function () {
          var id = $("#staffID").val();
          var level = $("#level").val();

          if (id.trim() == "") {
            $("#mdForgotPassword").modal("show");

            return false;
          }

          $.post(
            "insertAuthCode.php",
            {
              staffID: id,
              level: level,
            },
            function (data, status) {
              $("#code").text(data);
            }
          );
        });

        $("#send").click(function () {
          var id = $("#staffID").val();

          if (id.trim() == "") {
            $("#mdForgotPassword").modal("show");

            return false;
          }

          $.post(
            "getAuthCode.php",
            {
              staffID: id,
            },
            function (data, status) {
              var ouput = data.split("|");

              var receiver = ouput[1];
              var authCode = ouput[0];
              var realName = "";
              var subject = "GNATOC-AAMUSTED-K AUTHENTICATION CODE";
              var message =
                "   Hi " +
                realName +
                "\n" +
                " Your Authentication Code is Below: \n" +
                " \n" +
                "CODE: " +
                authCode +
                "\n ";

              var em = "";

              try {
                em = receiver.trim();
              } catch (error) {}

              if (em.length < 2) {

                aeModelTitle = "ERROR! STAFFID IS UNKNOWN";
                aeModelBody =
                  "LET THIS MEMBER SIGN UP BEFORE HE CAN GET THE CODE.";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
                return false;
              }

              $.post(
                "sendEmail2.php",
                {
                  subject: subject,
                  message: message,
                  receiver: receiver,
                },
                function (data, status) {
                  aeModelTitle = "AUTHENTICATION CODE SENT  SUCCESSFULLY!";
                  aeModelBody = "";

                  $("#aeMBody").text(aeModelBody);
                  $("#aeMTitle").text(aeModelTitle);
                  $("#aeModelPassive").modal("show");
                }
              );
            }
          );
        });
      });
    </script>

    <!-- END SCRIPT -->
  
    <!-- partial:index.partial.html -->
    <form class="form" id="form" method="post">
      <div class="form-outline mb-2 text-center">
        <h4
          id="code"
          style="font-style: italic; color: #b0dbee; font-weight: bolder"
        >
          AUTHENTICATION CODES
        </h4>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <input type="text" id="staffID" placeholder="Enter StaffID" />
          </div>
        </div>
      </div>

      <!-- begin -->

      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <input type="number" id="level" placeholder="Enter Level" />
        </div>
      </div>

      <!-- end -->

      <div
       class="card"
       style="background-color: transparent;"
       
      >
        <button id="generate" type="button" class="btn btn-default mt-0 p-2 mb-1">
          Generate
          <i class="fa fa-fire" aria-hidden="true"></i>
        </button>
        <button id="send" type="button" class="btn btn-default mt-0">
          Send
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </button>
        <hr />

        <button id="generateAll" type="button" class="btn btn-default mt-0 mb-1">
          Generate for All Chosen level
        </button>
        <button id="sendAll" type="button" class="btn btn-default mt-0 mb-1">
          Send to All Chosen level
        </button>
  
        <button
        
          id="download"
          style="background-color: #13795b; color: white"
          type="submit"
          class="btn btn-default mt-0 mb-1"
        >
          Download
          <i class="fa fa-download" aria-hidden="true"></i>
        </button>
        <button
          id="delete"
          style="background-color: red; color: white"
          type="submit"
          class="btn btn-default mt-0"
        >
          Delete All
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </div>
      <a style="color: white" href="adminPage.php">Go Back</a>
    </form>
    <!-- partial -->

    <!-- Modal HTML -->
    <div id="mdForgotPassword" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ENTER STAFF ID</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button
              id="btSendPassword"
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

    <!-- BEGIN AEMODEL-->
    <div id="aeModelConfirmdelete" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="aeMTitle" class="modal-title">
              <strong>Confirm deletion.</strong>
              <i class="bi bi-trash-fill"></i>
            </h5>
          </div>
          <div class="modal-body">
            <p id="aeMBody">Do You want to Delete All Authentication Codes?</p>
          </div>
          <div class="modal-footer">
            <button id="btConfirmDelete" type="button" class="btn btn-primary">
              Yes
            </button>
            <button
              type="button"
              data-bs-dismiss="modal"
              class="btn btn-primary"
            >
              No
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

    <script></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script>
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
      
    </script>
  </body>
</html>
