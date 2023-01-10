<?php
include "verifyCode.php"
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

    <link rel="stylesheet" href="dist/style.css" />
  </head>

  <body>


  

    <!-- BEGIN SCRIPT -->
    <script>
      var aeModelTitle = "";
      var aeModelBody = "";

      $(document).ready(function () {
    

        aeModelTitle = "CONGRATS!";
        aeModelBody = "let's  Continue..";
        $("#aeMBody").text(aeModelBody);
        $("#aeMTitle").text(aeModelTitle);
        $("#aeModelPassive").modal("show");

        $("#ghanaCard").on("change", function () {
          const oFile = document.getElementById("ghanaCard").files[0];
          if (fileTooBig(oFile)) {
            document.getElementById("ghanaCard").value = "";
            return;
          }

          var f = $("#ghanaCard").prop("files")[0];
          if (!(f.type == "application/pdf")) {
            $("#ghanaCard").val("");

            aeModelTitle = "ONLY PDF ALLOWED!";
            aeModelBody = "Please scan all Documents to PDF.";

            $("#aeMBody").text(aeModelBody);
            $("#aeMTitle").text(aeModelTitle);
            $("#aeModelPassive").modal("show");
          }
        });

        $("#ssnitCard").on("change", function () {
          const oFile = document.getElementById("ssnitCard").files[0];
          if (fileTooBig(oFile)) {
            document.getElementById("ssnitCard").value = "";
            return;
          }

          var f = $("#ssnitCard").prop("files")[0];
          if (!(f.type == "application/pdf")) {
            $("#ssnitCard").val("");

            aeModelTitle = "ONLY PDF ALLOWED!";
            aeModelBody = "Please scan all Documents to PDF.";

            $("#aeMBody").text(aeModelBody);
            $("#aeMTitle").text(aeModelTitle);
            $("#aeModelPassive").modal("show");
          }
        });

        $("#form").submit(function (e) {
          e.preventDefault();

        

          $.ajax({
            url: "memberBio8_Insert.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

              location.href = "alertRegistrationSucess.html";
            },
            error: function (e) {
              alert("error:" + e);
            },
          });
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
        8 of 8

        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="admission"
              >Upload Gnana Card(PDF only)</label
            >
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="bi bi-filetype-pdf"></i>
            </div>
            <input
              accept="application/pdf"
              required
              type="file"
              name="ghanaCard"
              id="ghanaCard"
              placeholder="Ghana Card"
            />
          </div>
        </div>
      </div>
      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="studyLeave"
            >Upload SSNIT Card (PDF only)</label
          >
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="bi bi-filetype-pdf"></i>
          </div>
          <input
            accept="application/pdf"
            required
            type="file"
            name="ssnitCard"
            id="ssnitCard"
            placeholder="SSNIT Card"
          />
        </div>
      </div>

      <!-- end -->

      <!-- begin -->

      <div class="form-group d-none">
        <div class="col w-100">
          <label style="float: left" for="lName"
            >Upload Voter Card (PDF only)</label
          >
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="bi bi-filetype-pdf"></i>
          </div>
          <input
            accept="application/pdf"
            type="file"
            name="voterCard"
            id="voterCard"
            placeholder="Voter Card"
          />
        </div>
      </div>

      <!-- end -->

      <button type="submit" class="btn btn-default mt-0">
        Next
        <i style="margin-left: 1rem" class="bi bi-fast-forward-fill"></i>
      </button>

      <span>
        <a style="margin-right: 2rem; color: white" href="#!">Go Home</a>
        <br />
        <br />
      </span>
    </form>
    <!-- partial -->

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
      function fileTooBig(file) {
        if (file.size > 2097152) {
          aeModelTitle = "FILE SIZE TOO LARGE";
          aeModelBody = "Please reduce the size of your File to less than 2mb";

          $("#aeMBody").text(aeModelBody);
          $("#aeMTitle").text(aeModelTitle);
          $("#aeModelPassive").modal("show");

          return true;
        }
      }
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
