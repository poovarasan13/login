<?php
$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "poovarasan";


$con=mysqli_connect($servername,$username,$password,$dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><style>
  .body{
    color:red;
  }
  </style>
<body>
    <h1> Hello <?php echo $_SESSION['name1'];?></h1>
    <h3 style="color:green" > Your E-Mail is   <?php echo $_SESSION['email1'];?><h3>
</body>
</html>