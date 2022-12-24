<?php
include "config.php";

$sex=$_POST["sex"];
$from=$_POST["from"];
$to=$_POST["to"];
$level=$_POST["level"];

$sex = mysqli_real_escape_string($conn, $sex);
$from = mysqli_real_escape_string($conn, $from);
$to = mysqli_real_escape_string($conn, $to);
$level = mysqli_real_escape_string($conn, $level);

$qry = "";

if (!empty($sex)) {
    $qry = "SELECT * FROM memberfile WHERE `gender` LIKE '%$sex%'";
    
}

if (!empty($from)) {
    $qry = "SELECT * FROM memberfile WHERE `yearOfAdmission` LIKE '%$from%'";
}


if (!empty($to)) {
    $qry = "SELECT * FROM memberfile WHERE `yearOfCompletion` LIKE '%$to%'";
}

if (!empty($level)) {
    $qry = "SELECT * FROM memberfile WHERE `level` LIKE '%$level%'";
}



$result = $conn->query($qry);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo $row["staffID"];

  }
} else {
  echo "0 results";
}
$conn->close();


?>






