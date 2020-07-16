<?php
 include('config.php');
 session_start();
 session_destroy();

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
    <link href="components/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="login_check.php">
  <img class="mb-4" src="components/providence.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">providentia videt omnia</h1>
  <?php 
	if(isset($_GET['info'])){
		if($_GET['info'] == "incorrect"){
			echo "Email or password incorrect.";
		}else if($_GET['info'] == "logout"){
			echo "You have successfully logged out.";
		}else if($_GET['info'] == "not_yet"){
			echo "You are not authorized to access data beyond this point.";
		}else if($_GET['info'] == "registered"){
			echo "Your identity has been verified.";
		}else if($_GET['info'] == "deleted"){
			echo "Your account has been deleted.";
		}
	}
	?>
	
  <label for="inputEmail" class="sr-only">email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="email address" required autofocus>
  <label for="inputPassword" class="sr-only">password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="password" size="255" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> <br>
  <p>don't have an account? <a href="register_form.php">register here</a></p>
  <p class="mt-5 mb-3 text-muted">&copy; 31BC-2020</p>
</form>
</body>
</html>
