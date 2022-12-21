<?php



  $id = "1220016";
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "","gnatoc","63947");
  mysql_select_db("gnatoc");




  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}





  $sql = "SELECT passportB FROM file WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['passportB'];
?>
