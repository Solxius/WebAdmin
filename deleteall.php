<?php
session_start();
include('config.php');

if ($_SESSION['role']!='Superadmin')
{
	header("location:main-page.php");
}

else
{
	$sql1 = "DELETE * FROM `daftar user`";
	$query = mysqli_query($db_connection, $sql1);
	session_destroy();
}

?>