<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GNATOC-AAMUSTED</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

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

    <style>
      #confirmation-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

#confirmation-modal-content {
  background: #fff;
  border-radius: 5px;
  padding: 20px;
  text-align: center;
}

#confirmation-modal-buttons {
  display: flex;
  justify-content: center;
}

#confirm-button,
#cancel-button {
  background: #007bff;
  border: none;
  color: #fff;
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  margin: 0 10px;
}

#confirm-button:hover,
#cancel-button:hover {
  background: #0069d9;
}

</style>

    <style>
      body {
        line-height: 1.7;
        background-color: #031633;
        color: white;
      }

      .navbar {
        width: 100%;
        color: #b0dbee;
        font-weight: bolder;

        position: sticky;
        z-index: 1;
        top: 0;
      }

      .hero {
        background-image: url("devImage/db.PNG");
        background-position: center;
        background-size: cover;

        background-attachment: fixed;
        background-size: contain;
        background-repeat: no-repeat;

        position: relative;
        background-color: #031633;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #212529;
        color: white;
        text-align: center;
      }

  a:hover{
  text-decoration: underline;
  color: blue;
  font-size: larger;
}





    </style>

    <!-- SCRIPTS BEGIN-->

    <script>
      $(document).ready(function () {

        $("#emptySystem").click(function(){

document.getElementById("confirmation-modal").style.display = "flex";

   });

      $("#confirm-button").click(function(){
      document.getElementById("confirmation-modal").style.display = "none";
      runPHPCode("empty_system.php");

         });

$("#cancel-button").click(function(){

document.getElementById("confirmation-modal").style.display = "none";

});
       

        $("#btnRegister").click(function () {
          location.replace("memberBio1.html");
        });
        $("#resetPassword").click(function () {
          $("#myModalResetPassword").modal("show");
        });
      });
    </script>

<?php
  include "verifyAdmin.php";
  ?>
  </head>

  <body>





    <!-- NAV BAR BEGINS-->

    <nav
      class="navbar navbar-expand-md navbar-expand-lg py-3 navbar-dark bg-dark"
    >
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img     style="width: 5rem; border-radius: 50%;" src="devImage/L14.jpg" alt="" />
          <span style="font-weight: bold; color: #3d8bfd">
            GNATOC-AAMUSTED-K</span
          >
        </a>
    
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a id="ahome" class="nav-link" aria-current="page" href="index.php">Home
                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a id="acode" class="nav-link" href="generateCode.php">CODE

                <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a id="adue" class="nav-link" href="#">Receive Dues

                <i class="fa fa-money fa-2x" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">

            <a  id="arecord" class="nav-link" href="record.php">Records
              <i  class="fa fa-table fa-2x" aria-hidden="true"></i>

            </a>
     
            </li>
            <li class="nav-item">
              <a
                id="resetPassword"
                class="nav-link"
                href="resetAdminPassword.html"
                >Reset Password
                <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i>
                </a
              >
            </li>
            <li class="nav-item">
              <a id="anew" class="nav-link" href="addAdmin.php"
                >New Admin
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                </a
              >
            </li>
            <li class="nav-item">
              <a id="emptySystem" class="nav-link" 
                >Empty System
                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                </a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAV BAR-->

    <div class="footer">
      <p>
        &copy; 2022 GNATOC-AAMUSTED-K <br />
        <i class="bi bi-envelope-fill"></i>
        <span>aamustedgnatoc@gmail.com</span> <br />
        <i class="bi bi-telephone-forward-fill"></i>
        <span>Tel: 0257705314 </span>
      </p>
    </div>



    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>




    <div id="confirmation-modal">
  <div id="confirmation-modal-content">
    <p style="color:blue; font-weight:bold">Are you sure you want to delete All records in the System?</p>
    <div id="confirmation-modal-buttons">
      <button id="confirm-button">Yes</button>
      <button id="cancel-button">No</button>
    </div>
  </div>
</div>

  </body>

  <script>
    async function runPHPCode(phpFile) {
  // Send the request
  const response = await fetch(phpFile, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "param1=value1&param2=value2"
  });

  // Handle the response from the server
 // const result = await response.text();
 // console.log(result);
}

  </script>


  
</html>
