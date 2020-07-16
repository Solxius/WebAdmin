<?php
 include('config.php');

$name = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];

$id = "U" . rand(100, 999);

$sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$id'";
$data = mysqli_query($db_connection, $sql);
$check = mysqli_num_rows($data);

while($check>0)
{
  $id = "U" . rand(100, 999);

  $sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$id'";
  $data = mysqli_query($db_connection, $sql);
  $check = mysqli_num_rows($data);
}

$sql1 = "INSERT INTO `daftar user`(`ID`, `Name`, `Email`, `Birthdate`, `Gender`, `Role`, `Password`) VALUES ('$id', '$name', '$email', '$birthdate', '$gender', 'User', '$password')";
$query = mysqli_query($db_connection, $sql1);

if (!$query)
{
	header('Location: register_form.php?info=fail');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Waiting for Admin Input</title>
		<link href="components/assets/dist/css/bootstrap.css" rel="stylesheet">
		<link href="components/registering.css" rel="stylesheet">
		<meta http-equiv="refresh" content="6;url=index.php?info=registered" />
	</head>

	<body>
		<div class="center">
		<div class="sk-folding-cube">
 			 <div class="sk-cube1 sk-cube"></div>
 			 <div class="sk-cube2 sk-cube"></div>
  			 <div class="sk-cube4 sk-cube"></div>
 			 <div class="sk-cube3 sk-cube"></div>
		</div>
		<h4>Please wait while an admin verifies your identity</h4>
	</div>
	</body>
</html>
