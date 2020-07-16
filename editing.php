<?php
session_start();
include('config.php');

if(!isset($_GET['ID']))
{
	header("location:edit_form.php?info=fail2");
}

$preid = $_GET['info'];

$name = $_POST['fname'];
$editid = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$role = $_POST['role'];

if ($role=='Superadmin')
{
	$editid = "P" . $editid;

	$sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	$data = mysqli_query($db_connection, $sql);
	$check = mysqli_num_rows($data);

	while($check>0)
	{
	  $editid = "P" . rand(1, 10);

	  $sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	  $data = mysqli_query($db_connection, $sql);
	  $check = mysqli_num_rows($data);
	}
}
if ($role=='Admin')
{
	$editid = "R" . $editid;

	$sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	$data = mysqli_query($db_connection, $sql);
	$check = mysqli_num_rows($data);

	while($check>0)
	{
	  $editid = "R" . rand(10, 99);

	  $sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	  $data = mysqli_query($db_connection, $sql);
	  $check = mysqli_num_rows($data);
	}
}

if ($role=='User')
{
	$editid = "U" . $editid;

	$sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	$data = mysqli_query($db_connection, $sql);
	$check = mysqli_num_rows($data);

	while($check>0)
	{
	  $editid = "U" . rand(100, 999);

	  $sql = "SELECT 'ID' FROM `daftar user` WHERE ID='$editid' AND Email NOT LIKE '$email'";
	  $data = mysqli_query($db_connection, $sql);
	  $check = mysqli_num_rows($data);
	}
}

$sql1 = "UPDATE `daftar user` SET `ID`='$editid',`Name`='$name',`Email`='$email',`Birthdate`='$birthdate',`Gender`='$gender',`Role`='$role',`Password`='$password' WHERE ID='$preid'";
$query = mysqli_query($db_connection, $sql1);

if (!$query)
{
	header('Location: edit_form.php?ID='.$preid.'&info=fail');
}

if ($query)
{
	header('Location: edit_form.php?ID='.$preid.'&info=success');
}

?>