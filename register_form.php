<?php
 include('config.php');
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
    <link href="components/register.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="register.php">
  <img class="mb-4" src="components/providence.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">providentia novit omnia</h1>
  <?php 
	if(isset($_GET['info'])){
		if($_GET['info'] == "fail"){
			echo "Registering process has failed.";}
	}
	?>

  <label for="Name" class="sr-only">name</label>
  <input type="text" id="fname" class="form-control" name="fname" placeholder="full name" required autofocus>
  <label for="inputEmail" class="sr-only">email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="email address" required>
  <label for="inputPassword" class="sr-only">password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="password" required>
  <label for="birthdate" class="sr-only">name</label>
  <input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="birthdate" required>
  <label for="Gender" class="sr-only">gender</label>
  <input type="text" id="gender" class="form-control" name="gender" placeholder="gender" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button> <br>
  <p>have an account? <a href="index.php">Login here</a></p>
  <p class="mt-5 mb-3 text-muted">&copy; 31BC-2020</p>
</form>
</body>
</html>
