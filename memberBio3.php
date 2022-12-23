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
  </head>

  <body>
  <?php
  include "checkSession.php";
  ?>
    <!-- BEGIN SCRIPT -->
    <script>
      var aeModelBody = "";
      var aeModelTitle = "";

      $(document).ready(function () {
        aeModelTitle = "AUTHENTICATION CODE NEEDED!";
        aeModelBody = "GET AUTHENTICATION CODE FROM THE GNATOC OFFICE!";

        $("#aeMBody").text(aeModelBody);
        $("#aeMTitle").text(aeModelTitle);
        $("#aeModelPassive").modal("show");

        //$("#mdCodeAlert").modal("show");

        $("#form").submit(function (e) {
          e.preventDefault();

          var code = $("#code").val();
          var c = code.trim();

          $.post(
            "selectAuthenticationCode.php",
            {
              code: code,
            },
            function (data, status) {
              if (aeEmpty(data)) {
                aeModelTitle = "INVALID AUTHENTICATION CODE!";
                aeModelBody =
                  "Your Authentication Code is Invalid " +
                  "contact Gnatoc Office for valid code";

                $("#aeMBody").text(aeModelBody);
                $("#aeMTitle").text(aeModelTitle);
                $("#aeModelPassive").modal("show");
                $("#code").val("");
                $("#code").focus();
                return false;
              }

              var admission = $("#admission").val();
              var ssnit = $("#ssnit").val();
              var voter = $("#voter").val();
              $.post(
                "memberBio3_Insert.php",
                {
                  admission: admission,
                  ssnit: ssnit,
                  voter: voter,
                },
                function (data, status) {
                  // window.open("memberBio4.php","_self")
                  location.href = "memberBio4.php";
                }
              );
            }
          );
        });
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
        3 of 8
        <br>
    <span style="text-decoration:underline; color: blue">Get    Authentication Code from Gnatoc Office</span>
        <!-- begin -->
        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="code">Authentication Code</label>
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </div>
            <input
              type="text"
              id="code"
              placeholder="Authentication Code"
              required
              minlength="6"
            />
          </div>
        </div>
      </div>
      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="admission">Admission Number</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-id-card" aria-hidden="true"></i>
          </div>
          <input
            type="text"
            id="admission"
            placeholder="Admission Number"
            required
            minlength="5"
          />
        </div>
      </div>

      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="snnit">SSNIT Number</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-vcard-o" aria-hidden="true"></i>
          </div>
          <input
            type="text"
            id="ssnit"
            placeholder="SSNIT number"
            required
            minlength="5"
          />
        </div>
      </div>

      <!-- end -->

      <!-- begin -->

      <div class="form-group d-none">
        <div class="col w-100">
          <label style="float: left" for="lName">Voter ID</label>
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-id-card-o" aria-hidden="true"></i>
          </div>
          <input type="text" id="voter" placeholder="Voter ID" />
        </div>
      </div>

      <!-- end -->

      <button type="submit" class="btn btn-default mt-0">
        Next
        <i style="margin-left: 1rem" class="bi bi-fast-forward-fill"></i>
      </button>

      <span>
        <a style="margin-right: 2rem; color: white" href="index.php">Go Home</a>
        <br />
      </span>
    </form>
    <!-- partial -->

    <!-- Modal HTML -->
    <div
      style="color: black; font-style: normal"
      id="mdCodeAlert"
      class="modal fade"
      tabindex="-1"
    >
      <div style="color: black" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">SUCCESS!</h5>
            <button
              style="background-color: transparent; width: 20px"
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            >
              X
            </button>
          </div>
          <div style="color: black" class="modal-body">
            <p style="color: black">CONGRATS! &nbsp; NOW LET'S CONTINUE..</p>

            <p class="text-secondary">
              <small
                >WE will need your Authentication Code. this Code is Only
                provided by the Gnatoc Office.
              </small>
            </p>
            <h5 class="modal-title">
              get
              <span style="font-weight: bold; text-decoration: underline"
                >AUTHENTICATION CODE</span
              >
              from GNATOC OFFICE
            </h5>
          </div>
          <div class="modal-footer">
            <button
              style="
                background-color: transparent;
                width: 5rem;
                background-color: #59359a;
                text-align: center;
              "
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
