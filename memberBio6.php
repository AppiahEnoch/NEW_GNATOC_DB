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

    <style>
      .roundImage img {
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -o-border-radius: 50%;

        min-width: 4rem;
        max-width: 4rem;

        min-height: 4rem;
        max-height: 4rem;
      }
    </style>
  </head>

  <body>


    <!-- BEGIN SCRIPT -->
    <script>
      var aeModelTitle1 = "SUCCESS!";
      var aeModelBody = "LET'S CONTINUE...";

      $(document).ready(function () {

      //  check_session();

        $("#memberImage").click(function () {
          $("#aeMdImageShow").modal("show");
        });



        $("#aeMBody").text(aeModelBody);
        $("#aeMTitle").text(aeModelTitle1);
        // $("#aeModelPassive").modal("show");



        








        $("#form").submit(function (e) {
          e.preventDefault();

     


          $.ajax({
           // url: "insertFileToDB.php",
           url:"memberBio6_Insert.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
              // alert("folder: "+data)
               
              location.href = "memberBio7.php";
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
    <form id="form">
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
        6 of 8

    
        <style>
                #memberImage:hover {
            transform: scale(2.1);
            transition: transform 0.2s ease-in-out;
          }
        </style>

        <div class="roundImage">
          <img id="memberImage" src="devImage/user2.png" alt="" />
        </div>

        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="passport"
              >Upload Passport Picture(png/jpg)</label
            >
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="bi bi-image-fill"></i>
            </div>
            <input
              type="file"
              onchange="checkFileSize(this)"
              accept="image/png, image/jpeg"
              id="passport"
              name="passport"
              placeholder="passport"
              required
            />
          </div>
        </div>
      </div>
      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="matricula"
            >Matricula Page (PDF only)</label
          >
        </div>
        <br />
        <div class="input-group">
          <div class="input-group-addon">
            <i class="bi bi-filetype-pdf"></i>
          </div>
          <input
            name="matricula"
            accept="application/pdf"
            type="file"
            id="matricula"
            placeholder=""
          />
        </div>
      </div>

      <!-- end -->

    

      <button id="submit" type="submit" class="btn btn-default mt-0">
        Next
        <i style="margin-left: 1rem" class="bi bi-fast-forward-fill"></i>
      </button>

      <span>
        <a style="margin-right: 2rem; color: white" href="index.php">Go Home</a>


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

    <!-- BEGIN AEMODEL-->
    <div id="aeMdImageShow" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="col">
          <button
            data-bs-dismiss="modal"
            class="btn btn-primary align-baseline"
          >
            x
          </button>
        </div>
        <div class="modal-content">
          <img
            style="border-radius: 50%"
            id="largeImage"
            src="devImage/user2.png"
            alt=""
            width="300"
          />

          <div class="modal-header"></div>
          <div class="modal-body"></div>
        </div>
      </div>
    </div>
    <!-- END AEMODEL-->

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

      // IMAGE PROCESSING
      var aeModelTitle = "";
      var aeMBody = "";

      function checkFileSize(event) {
        f = document.getElementById("passport");
        if (f.files.length > 0 && f.files[0].size > 2 * 1024 ** 2) {
          aeModelTitle = "PICTURE SIZE TOO LARGE";
          aeModelBody =
            "Your picture size is too large." +
            "we can only accept pictures that are not more than 2mb";

          $("#aeMBody").text(aeModelBody);
          $("#aeMTitle").text(aeModelTitle);
          $("#aeModelPassive").modal("show");

          $("#passport").val("");

          return false;
          event.preventDefault();
        } else {
          readURL(event);
        }
      }

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $("#memberImage").attr("src", e.target.result);
            $("#largeImage").attr("src", e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
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
