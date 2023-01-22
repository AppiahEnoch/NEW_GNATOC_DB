<?php
include "checkSession.php";
include "verifyCode.php"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>GNATOC-AAMUSTED-K</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Raleway"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
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

    <style>
      #success-alert {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        text-align: center;
        font-size: large;
        display: none;
      }
    </style>

    <style>
      body,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        font-family: "Raleway", sans-serif;
      }
    </style>

    <style>
      table {
        font-family: arial, sans-serif;
        width: 100%;
      }

      td,
      th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr {
        background-color: white;
      }

      #col1 {
        background-color: blue;
      }
    </style>

    <style>
      a:visited {
        color: teal;
      }

      td:first-child {
        font-weight: bold;
      }
    </style>

    <style>
      #center {
        margin: auto;
        width: 50%;
        border: 3px solid blue;
      }
    </style>



<style>
a{
    border-bottom: 5px;
    border-bottom: solid;
    border-color: #b0dbee;
    border-radius: 10%;
    border-right: 5px;
    margin-bottom: .5rem;
    box-shadow: 3px 3px 5px #b0dbee;
}


</style>
  </head>
  <body class="w3-aqua w3-content" style="max-width: 1600px">
    <script>
      function up1(event) {
        var fullName = $("#a1").text();
        fullName = fullName.toUpperCase();
        var names = fullName.split(" ");
        var fName = names[0];
        var mName = names[1];
        var lName = names[2];
        if (aeEmpty(fName)) {
          fName = " ";
          return;
        }
        if (aeEmpty(mName)) {
          lName = " ";
          return;
        }
        if (aeEmpty(lName)) {
          lName = mName;
          mName = " ";
        }
        // alert(fName+" "+mName +" "+lName)

        $.post(
          "up1.php",
          {
            fName: fName,
            mName: mName,
            lName: lName,
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up2(event) {
        var value = $("#a2").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }

        //  alert(value)

        // alert(fName+" "+mName +" "+lName)

        $.post(
          "up2.php",
          {
            value: value,
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up3(event) {
        // alert(22)
        var value = $("#a3").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }

        // alert(value);

        return;

        // alert(fName+" "+mName +" "+lName)

        $.post(
          "up3.php",
          {
            value: value,
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up4(event) {
        var value = $("#a4").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }

        //alert(value);

        // alert(fName+" "+mName +" "+lName)

        $.post(
          "up4.php",
          {
            value: value,
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up5(event) {
        var value = $("#a5").text();

        if (aeEmpty(value)) {
          return;
        }

        if (value.length < 4) {
          return;
        }

        //alert(value)

        // alert(fName+" "+mName +" "+lName)

        $.post(
          "upD.php",
          {
            value: value,
            col: "regNumber",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up6(event) {
        var value = $("#a6").text();
        value = value.toLowerCase();

        if (aeEmpty(value)) {
          return;
        }

        // alert(value)

        // alert(fName+" "+mName +" "+lName)

        return;

        $.post(
          "upD.php",
          {
            value: value,
            col: "email",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up7(event) {
        var value = $("#a7").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }

        if (!(value.length == 10)) {
          return;
        }

        if (!isNumber(value)) {
          return;
        }

        // alert(fName+" "+mName +" "+lName)

        $.post(
          "upD.php",
          {
            value: value,
            col: "mobile",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up8(event) {
        var value = $("#a8").text();

        if (aeEmpty(value)) {
          return;
        }

        if (value.length < 5) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "admissionNumber",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up9(event) {
        var value = $("#a9").text();

        if (aeEmpty(value)) {
          return;
        }

        //   alert(value)

        $.post(
          "upD.php",
          {
            value: value,
            col: "ghanaCard",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up10(event) {
        var value = $("#a10").text();

        if (aeEmpty(value)) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "ssnitNumber",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up11(event) {
        var value = $("#a11").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }
        if (value.length < 5) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "course",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up12(event) {
        var value = $("#a12").text();
        value = value.toUpperCase();

        if (aeEmpty(value)) {
          return;
        }

        var values = ["100", "200", "300", "400"];
        if (!values.includes(value)) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "level",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up13(event) {
        var value = $("#a13").text();

        if (aeEmpty(value)) {
          return;
        }

        if (!isNumber(value)) {
          return;
        }

        var v = value.parseInt(value);

        if (v < 2000) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "yearOfAdmission",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function up14(event) {
        var value = $("#a14").text();

        if (aeEmpty(value)) {
          return;
        }

        if (!isNumber(value)) {
          return;
        }

        var number = parseInt(value);

        if (number < 2020) {
          return;
        }

        $.post(
          "upD.php",
          {
            value: value,
            col: "yearOfCompletion",
          },
          function (data, status) {
            // alert("d: "+data)
          }
        );
      }

      function update1File(fileID, frameID, col) {
        var fileInput = document.getElementById(fileID);
        var file = fileInput.files[0];

        if (!isFilePDF(fileID)) {
          return;
        }

        var form_data = new FormData();
        form_data.append("file", file);
        form_data.append("text", col);

        $.ajax({
          url: "upF1.php",
          dataType: "text",
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: "post",
          success: function (response) {
            // alert(response)

            if (!aeEmpty(frameID)) {
              // alert(response);
              setEmbedSrc(frameID, response);
              resetUrl(col, response);
            }
          },
        });
      }

      // functions end

      $(document).ready(function () {
        $("#closeMenuID").click(function () {
          $("mySidebar").hide();
        });

        $("#changePassportID").click(function () {
          $("#fileInput").click();
        });
        document
          .getElementById("fileInput")
          .addEventListener("change", function () {
            if (this.files && this.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $("#memberImage").attr("src", e.target.result);
                $("#memberImageSmall").attr("src", e.target.result);
                updatePassportPicture();
              };
              reader.readAsDataURL(this.files[0]);
            }
          });

        $("#newPassword").click(function () {
          $("#errorMismatch").hide();
          $("#errorMismatch").text("Password Mismatch!");

          var o = $("#oldPassword").val();
          var n = $("#newPassword").val();
          var c = $("#confirmPassword").val();

          var n = n.trim();
          var c = c.trim();

          if (!(c == n)) {
            $("#errorMismatch").show();
          } else {
            $("#errorMismatch").hide();
          }
        });
        $("#confirmPassword").click(function () {
          $("#errorMismatch").hide();
          $("#errorMismatch").text("Password Mismatch!");
          var o = $("#oldPassword").val();
          var n = $("#newPassword").val();
          var c = $("#confirmPassword").val();

          var n = n.trim();
          var c = c.trim();

          if (!(c == n)) {
            $("#errorMismatch").show();
          } else {
            $("#errorMismatch").hide();
          }
        });

        $("#newPassword").keyup(function () {
          $("#errorMismatch").hide();
          $("#errorMismatch").text("Password Mismatch!");
          var o = $("#oldPassword").val();
          var n = $("#newPassword").val();
          var c = $("#confirmPassword").val();

          var n = n.trim();
          var c = c.trim();

          if (!(c == n)) {
            $("#errorMismatch").show();
          } else {
            $("#errorMismatch").hide();
          }
        });
        $("#confirmPassword").keyup(function () {
          $("#errorMismatch").hide();
          $("#errorMismatch").text("Password Mismatch!");

          var o = $("#oldPassword").val();
          var n = $("#newPassword").val();
          var c = $("#confirmPassword").val();
          var n = n.trim();
          var c = c.trim();

          if (!(c == n)) {
            $("#errorMismatch").show();
          } else {
            $("#errorMismatch").hide();
          }
        });

        $("#submit").click(function (e) {
          e.preventDefault();
          var o = $("#oldPassword").val();
          var n = $("#newPassword").val();
          var c = $("#confirmPassword").val();

          var p = n.trim();
          var cc = c.trim();

          if (aeEmpty(o)) {
            $("#oldPassword").focus();
            return;
          } else if (aeEmpty(p)) {
            $("#newPassword").focus();
            return;
          } else if (aeEmpty(cc)) {
            $("#confirmPassword").focus();
            return;
          }

          if (!(p == cc)) {
            $("#errorMismatch").show();
            return;
          } else {
            $("#errorMismatch").hide();
          }

          $.ajax({
            type: "post",
            data: {
              old_password: o,
              new_password: n,
            },
            cache: false,
            url: "reset_member_password.php",
            dataType: "text",
            error: function (xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              // alert(err.Message);
            },

            success: function (data, status) {
              // alert(data);
              if (data == "1") {
                document.getElementById("aeMresetPassword").style.display =
                  "none";

                var message = "PASSWORD RESET MADE SUCCESSFULLY!";
                show_success_alert(message);
              } else {
                $("#errorMismatch").show();
                $("#errorMismatch").text("INVALID OLD PASSWORD");
              }
            },
          });
        });

        $("#ch1").click(function () {
          $("#ch1f").click();
        });

        $("#ch1f").change(function () {
          update1File("ch1f", "fStudyLeave", "studyLeave");
        });

        $("#ch2").click(function () {
          $("#ch2f").click();
        });

        $("#ch2f").change(function () {
          update1File("ch2f", "fAdmission", "admission");
        });

        $("#ch3").click(function () {
          $("#ch3f").click();
        });

        $("#ch3f").change(function () {
          update1File("ch3f", "fMasterList", "masterList");
        });

        $("#ch4").click(function () {
          $("#ch4f").click();
        });

        $("#ch4f").change(function () {
          update1File("ch4f", "fMatricula", "matricula");
        });

        $("#ch5").click(function () {
          $("#ch5f").click();
        });

        $("#ch5f").change(function () {
          update1File("ch5f", "fGhana", "ghanaCard");
        });

        $("#ch6").click(function () {
          $("#ch6f").click();
        });

        $("#ch6f").change(function () {
          update1File("ch6f", "fSsnit", "ssnitCard");
        });

        $("#btEdit").click(function () {
          $("tr td:nth-child(2)").attr("contentEditable", "true");
        });
        $("#btEdit2").click(function () {
          $("tr td:nth-child(2)").attr("contentEditable", "true");
        });

        $("#btSaveEdit").click(function () {
          $("tr td:nth-child(2)").attr("contentEditable", "false");
          location.reload();
        });
        $("#btPrint").click(function () {
          $("tr td:nth-child(2)").attr("contentEditable", "false");
        });

        $.ajax({
          url: "memberPortal_.php",
          type: "get",
          dataType: "JSON",
          success: function (response) {
            //alert(response);

            var fullName = response[1].fullName;

            var staffID = response[1].staffID;
            var regNumber = response[1].regNumber;
            var mobile = response[1].mobile;
            var admissionNumber = response[1].admissionNumber;
            var ghanaCardNumber = response[1].ghanaCardNumber;
            var ssnitCardNumber = response[1].ssnit;
            var course = response[1].course;
            var level = response[1].level;
            var region = response[1].region;
            var yearOfAdmission = response[1].yearOfAdmission;
            var yearOfCompletion = response[1].yearOfCompletion;
            var gender = response[1].gender;
            var studyLeaveStatus = response[1].studyLeaveStatus;

            var imagePath = response[1].imagePath;
            var fStudy = response[1].fStudyLeave;
            var fMasterList = response[1].fMasterList;
            var fMatricula = response[1].fMatricula;
            var fGhana = response[1].fGhana;
            var fSsnit = response[1].fSsnit;
            var fAdmission = response[1].fAdmission;

            // alert(fAdmission);

            var email = response[1].email;

            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>NAME</td> <td id='a1' onkeyup='up1(this)' >" +
                  fullName +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>GENDER</td> <td id='a2' onkeyup='up2(this)' >" +
                  gender +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>STAFF ID</td> <td id='a3' onkeyup='up3(this)' >" +
                  staffID +
                  "</td></tr>"
              );

            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>HAVE STUDY LEAVE WITH PAY</td> <td id='a4' onkeyup='up4(this)' >" +
                  studyLeaveStatus +
                  "</td></tr>"
              );

            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>REG.NO</td><td id='a5' onkeyup='up5(this)' >" +
                  regNumber +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>EMAIL</td> <td id='a6' onkeyup='up6(this)' >" +
                  email +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>MOBILE</td> <td id='a7' onkeyup='up7(this)' >" +
                  mobile +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>ADMISSION NUMBER</td> <td id='a8' onkeyup='up8(this)' >" +
                  admissionNumber +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>GHANA CARD</td> <td id='a9' onkeyup='up9(this)' >" +
                  ghanaCardNumber +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>SSNIT NUMBER</td> <td id='a10' onkeyup='up10(this)' >" +
                  ssnitCardNumber +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>COURSE</td><td id='a11' onkeyup='up11(this)' >" +
                  course +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>LEVEL</td> <td id='a12' onkeyup='up12(this)' >" +
                  level +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>YEAR OF ADMISSION</td> <td id='a13' onkeyup='up13(this)' >" +
                  yearOfAdmission +
                  "</td></tr>"
              );
            $("#tbBasicInfo")
              .find("tbody")
              .append(
                "<tr><td>YEAR OF COMPLETION</td> <td id='a14' onkeyup='up14(this)' >" +
                  yearOfCompletion +
                  "</td></tr>"
              );

            // files

            $.ajax({
              type: "HEAD",
              url: fStudy,
              success: function () {
                //alert("exist")
              },
              error: function () {
                // alert("NOT exist")
              },
            });

            $("#memberImage").attr("src", imagePath);
            $("#memberImageSmall").attr("src", imagePath);

            // alert(fSsnit)
            // loadFile("fStudyLeave", fStudy);
            setEmbedSrc("fStudyLeave", fStudy);
            document.getElementById("d1").setAttribute("href", fStudy);
            setEmbedSrc("fAdmission", fAdmission);
            document.getElementById("d2").setAttribute("href", fAdmission);
            setEmbedSrc("fMasterList", fMasterList);
            document.getElementById("d3").setAttribute("href", fMasterList);
            setEmbedSrc("fMatricula", fMatricula);
            document.getElementById("d4").setAttribute("href", fMatricula);
            setEmbedSrc("fGhana", fGhana);
            document.getElementById("d5").setAttribute("href", fGhana);
            setEmbedSrc("fSsnit", fSsnit);
            document.getElementById("d6").setAttribute("href", fSsnit);

            // alert("image:path : "+imagePath)

            $("#memberEmail1").text(email);
            $("#memberName1").text(fullName);
            $("#memberName1").css({
              "font-weight": "bold",
              "font-size": "200%",
            });

            return;
          },
        });
      });

      function loadFile(id, file) {
        var parent = $("embed #" + id + "").parent();
        var newElement = "<embed src=" + file + " id='" + id + "'>";

        $("embed #" + id + "").remove();
        parent.append(newElement);
      }

      function setEmbedSrc(id, fileUrl) {
        //alert(fileUrl);
        // alert("url: "+fileUrl);
        var embedElement = document.getElementById(id);
        embedElement.src = fileUrl;
      }
    </script>

    <!-- Sidebar/menu -->
    <nav
      class="w3-sidebar w3-collapse w3-white w3-animate-left"
      style="z-index: 13; width: 300px"
      id="mySidebar"
    >
      <h5><strong>GNATOC-AAMUSTED-K</strong></h5>
      <br />
      <div class="w3-container">
        <a
          href="#"
          onclick="w3_close()"
          class="w3-hide-medium w3-right w3-jumbo w3-padding w3-hover-grey"
          title="close menu"
        >
          <i id="closeMenuID" class="fa fa-remove"></i>
        </a>

        <style>
          .icon-border {
            border: none;
            padding: 5px;
            border-radius: 50%;
            box-shadow: 0 0 0 2px blue;
            position: relative;
          }

          .icon-border:hover {
            box-shadow: 0 0 0 2px red;
            color: red;
          }

          #memberImage:hover {
            transform: scale(2.1);
            transition: transform 0.2s ease-in-out;
          }

          #memberImageSmall:hover {
            transform: scale(2.1);
            transition: transform 0.2s ease-in-out;
          }
        </style>
        <input
          type="file"
          id="fileInput"
          accept="image/*"
          style="display: none"
        />

        <div style="position: relative; max-width: 90%" )>
          <img
            id="memberImage"
            src="devImage/l2.png"
            style="width: 45%; border-radius: 50%"
            class="w3-round"
          />
          <i
            id="changePassportID"
            class="fa fa-pencil-square-o icon-border"
            aria-hidden="true"
            style="
              position: absolute;
              right: 8rem;
              top: 50%;
              transform: translateY(-50%);
            "
          ></i>
        </div>

        <a class="w3-button w3-deep-purple" href="login.php">Log out</a>

        <h4><b>MY PORTAL</b></h4>
      </div>
      <div class="w3-bar-block">
        <a
          href="#basicInfo"
          onclick="w3_close()"
          class="w3-bar-item w3-button w3-padding"
          ><i class="fa fa-th-large fa-fw w3-margin-right"></i
          ><b>Basic Info</b></a
        >

        <a
          href="#myFiles"
          onclick="w3_close()"
          class="w3-bar-item w3-button w3-padding"
          ><i class="fa fa-user fa-fw w3-margin-right"></i><b>My Files</b></a
        >
        <a
          href="#payment"
          onclick="w3_close()"
          class="w3-bar-item w3-button w3-padding"
          ><i class="fa fa-money w3-margin-right" aria-hidden="true"></i>
          <b>Payments</b></a
        >

        <a
          href="#voting"
          onclick="w3_close()"
          class="w3-bar-item w3-button w3-padding"
          ><i class="fa fa-thumbs-up w3-margin-right" aria-hidden="true"></i
          ><b>Voting</b></a
        >

        <a onclick="showReset()" class="w3-bar-item w3-button w3-padding"
          ><i class="fa fa-lock fa-fw w3-margin-right"></i
          ><b>Reset Password</b></a
        >
      </div>
      <div class="w3-panel w3-large">
        <p class="w3-text-black">
          <i class="fa fa-envelope-o w3-hover-opacity"></i>
          <span id="memberEmail1"> prignutt@gmail.com</span>
        </p>
      </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div
      class="w3-overlay w3-hide-large w3-animate-opacity"
      onclick="w3_close()"
      style="cursor: pointer"
      title="close side menu"
      id="myOverlay"
    ></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left: 300px">
      <!-- Header -->
      <header id="basicInfo">
        <a href="#"
          ><img
            id="memberImageSmall"
            src="devImage/l2.png"
            style="width: 65px"
            class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"
        /></a>
        <span
          class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey"
          onclick="w3_open()"
          ><i class="fa fa-bars"></i
        ></span>
        <div class="w3-container">
          <div id="success-alert" class="w3-panel w3-green">
            <span
              onclick="this.parentElement.style.display='none'"
              class="w3-button w3-large w3-display-topright"
              >&times;</span
            >
            Your message was sent successfully!
          </div>
          <h1 id="memberName1">APPIAH ENOCH</h1>
          <div class="w3-section w3-bottombar w3-padding-16 w3-blue"></div>
        </div>
      </header>

      <!-- First Photo Grid-->
      <div class="w3-row-padding w3-aqua">
        <div class="w3-container w3-margin-bottom">
          <div class="w3-container">
            <h4>
              <strong>Basic Information</strong>
            </h4>
            <p>
              <button id="btPrint" class="w3-button w3-deep-purple w3-hide">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </button>
              <button id="btEdit" class="w3-button w3-deep-purple">
                Edit
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>
              <button id="btSaveEdit" class="w3-button w3-deep-purple">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Save
              </button>
            </p>

            <div class="w3-card">
              <table id="tbBasicInfo" style="width: 100%">
                <colgroup>
                  <col span="1" style="width: 30%" />
                  <col span="1" style="width: 70%" />
                </colgroup>

                <!-- Put <thead>, <tbody>, and <tr>'s here! -->
                <tbody></tbody>
              </table>
            </div>
            <p></p>
          </div>
        </div>
      </div>

      <!-- Second Photo Grid-->
      <div class="w3-row-padding"></div>

      <div class="w3-container w3-padding-large" style="margin-bottom: 32px">
        <div class="w3-section w3-bottombar w3-padding-16 w3-blue"></div>
        <h4 id="myFiles"><b>My Files</b></h4>

        <div class="wrapper w3-hide">
          <input name="studyLeaveF" type="file" id="ch1f" />
        </div>
        <div class="wrapper w3-hide">
          <input type="file" id="ch2f" />
        </div>
        <div class="wrapper w3-hide">
          <input type="file" id="ch3f" />
        </div>
        <div class="wrapper w3-hide">
          <input type="file" id="ch4f" />
        </div>
        <div class="wrapper w3-hide">
          <input type="file" id="ch5f" />
        </div>
        <div class="wrapper w3-hide">
          <input type="file" id="ch6f" />
        </div>

        <!-- Second Photo Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-aqua">
              <p><b>Study Leave</b></p>

              <div class="w3-card w3-center">
                <embed id="fStudyLeave" src="" type="application/pdf" />
              </div>


              <div class="w3-card w3-padding w3-center">
                <span
                  ><a


                    id="d1"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"> </i>
                  </a>
                  <a id="ch1" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>

            </div>
          </div>

          <div class="w3-third w3-container w3-margin-bottom w3-aqua">
            <div class="w3-container w3-aqua">
              <p><b>Admission Letter</b></p>
              <div class="w3-card w3-center">
                <embed id="fAdmission" src="" type="application/pdf" />
              </div>

              <div class="w3-card w3-padding w3-center">
                <span
                  ><a
                    id="d2"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                  <a id="ch2" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
          <div class="w3-third w3-container ">
            <div class="w3-container w3-aqua">
              <p><b>Master List</b></p>
              <div class="w3-card w3-center">
                <embed id="fMasterList" src="" type="application/pdf" />
              </div>

              <div class="w3-card w3-padding w3-center">
                <span
                  ><a
                    id="d3"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                  <a id="ch3" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Second Photo Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-aqua">
              <p><b>Matricula Page</b></p>
              <div class="w3-card w3-center">
                <embed id="fMatricula" src="" type="application/pdf" />
              </div>

              <div class="w3-card w3-padding w3-center">
                <span
                  ><a
                    id="d4"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                  <a id="ch4" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-aqua">
              <p><b>Ghana Card</b></p>
              <div class="w3-card w3-center">
                <embed id="fGhana" src="" type="application/pdf" />
              </div>

              <div class="w3-card w3-padding w3-center">
                <span
                  ><a
                    id="d5"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                  <a id="ch5" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
          <div class="w3-third w3-container">
            <div class="w3-container w3-aqua w3-margin">
              <p><b>SSNIT Card</b></p>
              <div class="w3-card w3-center">
                <embed id="fSsnit" src="" type="application/pdf" />
              </div>

              <div class="w3-card w3-padding w3-center">
                <span
                  ><a
                    id="d6"
                    href=""
                    target="_blank"
                    class="w3-button w3-deep-purple"
                    >Download
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                  <a id="ch6" class="w3-button w3-deep-purple"
                    >change
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
        </div>

        <hr />

        <br />
        <br />

        <div class="w3-row-padding w3-hide">
          <div class="w3-section w3-bottombar w3-padding-16 w3-blue"></div>
          <h4 id="payment"><strong>PAYMENT HISTORY</strong></h4>
        </div>

        <!-- First Photo Grid-->
        <div class="w3-row-padding w3-hide">
          <div class="w3-container w3-margin-bottom">
            <div class="w3-container w3-white">
              <h4><strong>My Gnatoc Dues Payment history</strong></h4>
              <p>
                All your dues payment information will be available here soon
              </p>
              <p><button class="w3-button w3-deep-purple">Print</button></p>
            </div>
          </div>
        </div>

        <div class="w3-row-padding w3-hide">
          <div class="w3-section w3-bottombar w3-padding-16 w3-blue"></div>
          <h4 id="voting"><strong>VOTING</strong></h4>
        </div>

        <!-- Second Photo Grid-->
        <div class="w3-row-padding w3-hide">
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-white">
              <p><b>Candidate 1</b></p>
              <p>
                Praesent tincidunt sed tellus ut rutrum. Sed vitae justo
                condimentum, porta lectus vitae, ultricies congue gravida diam
                non fringilla.
              </p>
              <p><button class="w3-button w3-deep-purple">Vote</button></p>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-white">
              <p><b>Candidate 2</b></p>
              <p>
                Praesent tincidunt sed tellus ut rutrum. Sed vitae justo
                condimentum, porta lectus vitae, ultricies congue gravida diam
                non fringilla.
              </p>
              <p><button class="w3-button w3-deep-purple">Vote</button></p>
            </div>
          </div>
          <div class="w3-third w3-container">
            <div class="w3-container w3-white">
              <p><b>Candidate 3</b></p>
              <p>
                Praesent tincidunt sed tellus ut rutrum. Sed vitae justo
                condimentum, porta lectus vitae, ultricies congue gravida diam
                non fringilla.
              </p>
              <p><button class="w3-button w3-deep-purple">Vote</button></p>
            </div>
          </div>
        </div>

        <hr />
        <br />
        <br />
      </div>

      <div class="w3-black w3-center w3-padding-24">
        Powered by
        <a href="#p" title="W3.CSS" target="_self" class="w3-hover-opacity"
          >GNATOC-AAMUSTED-K</a
        >
      </div>

      <!-- End page content -->

      <!-- BEGIN AEMODEL-->
      <div id="aeModelPassive" class="w3-modal">
        <div class="w3-modal-content">
          <header class="w3-container w3-deep-purple">
            <span
              onclick="document.getElementById('aeModelPassive').style.display='none'"
              class="w3-button w3-display-topright"
              >&times;</span
            >
            <h2 id="aeMtext">Modal Header</h2>
          </header>
        </div>
      </div>
      <!-- END AEMODEL-->
    </div>

    <!--BEGIN RESET PASSWORD MODEL-->

    <div id="aeMresetPassword" class="w3-modal">
      <div
        style="width: 30rem"
        class="w3-modal-content w3-animate-left w3-card-4"
      >
        <header class="w3-container w3-deep-purple">
          <span
            onclick="document.getElementById('aeMresetPassword').style.display='none'"
            class="w3-button w3-display-topright"
            >&times;</span
          >
          <h3>RESET YOUR PASSWORD <i class="fa fa-unlock fa-2x"></i></h3>
        </header>
        <div class="w3-container w3-aqua w3-padding-small">
          <form action="#" method="post">
            <div
              class="w3-container w3-aqua w3-center w3-padding"
              style="width: 80%; margin: auto"
            >
              <div class="w3-auto w3-padding">
                <input
                  required
                  style="font-weight: bolder"
                  id="oldPassword"
                  type="text"
                  placeholder="Old Password"
                />
              </div>

              <div class="w3-auto w3-padding">
                <input
                  required
                  style="font-weight: bolder"
                  id="newPassword"
                  type="password"
                  placeholder="New Password"
                />
              </div>
              <div class="w3-auto w3-padding">
                <input
                  required
                  style="font-weight: bolder"
                  id="confirmPassword"
                  type="password"
                  placeholder="Confirm Password"
                />

                <br /><input
                  id="showPassword1"
                  class="w3-card"
                  type="checkbox"
                  onclick="showPassword()"
                />
                <label for="showPassword1"><span>Show Password</span></label>
                <br />

                <label
                  id="errorMismatch"
                  style="
                    font-weight: bolder;
                    font-style: italic;
                    color: blue;
                    display: none;
                  "
                >
                  <span
                    ><br />
                    Password Mismatch!</span
                  ></label
                >
              </div>

              <button
                type="submit"
                id="submit"
                class="w3-button w3-deep-purple w3-round w3-margin-top w3-justify w3-centered"
              >
                Reset Password
                <i class="fa fa-unlock"></i>
              </button>
            </div>
          </form>
        </div>

        <footer class="w3-container w3-deep-purple">
          <p></p>
        </footer>
      </div>
    </div>
    <!--END RESET PASSWORD MODEL-->

    <script>
      function showReset() {
        w3_close();
        document.getElementById("aeMresetPassword").style.display = "block";
      }

      function showPassword() {
        var x = document.getElementById("newPassword");
        var xx = document.getElementById("confirmPassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        if (xx.type === "password") {
          xx.type = "text";
        } else {
          xx.type = "password";
        }
      }
      // Script to open and close sidebar
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>

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

      function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

      //2097152
      function fileTooBig(file) {
        if (file.size > 2097152) {
          var mdText =
            "Please Your File Size  is above 2mb.  Use a smaller file.";
          $("#aeMtext").text(mdText);

          document.getElementById("aeModelPassive").style.display = "block";

          return true;
        }
      }

      function show_success_alert(message) {
        $("#success-alert").html(message).show();
        $("#success-alert").delay(3000).fadeOut();
      }

      function resetUrl(text, response) {
        text = text.toLowerCase();
        // alert(text);

        if (text.indexOf("studyleave") !== -1) {
          fStudy = response;
          // alert(fStudy);
          setEmbedSrc("fStudyLeave", fStudy);
          document.getElementById("d1").setAttribute("href", fStudy);
        } else if (text.indexOf("admission") !== -1) {
          fAdmission = response;

          setEmbedSrc("fAdmission", fAdmission);
          document.getElementById("d2").setAttribute("href", fAdmission);
        } else if (text.indexOf("masterlist") !== -1) {
          fMasterList = response;

          setEmbedSrc("fMasterList", fMasterList);
          document.getElementById("d3").setAttribute("href", fMasterList);
        } else if (text.indexOf("matricula") !== -1) {
          fMatricula = response;

          setEmbedSrc("fMatricula", fMatricula);
          document.getElementById("d4").setAttribute("href", fMatricula);
        } else if (text.indexOf("ssnitcard") !== -1) {
          fSsnit = response;
          setEmbedSrc("fSsnit", fSsnit);
          document.getElementById("d6").setAttribute("href", fSsnit);
        } else if (text.indexOf("ghanacard") !== -1) {
          fGhana = response;

          setEmbedSrc("fGhana", fGhana);
          document.getElementById("d5").setAttribute("href", fGhana);
        }
      }

      function updatePassportPicture() {
        var file = $("#fileInput")[0].files[0];
        var formData = new FormData();
        formData.append("image", file);
        $.ajax({
          url: "updatePassport.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            // alert(response);
          },
        });
      }
    </script>

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

      function isFilePDF(fileId) {
        var input = document.getElementById(fileId);
        if (input.files && input.files[0]) {
          var file = input.files[0];
          var size = file.size / 1024 / 1024; // size in MB
          var type = file.type;

          if (type !== "application/pdf") {
            aeModelTitle = "CHOOSE PDF ONLY";
            aeModelBody = "ONLY PDF FILES ARE ALLOWED";

            var mdText = "ONLY PDF FILES ARE ALLOWED";
            $("#aeMtext").text(mdText);
            document.getElementById("aeModelPassive").style.display = "block";

            document.getElementById(fileId).value = "";
            return false;
            return false;
          } else if (size > 2) {
            var mdText = "PICTURE SIZE TOO LARGE";
            $("#aeMtext").text(mdText);
            document.getElementById("aeModelPassive").style.display = "block";
            document.getElementById(fileId).value = "";

            return false;
            return false;
          } else {
            return true;
          }
        }
      }

      function isFileImage(fileId) {
        var input = document.getElementById(fileId);
        if (input.files && input.files[0]) {
          var file = input.files[0];
          var size = file.size / 1024 / 1024; // size in MB
          var type = file.type;
          if (!type.startsWith("image")) {
            var mdText = "ONLY IMAGE FILE ALLOWED";
            $("#aeMtext").text(mdText);

            document.getElementById("aeModelPassive").style.display = "block";

            document.getElementById(fileId).value = "";

            return false;
          } else if (size > 2) {
            aeModelBody = "Please Your file is too large";
            var mdText =
              "Please Your File Size  is above 2mb.  Use a smaller file.";
            $("#aeMtext").text(aeModelBody);
            document.getElementById("aeModelPassive").style.display = "block";
            document.getElementById(fileId).value = "";
            return false;
          } else {
            return true;
          }
        }
      }
    </script>

    <!-- BEGIN AEMODEL-->
    <div id="aeModelPassive" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-deep-purple">
          <span
            onclick="document.getElementById('aeModelPassive').style.display='none'"
            class="w3-button w3-display-topright"
            >&times;</span
          >
          <h2 id="aeMtext">Modal Header</h2>
        </header>
      </div>
    </div>
    <!-- END AEMODEL-->
  </body>
</html>
