<?php
session_start();
include('config.php');

if($_SESSION['status']!="login")
{
  header("location:index.php?info=not_yet");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <link rel="shortcut icon" type="image/x-icon" href="components/logo.ico" />
    <title>Providence Main Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
    <script src="components/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="components/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="components/dist/sweetalert2.min.css">

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

      .dropdown-toggle
      {
        color:#ffffff;
      }

      .red {
        color: #E01D0B !important;
      }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="components/jumbotron.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Providence</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="news_list.php">News</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="map.php">Assets</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="operatives_list.php">Operatives</a>
      </li>
      <?php if ($_SESSION['role']!='Superadmin'){ echo '<li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>'; } else { echo '<li class="nav-item">
        <a class="nav-link red" href="#" onclick="oof()">Purge</a>
      </li>'; } ?>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
           <a class="dropdown-item" href="#"><?php echo $_SESSION['role']; ?></a>
           <a class="dropdown-item" href="edit_form.php?ID=<?php echo $_SESSION['id']; ?>">Edit account</a>
            <a class="dropdown-item red" href="logout.php">Logout</a>
         </div>
       </li>
     </ul>
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">The Providence Limited Repository</h1>
      <p>The Providence Limited Repository provides a portion of Providence members to view news about Providence, check on fellow Providence operatives, and several assets pertaining to Providence. The limited repository allows fellow Providence Representatives to help guide operatives to further each of our goals on conquering the sectors of various nations. Welcome fellow elites, to the secret cabal that rules the world through the shadows.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>News</h2>
        <p>Representatives will frequently update on news that pertain to Providence's interests and its assets as to help you in helping yourselves further our goals on controlling the various sectors of humanity. </p>
        <p><a class="btn btn-secondary" href="news_list.php" role="button">News list &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Operatives</h2>
        <p>This leads to the limited list of operatives and members operating within Providence. Remember that the list is not complete as Providence has divided repositories across the web to avoid capture. Please be careful with this information. </p>
        <p><a class="btn btn-secondary" href="operatives_list.php" role="button">See list &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Assets</h2>
        <p>This will show you a limited map filled with Providence assets that you could use with authorization from representatives to help further Providence's cause of global economic and political conquest. Please be careful with this information.</p>
        <p><a class="btn btn-secondary" href="map.php" role="button">View assets &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Providence 31BC-2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="components/assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
function oof(){
  Swal.fire({
  title: 'Are you sure?',
  text: "You will be purging ALL accounts in this limited repository.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, I am sure'
}).then((result) => {
  if (result.value) {
    Swal.fire({
  title: 'This is irreversible',
  text: "This act is irreversible. Only do this in extreme situations!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Purge all'
}).then((result) => {
  if (result.value) {
    window.location = "deleteall.php";
  }
})
  }
})
}
</script>
    </body>
</html>
