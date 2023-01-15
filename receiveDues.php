<?php
  include "verifyAdmin.php";
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="AECleanCodes" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
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

    <title>AAMUSTED GNATOC-K</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
          inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      #trashCan:hover {
        color: red !important;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="receivedues.css" rel="stylesheet" />
  </head>

  <body class="d-flex flex-column h-100">
    <script>
      var staffID = "";
      var email = "";
      var amount = "";
      var actualAmount = "";
      var genCode = "";
      var delThisID = "";
      $(document).ready(function () {
        updateTable();

        $("table").on("click", "td", function () {
          $("tr").removeClass("selected");
          $(this).parent().addClass("selected");

          delThisID = $(this).parent().find("td:first").text();
        });

        $("#trashCan").click(function () {
          showMYesNo("Do you want to delete the selected record?");
        });

        hideCodeField();
        $("#form1").submit(function (e) {
          e.preventDefault();
          showSpin();
          getInput();

          insertDue();
        });

        $("#tf_actualAmount").focus(function () {
          if ($(this).val() == $(this).attr("placeholder")) {
            $(this).val("");
          }
        });
        $("#tf_actualAmount").blur(function () {
          if ($(this).val() == "") {
            $(this).val($(this).attr("placeholder"));
          }
        });

        getSettings();
        hideSpin();

        $("#tf_actualAmount").keyup(function () {
          insertSettings();
        });

        $("#aeMyesNo").on("click", "#aeMyesNoBt", function (e) {
          hideMYesNo();
          deleteDue();
        });

        $("#aeMsuccessw").on("hidden.bs.modal", function () {
          // openPageReplace("signup2.html");
        });

        $("#aeMerror").on("hidden.bs.modal", function () {
          hideSpin();
        });
      });
    </script>

    <header>
      <!-- Fixed navbar -->
      <nav
        id="nav1"
        class="navbar navbar-expand-md navbar-brand fixed-top w-100 m-0"
      >
        <div class="container-fluid">
          <img
            id="logo"
            class="navbar-brand"
            src="devImage/ghatoc2.PNG"
            alt=""
          />
          <button
            id="hambergerButton"
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a href="login.php" id="logout" class="nav-link"> Log out</a>
              </li>
              <li class="nav-item">
                <a id="ll1" class="nav-link" href="adminPage.php">
                  <i class="fa fa-" aria-hidden="true"></i>
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  Go Back</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

    <div class="container mt-5">
      <div class="row mt-5 m-lg-5">
        <div class="col-lg-6 col-md-12">
          <div class="card m-5 mb-0">
            <div class="col">
              <div class="card-body">
                <form id="form1">
                  <div id="codeHide">
                    <label
                      style="color: white; background-color: green"
                      id="lbSentmessage"
                      ><span id="lbv1">1220016</span> has Paid GHS
                      <span id="lbv2">200</span> Successfully!
                    </label>
                    <div class="form-group">
                      <div>
                        <input
                          id="tf_genCode"
                          type="text"
                          placeholder="Code"
                          style="
                            color: white;
                            background-color: #271770;
                            font-weight: bolder;
                            text-align: center;
                          "
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input
                      placeholder="staff ID"
                      id="tf_staffID"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>

                  <div class="form-group">
                    <input
                      placeholder="User Email e.g. name@gmail.com"
                      id="tf_email"
                      type="email"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      placeholder="Amount"
                      id="tf_memberAmount"
                      type="number"
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <div class="form-floating mb-1">
                      <input
                        type="text"
                        class="form-control"
                        id="tf_actualAmount"
                        placeholder="Dues Amount= GHS 200"
                        required
                      />
                      <label for="tf_actualAmount"
                        >Dues Amount= GHS 200</label
                      >
                    </div>
                  </div>

                  <label id="error_message">Error</label>
                  <button type="submit" class="btn btn-primary">
                    Submit
                    <i id="spin" class="fas fa-spinner fa-pulse"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12">
          <div class="card m-5">
            <div class="col">
              <div class="card-body">
                <form id="form2">
                  <i
                    id="trashCan"
                    style="color: #271770"
                    class="fa fa-trash fa-2x"
                  ></i>
                  <a href="output/Dues.xlsx" download>
                    <img
                      style="
                        width: 3rem;
                        margin: auto;
                        position: absolute;
                        right: 0;
                      "
                      src="devImage/excel.png"
                      alt=""
                    />
                  </a>
                  <br />
                  <label>Delete selected</label>
                  <div class="col">
                    <style>
                      table {
                        background-color: white;
                      }
                      #tableCard {
                        max-height: 20rem;
                        overflow-y: scroll;
                      }

                      .selected {
                        background-color: #87cefa;
                      }
                      td:first-child,
                      th:first-child {
                        display: none;
                      }

                      #userTotal {
                        color: blue;
                        font-weight: bolder;
                      }

                      #grandTotal {
                        color: blue;
                        font-weight: bolder;
                      }
                    </style>

                    <div id="tableCard" class="row">
                      <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Member</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Row 1, Column 1</td>
                            <td>Row 1, Column 2</td>
                            <td>Row 1, Column 3</td>
                            <td>Row 1, Column 4</td>
                            <td>Row 1, Column 4</td>
                          </tr>
                          <tr>
                            <td>Row 1, Column 1</td>
                            <td>Row 1, Column 2</td>
                            <td>Row 1, Column 3</td>
                            <td>Row 1, Column 4</td>
                          </tr>
                          <tr>
                            <td>Row 2, Column 1</td>
                            <td>Row 2, Column 2</td>
                            <td>Row 2, Column 3</td>
                            <td>Row 2, Column 4</td>
                            <td>Row 2, Column 4</td>
                          </tr>
                          <tr>
                            <td>Row 3, Column 1</td>
                            <td>Row 3, Column 2</td>
                            <td>Row 3, Column 3</td>
                            <td>Row 3, Column 4</td>
                            <td>Row 3, Column 4</td>
                          </tr>
                          <tr>
                            <td>Row 4, Column 1</td>
                            <td>Row 4, Column 2</td>
                            <td>Row 4, Column 3</td>
                            <td>Row 4, Column 4</td>
                            <td>Row 4, Column 4</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <label>
                    <span>
                      You :GHS
                      <span id="userTotal">100 </span>
                    </span>
                    &nbsp; &nbsp;

                    <span
                      >Total: GHS
                      <span id="grandTotal">5000 </span>
                    </span>
                  </label>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BEGIN  MODALS-->

    <div id="aeMsuccess" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMsucces" class="modal-header">
            <h5 id="aeAlertTitle" class="modal-title">SUCCESS!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-check-circle fa-2x"
              aria-hidden="true"
            ></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeAlertBody">ACTION PERFORMED SUCCESSFULLY.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN  MODALS-->

    <div id="aeMsuccessw" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMsuccesw" class="modal-header">
            <h5 id="aeAlertTitlew" class="modal-title">SUCCESS!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-check-circle fa-2x"
              aria-hidden="true"
            ></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeAlertBodyw">ACTION PERFORMED SUCCESSFULLY.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN  MODALS-->

    <div id="aeMerror" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMerro" class="modal-header">
            <h5 id="aeMerrorTitle" class="modal-title">ERROR!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-exclamation-triangle"
              aria-hidden="true"
            ></i>

            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeMerrorBody">PLEASE TRY AGAIN.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN AEMODEL-->
    <div id="aeMyesNo" class="modal" tabindex="-1">
      <div
        id="aeMyesN"
        style="max-width: 20rem; background-color: gray"
        class="modal-dialog"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="aeMTitle" class="modal-title">
              <strong>CONFIRM ACTION!</strong>
            </h5>
          </div>
          <div class="modal-body">
            <p style="font-weight: bold">
              <span id="aeMBody"> Do you want to perform this action? </span>
            </p>
          </div>

          <div class="modal-footer">
            <div class="row">
              <div class="col-6">
                <button id="aeMyesNoBt" type="button" class="btn btn-danger">
                  Yes
                </button>
              </div>
              <div class="col-6">
                <button
                  id="btClose"
                  type="button"
                  class="btn btn-primary"
                  data-bs-dismiss="modal"
                >
                  No
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END AEMODEL-->

    <footer id="myFooter" class="py-3 fixed-bottom">
      <div class="container">
        <span class="text-muted">&COPY;2022 All rights reserved</span>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
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
      function deleteDue() {
        $.ajax({
          type: "post",
          data: {
            ID: delThisID,
          },
          cache: false,
          url: "deleteDues.php",
          dataType: "text",
          success: function (data, status) {
            // alert(data);
            updateTable();
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }
      function updateTable() {

        $("table tbody tr").remove();
        $("#grandTotal").text("0");
              $("#userTotal").text("0");

        $.ajax({
          type: "post",
          data: {},
          cache: false,
          url: "selectDues.php",
          dataType: "JSON",
          success: function (response, status) {
            // alert(response);

            var len = response.length;
            //  alert(len);

            var grandTotal =0;
            var userTotal = 0;

            for (var i = 0; i < len; i++) {
              var ID = response[i].recordID;
              var userID = response[i].userID;
              var staffID = response[i].staffID;
              var payedamount = response[i].payedamount;
              var actualamount = response[i].actualamount;
              var debt = response[i].debt;
              var paydate = response[i].paydate;
              var currentUser = response[i].currentUser;

              if (currentUser == userID) {

                var n = parseFloat(payedamount);
                userTotal+=n;
              }

              var nn = parseFloat(payedamount);
                grandTotal+=nn;

            

              var tr_str =
                "<tr>" +
                "<td >" +
                ID +
                "</td>" +
                "<td >" +
                userID +
                "</td>" +
                "<td>" +
                staffID +
                "</td>" +
                "<td>" +
                payedamount +
                "</td>" +
                "<td>" +
                paydate +
                "</td>" +
                "</tr>";

              $("table tbody").append(tr_str);


              $("#grandTotal").text(grandTotal);
              $("#userTotal").text(userTotal);



            }
          },
          error: function (xhr, status, error) {
           // alert(error);
          },
        });
      }

      function sendEmail() {
        if (aeEmpty(email)) {
          return;
        }
        var subject = "DUES PAYMENT";
        var message =
          "hello!  " +
          staffID +
          "\n" +
          "Thank You for Paying an amount of GHS " +
          amount +
          " as AAMUSTED GNATOC KUMASI CAMPUS DUES.\n" +
          "You may use the code below to register on our  App" +
          "\n Your Authentication" +
          "Code is below:\n\t" +
          genCode;
        var receiver = email;
        $.ajax({
          type: "post",
          data: {
            subject: subject,
            message: message,
            receiver: receiver,
          },
          cache: false,
          url: "sendEmail2.php",
          dataType: "text",
          success: function (data, status) {
            /// alert(data);
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }

      function insertDue() {
        //  alert(staffID)
        $.ajax({
          type: "post",
          data: {
            amount: amount,
            actualAmount: actualAmount,
            staffID: staffID,
          },
          cache: false,
          url: "insertDue.php",
          dataType: "text",
          success: function (data, status) {
            //alert("data:"+data.length)
            if (data.length == 7) {
              genCode = data;
              $("#tf_genCode").val(data);
              $("#lbv1").text(staffID);
              $("#lbv2").text(amount);

              $("#tf_email").val("");
              $("#tf_staffID").val("");
              $("#tf_memberAmount").val("");

              showCodeField();
              hideSpin();
              updateTable();
              sendEmail();
            }
          },
          error: function (xhr, status, error) {
            alert(error);
          },
        });
      }

      function getSettings() {
        $.ajax({
          type: "post",
          data: {},
          cache: false,
          url: "selectSettings.php",
          dataType: "text",
          success: function (data, status) {
            actualAmount = data;
            $("#tf_actualAmount").val(data);
            $("#tf_actualAmount").attr(
              "placeholder",
              "Dues Amount= GHS " + data
            );
            $("label[for='tf_actualAmount']").text(
              "Dues Amount= GHS " + data
            );
          },
          error: function (xhr, status, error) {
            alert(error);
          },
        });
      }

      function insertSettings() {
        var amount = $("#tf_actualAmount").val();

        if (aeEmpty(amount)) {
          return;
        }
        $.ajax({
          type: "post",
          data: {
            amount: amount,
          },
          cache: false,
          url: "insertSetting.php",
          dataType: "text",
          success: function (data, status) {},
          error: function (xhr, status, error) {
            alert(error);
          },
        });
      }

      function getInput() {
        email = $("#tf_email").val();
        staffID = $("#tf_staffID").val();
        amount = $("#tf_memberAmount").val();
        actualAmount = $("#tf_actualAmount").val();
        genCode = $("#tf_genCode").val();

        staffID = trimV(staffID);
        email = trimV(email);
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
      function showCodeTf(message) {
        $("#error_message").show();
      }

      function hideCodeTf() {
        $("#error_message").hide();
      }

      function showSpin() {
        $("#spin").show();
        $("#spin2").show();
      }
      function hideSpin() {
        $("#spin").hide();
        $("#spin2").hide();
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
      function hideMYesNo() {
        $("#aeMyesNo").modal("hide");
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
