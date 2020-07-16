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
    <title>Providence Assets</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
<link href="components/assets/dist/css/bootstrap.css" rel="stylesheet">
<script src="components/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="components/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="components/dist/sweetalert2.min.css">

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
      .red{
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
      <li class="nav-item active">
        <a class="nav-link" href="main-page.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="news_list.php">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="map.php">Assets</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="operatives_list.php">Operatives</a>
      </li>
      <?php if ($_SESSION['role']!='Superadmin'){ echo '<li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>'; } else { echo '<li class="nav-item red">
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

<img src="components/maps.jpg" style="width:100%;height:80%;" alt="">

</main>
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