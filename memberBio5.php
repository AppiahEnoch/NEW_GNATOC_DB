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
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/c1db89cf54.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="dist/style.css" />

  <style>
    body {
      overflow: scroll;
    }

    #courseList {
      position: sticky;
      z-index: 100;
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 100%;
    }

    #courseList li {
      padding: 10px;
      background: #fff;
      border-bottom: #f0f0f0 1px solid;
      color: black;

      font-weight: bold;
      font-size: 0.7rem;
    }

    #courseList li:hover {
      background: #f0f0f0;
      cursor: pointer;
      cursor: hand;
    }

    #suggestion {
      min-height: 8rem;
      overflow: scroll;
      margin-top: 5px;
    }
  </style>
</head>

<body>

  <!-- BEGIN SCRIPT -->
  <script>
    7;
    $(document).ready(function () {
      $("#course").blur(function () {
     
      });



      $("#region").on("focus", function(){

        $("#suggestion").hide();
 
});








      $("#suggestion").hide();
      $("#course").keyup(function () {
        var keyword = $("#course").val();

        if (aeEmpty(keyword)) {
          $("#suggestion").hide();
          return false;
        }

        $.post(
          "selectCourse.php",
          {
            keyword: keyword,
          },
          function (data, status) {
            $("#suggestion").show();
            $("#suggestion").html(data);
          }
        );
      });

      $("#form").submit(function (e) {
        e.preventDefault();

        var course = $("#course").val();
        var region = $("#region").val();
        var yearOfAdmission = $("#yearOfAdmission").val();
        var yearOfCompletion = $("#yearOfCompletion").val();

        if (region == "Choose Region") {
          aeModelTitle = "CHOOSE REGION!";
          aeModelBody = "Choose the Region that gave you study leave";

          $("#aeMBody").text(aeModelBody);
          $("#aeMTitle").text(aeModelTitle);
          $("#aeModelPassive").modal("show");

          return false;
        }

        $.ajaxSetup({
          async: false,
        });
        $.post(
          "memberBio5_Insert.php",
          {
            course: course,
            region: region,
            yearOfAdmission: yearOfAdmission,
            yearOfCompletion,
            yearOfCompletion,
          },
          function (data, status) {

            location.href = "memberBio6.php";
          }
        );
      });
    });

    $(document).on("click", "#courseList li", function () {
      var cour = $(this).text();
      $("#course").val(cour);
      $("#suggestion").hide();
    });






  </script>

  <!-- END SCRIPT -->

  <!-- partial:index.partial.html -->
  <form id="form" method="post">
    <div class="form-outline mb-2 text-center m-1">
      <div class="row align-items-center justify-content-center">
        <img style="width: 4rem; height: 4rem; border-radius: 50%" id="gnatocImage" src="image/ghatocLogo.jpg" alt="" />
        <img style="width: 5rem" src="image/aamusted.png" alt="" />
      </div>

      <h3>GNATOC</h3>
      <h6>AAMUSTED-K</h6>
      5 of 8

      <!-- begin -->

      <div class="form-group">
        <div class="col w-100">
          <label style="float: left" for="course">Course</label>
        </div>
        <br />

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          <input type="text" id="course" placeholder="Course eg. BSc. Information Tectnology Education" required />
        </div>
        <div id="suggestion" class="suggestion">

        </div>
      </div>
    </div>
    <!-- end -->

    <div class="form-group">
      <div class="col w-100">
        <label style="float: left" for="course">Which region gave You study leave?</label>
      </div>
      <br />
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-globe" aria-hidden="true"></i>
        </div>
        <select id="region" style="font-weight: bold; height: 2rem" class="form-select w-100">
          <option selected>Choose Region</option>
          <option>Ahafo</option>
          <option>Ashanti</option>
          <option>Bono</option>
          <option>Bono East</option>
          <option>Central</option>
          <option>Eastern</option>
          <option>Greater Accra</option>
          <option>North East</option>
          <option>Northern</option>
          <option>Oti</option>
          <option>Savannah</option>
          <option>Upper East</option>
          <option>Upper West</option>
          <option>Volta</option>
          <option>Western</option>
          <option>Western North</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col w-100">
        <label style="float: left" for="course">In which year did you get admission?</label>
      </div>
      <br />
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar" aria-hidden="true"></i>
        </div>
        <input id="yearOfAdmission" placeholder="Year Of Admission" type="number" min="2016" max="9099" step="1"
          value="2019" required />
      </div>
    </div>

    <div class="form-group">
      <div class="col w-100">
        <label style="float: left" for="course">In which year will you complete the course?</label>
      </div>
      <br />
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar" aria-hidden="true"></i>
        </div>
        <input id="yearOfCompletion" placeholder="Year Of Completion" type="number" min="1900" max="9099" step="1"
          value="2023" required />
      </div>
    </div>

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
          <i style="font-size: 2rem; color: blue" class="bi bi-exclamation-triangle-fill">
          </i>
        </div>
        <div class="modal-body">
          <p id="aeMBody">Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary">
            Ok
          </button>
        </div>
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
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>