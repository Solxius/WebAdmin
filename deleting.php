<?php
session_start();
include('config.php');

if(isset($_GET['ID']))
{
	$id = $_GET['ID'];
	$data = mysqli_query($db_connection, "SELECT * FROM `daftar user` WHERE ID='$id'");
	$check = mysqli_num_rows($data);
	$editrole = " ";
	$editmail = " ";

	if($check > 0)
	{
		while($row = $data->fetch_assoc()) 
		{
	    	$editrole = $row["Role"];
	    	$editmail = $row["Email"];
	  	}
	}


	if($_SESSION['status']!="login")
	{
	  header("location:index.php?info=not_yet");
	}

	if($_SESSION['role']=="User")
	{
	  header("location:main-page.php");
	}

	if(($_SESSION['role']!="Superadmin" && $editrole=="Superadmin")  || $check < 1)
	{
	  header("location:full_operatives.php");
	}

	if (($editrole=='Superadmin' || $editrole=='Admin') && ($_SESSION['email']!=$editmail && $_SESSION['role']!='Superadmin'))
	{
		header("location:full_operatives.php");
	}
	if(($_SESSION['role']=="Superadmin" && $editrole=="Superadmin") && $editmail!=$_SESSION['email'])
	{
	  header("location:full_operatives.php");
	}

$sql1 = "DELETE FROM `daftar user` WHERE ID='$id'";
$query = mysqli_query($db_connection, $sql1);

if (!$query)
{
	header('Location: full_operatives.php?info=fail');
}

if ($query)
{
	if ($_SESSION['email']==$editmail)
	{
		session_destroy();
		header("location:index.php?info=deleted");
	}
	header('Location: full_operatives.php?info=success');
}

}
if(!isset($_GET['ID']))
{
	header("location:full_operatives.php?info=fail");
}

?>