<?php 	
session_start();
include "conn.php";
if (isset($_POST['send'])) {
  
  $user=$_POST["user"];
  $password=$_POST["password"];
  $email=$_POST["email"];
  
  $query= "INSERT INTO `cms_admin` (`user`,`password`,`email`) VALUES ('$user',
  '$password','$email')";

  $data= mysqli_query($con,$query);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header>
	<nav class="navbar navbar-expand-sm bg-white navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand " href="#">Logo</a>
  
</nav>
</header>
<section class="container badge-light">
<div class="row container">
<div class="col-md-6 col-sm-6 col-xl-6">
	<h1 class="display-4 text-success">Create New Account</h1>
<form method="POST">
	<div><label>User-name:</label><input type="text" name="user" class="form-control"></div>
	<div><label>Password:</label><input type="password" name="password" class="form-control"></div>
	<div><label>Email-id:</label><input type="email" name="email" class="form-control"></div>
<button type="submit" class="btn btn-lg btn-danger mt-3" name="send">submit</button>
</form>
</div>

<div class="col-md-6 col-sm-6 col-xl-6">
	<h1 class="display-4 text-success">Log-in Here</h1>
<form method="POST">
	<div><label>User-name:</label><input type="email" name="user_txt" class="form-control"></div>
	<div><label>Password:</label><input type="password" name="pass_txt" class="form-control"></div>
<button type="submit" class="btn btn-lg btn-danger mt-3 " name="click">submit</button>
</form>
</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'conn.php';
if (isset($_POST['click'])) {
	$user=$_POST["user_txt"];
$pass=$_POST["pass_txt"];

$result= "SELECT * FROM `cms_admin` WHERE email='{$user}' and password='{$pass}' ";
$q= mysqli_query($con,$result);

if($res=mysqli_fetch_array($q)){
	$_SESSION['login']= true;
header("location:main_insert.php");
}else{
	$_SESSION['logout']= false;
header("location:index.php?error=1");

}

}
?>