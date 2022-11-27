<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "gnatoc";

/*
$hostname = "us-cdbr-east-06.cleardb.net";
$username = "b8052e1675b349";
$password = "226c3dab";
$database = "heroku_d0301c5e9ed1a1c";
//*/
//*
$hostname = "containers-us-west-98.railway.app";
$username = "root";
$password = "ismm28lwOe2ySW0pZhpq";
$database = "railway";


$hostname = $_ENV["HOST"];
$username =$_ENV["USER"];
$password =$_ENV["PASSWORD"];
$database =$_ENV["DB"];
$port =$_ENV["PORT"];


//*/
$conn = mysqli_connect($hostname, $username, $password, $database,$port) or die("Database connection failed");

?>