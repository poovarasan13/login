<?php
$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "poovarasan";


$con=mysqli_connect($servername,$username,$password,$dbname);

if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$uname="";
$email="";
$password="";
if (isset($_POST['submit'])){
  $uname=$_POST['uname'];
  $email=$_POST['email'];
  $password=$_POST['password']; 
  $tableName="data";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;
if (!$tableExists) {$SQL="CREATE TABLE data(
  uname varchar(100),
  email varchar(100),
  password varchar(100)
  )";
    $sqltable = mysqli_query($con,$SQL);
    if($sqltable){
        echo"table created";
    }
    else{
        echo"Error to create a table";
    }
}
if ($tableExists) {
  $sql = "INSERT INTO $tableName (uname, email, password) VALUES ('$uname', '$email', '$password')";
  $result = mysqli_query($con, $sql);

  if ($result) {
      header("Location: thankyou.html");
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
}
}session_start();
if (isset($_POST['submit1'])){
 // echo "poovarasan";
$uname1=$_POST['uname1'];
$password1=$_POST['password1'];
$sql1="SELECT uname,password,email FROM data  WHERE uname='$uname1' and password='$password1'";

$res=mysqli_query($con,$sql1);
if ($res->num_rows > 0) 
{  while($row = mysqli_fetch_assoc($res)){
  
  $n  =$row["uname"];
  $e=$row["email"];
}
}
$_SESSION['name1']=$n;
$_SESSION['email1']=$e;

$resultcheck=mysqli_num_rows($res);
if($resultcheck>0)
{
  header("Location: user.php");
      exit(); 
}

}
session_abort();
?>
<html><head>
<style>*{
    margin: 0px;
    padding: 0px;;
  }
  
  body{
    font-family: Arial, Helvetica, sans-serif;
  }
  
  .container
  {
    display: grid;
    grid-template-columns: 1fr 2fr;
    background-color: red;
    background: linear-gradient(to bottom, rgb(6, 108, 100),  rgb(14, 48, 122));
    width: 800px;
    height: 400px;
    margin: 10% auto;;
    border-radius: 5px;
  }
  
  .content-holder
  {
    text-align: center;
    color: white;
    font-size: 14px;
    font-weight: lighter;
    letter-spacing: 2px;
    margin-top: 15%;
    padding: 50px;
  }
  
  .content-holder h2
  {
    font-size: 34px;
    margin: 20px auto;
  }
  
  .content-holder p
  {
    margin: 30px auto;
  }
  
  .content-holder button
  {
    border:none;
    font-size: 15px;
    padding: 10px;
    border-radius: 6px;
    background-color: white;
    width: 150px;
    margin: 20px auto;
  }
  
  
  .box-2{
    background-color: white;
  
    margin: 5px;
  }
  
  .login-form-container
  {
    text-align: center;
    margin-top: 10%;
  
  }
  
  .login-form-container h1
  {
    color: black;
    font-size: 24px;
    padding: 20px;
  }
  
  .input-field
  {
    box-sizing: border-box;
    font-size: 14px;
    padding: 10px;
    border-radius: 7px;
    border: 1px solid rgb(168, 168, 168);
    width: 250px;
    outline: none;
  }
  
  .login-button{
    box-sizing: border-box;
    color: white;
    font-size: 14px;
    padding: 13px;
    border-radius: 7px;
    border: none;
    width: 250px;
    outline: none;
    background-color: rgb(56, 102, 189);
  }
  
  
  
  .button-2
  {
    display: none;
  }
  
  
  
  
  
  .signup-form-container
  {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-60%);
    text-align: center;
    display: none;
  }
  
  
  .signup-form-container h1
  {
    color: black;
    font-size: 24px;
    padding: 20px;
  }
  
  .signup-button{
    box-sizing: border-box;
    color: white;
    font-size: 14px;
    padding: 13px;
    border-radius: 7px;
    border: none;
    width: 250px;
    outline: none;
    background-color: rgb(56, 189, 149);  
  }
</style>
<script>function signup()
{
    document.querySelector(".login-form-container").style.cssText = "display: none;";
    document.querySelector(".signup-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText = "background: linear-gradient(to bottom, rgb(56, 189, 149),  rgb(28, 139, 106));";
    document.querySelector(".button-1").style.cssText = "display: none";
    document.querySelector(".button-2").style.cssText = "display: block";

};

function login()
{
    document.querySelector(".signup-form-container").style.cssText = "display: none;";
    document.querySelector(".login-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText = "background: linear-gradient(to bottom, rgb(6, 108, 224),  rgb(14, 48, 122));";
    document.querySelector(".button-2").style.cssText = "display: none";
    document.querySelector(".button-1").style.cssText = "display: block";

}


</script></head>
<body>
<div class="container">
<!--Data or Content-->
<div class="box-1">
    <div class="content-holder">
        <h2>Hello!</h2>
       
        <button class="button-1" onclick="signup()">Sign up</button>
        <button class="button-2" onclick="login()">Login</button>
    </div>
</div>


<!--Forms-->
<div class="box-2">
    <div class="login-form-container"><form method="post" action="">
        <h1>Login Form</h1>
        <input type="text" placeholder="Username" name="uname1" id="uname1"class="input-field">
        <br><br>
        <input type="password" placeholder="Password" name="password1"  id="password1" class="input-field">
        <br><br>
        <button class="login-button" type="submit1" name="submit1">Login</button>
</form> </div>


<!--Create Container for Signup form-->
<div class="signup-form-container" ><form method="post" action="">
    <h1>Sign Up Form</h1>
    <input type="text" placeholder="Username" name="uname" id="uname" class="input-field">
    <br><br>
    <input type="email" placeholder="Email" name="email"  id="email" class="input-field">
    <br><br>
    <input type="password" placeholder="Password" name="password"  id="password"  class="input-field">
    <br><br>
    <button class="signup-button" type="submit" name="submit"  >Sign Ups</button>
</div>
</form>


</div>
<body></html>