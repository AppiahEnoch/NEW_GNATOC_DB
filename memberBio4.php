<?php
include "verifyCode.php"
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>GNATOC-AAMUSTED-K</title>
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
    <link rel="stylesheet" href="./style.css" />
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

    <link rel="stylesheet" href="dist/radioStyle.css" />
  </head>

  <body>


    
    <!-- BEGIN SCRIPT -->
    <script>
      $(document).ready(function () {


        document.getElementById("date").value = "1989-10-23";

        aeModelTitle = "CONGRATULATIONS!";
        aeModelBody =
          "Thank you for filling the forms up to this stage. " +
          "Now let's Continue..";

        $("#aeMBody").text(aeModelBody);
        $("#aeMTitle").text(aeModelTitle);
        $("#aeModelPassive").modal("show");

        $("#form").submit(function (e) {
          e.preventDefault();

          var gender = $("input[name=gender]:checked", "#form").val();
          var studyLeaveStatus = $(
            "input[name=studyLeave]:checked",
            "#form"
          ).val();

          var level = $("#level").find(":selected").text();
          var dob = $("#date").val();

          if (level == "Choose level") {
            aeModelTitle = "CHOOSE YOUR LEVEL!";
            aeModelBody = "Please Choose Your Level";

            $("#aeMBody").text(aeModelBody);
            $("#aeMTitle").text(aeModelTitle);
            $("#aeModelPassive").modal("show");

            return false;
          }

          $.post(
            "memberBio4_Insert.php",
            {
              gender: gender,
              studyLeaveStatus: studyLeaveStatus,
              level: level,
              dob: dob,
            },
            function (data, status) {
              location.href = "memberBio5.php";
            }
          );
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
        4 of 8

        <!-- begin -->
        php
        <h6 style="text-align: left; font-weight: bolder">Gender:</h6>
        <fieldset>
          <div class="col">
            <div class="row">
              <input
                type="radio"
                class="radio"
                name="gender"
                value="Male"
                id="genderm"
                required
              />
              <label for="genderm">Male</label>

              <input
                style="margin-left: 1rem"
                type="radio"
                class="radio"
                name="gender"
                value="Female"
                id="genderf"
                required
              />
              <label for="genderf">female</label>
            </div>
          </div>
        </fieldset>

        <h6 style="text-align: left; font-weight: bolder">
          Do you have study Leave with pay?
        </h6>
        <fieldset>
          <div class="col">
            <div class="row">
              <input
                type="radio"
                class="radio"
                name="studyLeave"
                value="Yes"
                id="studyLeaveY"
                required
              />
              <label for="studyLeaveY">Yes</label>

              <input
                style="margin-left: 1rem"
                type="radio"
                class="radio"
                name="studyLeave"
                value="No"
                id="studyLeaveN"
                required
              />
              <label for="studyLeaveN">No</label>
            </div>
          </div>
        </fieldset>

        <!-- begin -->

        <div class="form-group">
          <div class="col w-100">
            <label style="float: left" for="lName">Date Of Birth</label>
          </div>
          <br />
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <input
              type="date"
              id="date"
              placeholder="Date of Birth"
              required
              min="1984-01-19"
              max="2005-01-10"
            />
          </div>
        </div>
      </div>
      <!-- end -->

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="lName">Choose Level</label>
        </div>
        <br />
        <div class="input-group">
          <select
            id="level"
            style="font-weight: bold; height: 2rem"
            class="form-select w-100"
          >
            <option selected>Choose level</option>
            <option value="1">100</option>
            <option value="2">200</option>
            <option value="3">300</option>
            <option value="3">400</option>
          </select>
        </div>
      </div>
      <!-- end -->

      <button type="submit" class="btn btn-default mt-0">
        Next
        <i style="margin-left: 1rem" class="bi bi-fast-forward-fill"></i>
      </button>

      <span>
        <a style="margin-right: 2rem; color: white" href="#!">Go Home</a> <br />
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
