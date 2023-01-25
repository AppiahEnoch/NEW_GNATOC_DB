<?php
//include "verifyAdmin.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
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

    <title>Records</title>
    <style>
      body {
        background-color: #009edf;
        height: 100%;
        margin: 0;
        color: white;
      }

      table {
        background-color: white;
      }

      #board {
        background-color: transparent;
        height: auto;

        display: flex;
        align-items: center;
        text-align: center;
        justify-items: center;
        justify-content: center;
      }
    </style>
  </head>
  <body>
    <script>
      var sex = "";
      var from = "";
      var to = "";
      var level = "";
      var rank = "";
      var program = "";

      function getData() {
        $("#table1 tbody").empty();

        if (
          aeEmpty(sex) &&
          aeEmpty(from) &&
          aeEmpty(to) &&
          aeEmpty(level) &&
          aeEmpty(rank) &&
          aeEmpty(program)
        ) {
          hideSpin();
          return;
        }
        //alert(program)

        $.ajax({
          url: "getData.php",
          type: "post",
          data: {
            sex: sex,
            to: to,
            from: from,
            level: level,
            rank1: rank,
            program: program,
          },
          dataType: "JSON",
          success: function (response) {
            // alert(response);
             
            var len = response.length;
           // alert(len)

            hideSpin();

            for (var i = 0; i < len; i++) {
              var mobile = response[i].mobile;
              var fullName = response[i].fullName;
              var staffID = response[i].staffID;

              var tr_str =
                "<tr>" +
                "<td >" +
                staffID +
                "</td>" +
                "<td >" +
                fullName +
                "</td>" +
                "<td>" +
                mobile +
                "</td>" +
                "</tr>";

              $("#table1 tbody").append(tr_str);
              $("#total_records").text(len);
              hideSpin();
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            //  console.error(textStatus + ": " + errorThrown);
            // alert("An error occurred: " + errorThrown+"||"+jqXHR+" "+textStatus);
            $("#table1 tbody").empty();
            hideSpin();
          },
        });
      }

      $(document).ready(function () {
        fillCourseList();
        hideSpin();
        getInput();

        $("#tf_program").change(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });

        $("#tf_sex").keyup(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });

        $("#tf_from").keyup(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });

        $("#tf_to").keyup(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });

        $("#tf_level").keyup(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });

        $("#tf_rank").change(function () {
          $("#table1 tbody").empty();
          showSpin();
          getInput();
          getData();
        });
      });
    </script>

    <div class="container mt-1">
      <div class="row">
        <div class="col">
          <form>
            <div class="form-group">
              <div class="col d-inline-flex justify-content-center p-0 m-0">
                <input
                  placeholder="e.g. Male"
                  type="text"
                  class="form-control"
                  id="tf_sex"
                  aria-describedby="search1Help"
                />

                <select
                  class="form-control ml-1"
                  id="tf_program"
                  aria-describedby="search1Help"
                >
                  <option value="none" selected>By Programme?</option>
                  <option value="BSC. INFORMATION TECNOLOGY">
                    BSC. INFORMATION TECNOLOGY
                  </option>
                  <option value="Programme2">Programme2</option>
                  <option value="Programme3">Programme3</option>
                </select>
              </div>

              <small style="text-align: left; color: #fff" class="form-text"
                >Search By Sex</small
              >
            </div>
          </form>
        </div>

        <div class="col">
          <form>
            <div class="form-group">
              <div class="col d-inline-flex justify-content-center p-0 m-0">
                <input
                  placeholder="From"
                  type="text"
                  class="form-control"
                  id="tf_from"
                  aria-describedby="search2Help"
                />
                <input
                  type="text"
                  placeholder="To"
                  class="form-control ml-1"
                  id="tf_to"
                  aria-describedby="search2Help"
                />
              </div>

              <small style="text-align: left; color: #fff" class="form-text"
                >Search From Year To Year</small
              >
            </div>
          </form>
        </div>

        <div class="col">
          <form>

            <div class="form-group">
              <div class="col d-inline-flex justify-content-center p-0 m-0">
                <input
                  placeholder="Level"
                  type="text"
                  class="form-control"
                  id="tf_level"
                  aria-describedby="search2Help"
                />
                <select
                class="form-control ml-1"
                id="tf_rank"
                aria-describedby="search1Help"
              >
                <option value="none" selected>Rank?</option>
                <option value="Senior Superintendent II">Senior Superintendent II</option>
                <option value="Senior Superintendent I">Senior Superintendent I</option>
                <option value="Principal Superintendent">Principal Superintendent</option>
                <option value="Assistant Director I">Assistant Director I</option>
                <option value="Superintendent II">Superintendent II</option>
                <option value="Superintendent I">Superintendent I</option>
                <option value="Teacher">Teacher</option>
          
              </select>

              </div>

      

              <small style="text-align: left; color: #fff" class="form-text"
                >Search By Level and Rank</small
              >
            </div>
          </form>
        </div>

        <script>
          var rankInput = document.getElementById("tf_rank");
          var rankDropdown = document.getElementById("rank-dropdown");
          rankInput.addEventListener("click", function () {
            rankDropdown.classList.remove("d-none");
          });
        </script>

      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div id="board" class="col-12 m-auto">
          <a href="file/Records.xlsx" download>
            <img
              style="width: 3rem; margin: auto; position: absolute; right: 0"
              src="devImage/excel.png"
              alt=""
            />
          </a>

          <i
            id="spin"
            style="color: white; margin-bottom: 1rem"
            class="fas fa-spinner fa-pulse fa-2x"
          ></i>

          <label style="text-align: left"
            >Total Records &nbsp; <span id="total_records"> 00</span></label
          >
        </div>
      </div>
    </div>

    <div class="container">
      <table id="table1" class="table table-bordered table-sm">
        <thead>
          <tr>
            <th scope="col">STAFF ID</th>
            <th scope="col">FULL NAME</th>
            <th scope="col">MOBILE</th>
          </tr>
        </thead>

        <tbody></tbody>
      </table>
    </div>

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

      function getInput() {
        sex = $("#tf_sex").val();
        sex = sex.trim();
        from = $("#tf_from").val();
        from = from.trim();
        to = $("#tf_to").val();
        to = to.trim();
        level = $("#tf_level").val();
        level = level.trim();

        rank = $("#tf_rank").val();

        rank = rank.trim();
       // alert(rank)

        program = $("#tf_program").val();

        program = program.trim();

        $("#total_records").text("0");
      }
      function hideSpin() {
        $("#spin").hide();
      }
      function showSpin() {
        $("#spin").show();
      }

      function fillCourseList() {
        $("#tf_program").empty();
        $("#tf_program").append(
          $("<option>", {
            value: "none",
            text: "Program?",
          })
        );

        $.ajax({
          url: "selectAllCourses.php",
          type: "GET",
          dataType: "json",

          success: function (data) {
            hideSpin();
            var select = $("#tf_program");
            $.each(data, function (key, value) {
              select.append(
                $("<option>", {
                  value: value.course,
                  text: value.course,
                })
              );
            });
          },
          error: function (xhr, status, error) {
            hideSpin()
          },
        });

        hideSpin();
      }
    </script>
  </body>
</html>
