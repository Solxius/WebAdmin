<?php
session_start();
include('config.php');
 
$email = $_POST['email'];
$password = $_POST['password'];
 
$data = mysqli_query($db_connection, "SELECT * FROM `daftar user` WHERE Email='$email' AND Password='$password'");
$check = mysqli_num_rows($data);

if($check > 0)
{
	while($row = $data->fetch_assoc()) 
	{
		$_SESSION['name'] = $row["Name"];
    	$_SESSION['role'] = $row["Role"];
    	$_SESSION['id'] = $row["ID"];
  	}

	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:main-page.php");
}
else
{
	header("location:index.php?info=incorrect");
}
?>