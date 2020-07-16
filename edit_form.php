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

	if($_SESSION['role']=="User" && $_SESSION['email']!=$editmail)
	{
	  header("location:operatives_list.php");
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
}
if(!isset($_GET['ID']))
{
	header("location:full_operatives.php");
}

$id = $_GET['ID'];
$data = mysqli_query($db_connection, "SELECT * FROM `daftar user` WHERE ID='$id'");
$ops = mysqli_fetch_assoc($data);
$editid = $ops['ID'];
$infoid = $editid;
$editid = substr($editid, 1);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Providence">
    <meta name="generator" content="Jekyll v4.0.1">
    <link rel="shortcut icon" type="image/x-icon" href="components/logo.ico" />
    <title> ~ </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="components/assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="components/edit.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="editing.php?info=<?php echo $infoid; ?>">
  <img class="mb-4" src="components/providence.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">providence tempero omnis</h1>
  <?php 
	if(isset($_GET['info'])){
		if($_GET['info'] == "fail"){
			echo "Editing process has failed.";}
		if($_GET['info'] == "fail2"){
			echo "Server has failed, please go back to list.";}
		if($_GET['info'] == "success"){
			echo "Profile has been edited.";}
	}
	?>

  <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><?php if ($ops['Role']=='Superadmin') { echo 'P'; } if ($ops['Role']=='Admin') { echo 'R'; } if ($ops['Role']=='User') { echo 'U'; } ?></div>
        </div>
    <input type="text" id="id" name="id" class="form-control" id="inlineFormInputGroup" placeholder="ID" value="<?php echo $editid ?>" <?php if ($_SESSION['role']!="Superadmin" || $_SESSION['id']!="R1") { echo 'readonly'; } ?>>
  </div> 
	<select class="form-control form-control-sm" name="role">
	  <option value = "Superadmin" <?php if ($ops['Role']=='Superadmin') { echo 'selected'; } else { echo 'disabled'; } ?>>Superadmin</option>
	  <option value = "Admin" <?php if ($ops['Role']=='Admin') { echo 'selected'; } if ($ops['Role']=='Superadmin' || $_SESSION['role']=='User') { echo 'disabled'; } ?>>Admin</option>
	  <option value = "User" <?php if ($ops['Role']=='User') { echo 'selected'; } if ($ops['Role']=='Admin' && ($_SESSION['id']!='R1' || $_SESSION['role']!='Superadmin')) { echo 'disabled'; } if ($ops['Role']=='Superadmin') { echo 'disabled'; } ?>>User</option>
	</select>
  <label for="Name" class="sr-only">name</label>
  <input type="text" id="fname" class="form-control" name="fname" placeholder="full name" value="<?php echo $ops['Name'] ?>" required>
  <label for="inputEmail" class="sr-only">email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="email address" value="<?php echo $ops['Email'] ?>"  required>
  <label for="inputPassword" class="sr-only">password</label>
  <input type="<?php if ($_SESSION['email']==$ops['Email']) { echo 'text'; } else { echo 'password'; } ?>" id="inputPassword" class="form-control" name="password" placeholder="password" value="<?php echo $ops['Password'] ?>" required <?php if ($_SESSION['email']!=$ops['Email']) { echo 'readonly'; } ?>>
  <label for="birthdate" class="sr-only">name</label>
  <input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="birthdate" value="<?php echo $ops['Birthdate'] ?>" required>
  <label for="Gender" class="sr-only">gender</label>
  <input type="text" id="gender" class="form-control" name="gender" placeholder="gender" value="<?php echo $ops['Gender'] ?>" required>

  <button class="btn btn-lg btn-warning btn-block" type="submit">Edit</button> <br>
  <a href="full_operatives.php">Back to operatives list</a>
  <p class="mt-5 mb-3 text-muted">&copy; 31BC-2020</p>
</form>
</body>
</html>