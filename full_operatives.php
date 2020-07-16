<?php
session_start();
include('config.php');

if($_SESSION['status']!="login")
{
  header("location:index.php?info=not_yet");
}

if($_SESSION['role']=="User")
{
  header("location:operatives_list.php");
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
    <title>Providence Operatives</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
    <script src="components/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="components/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="components/dist/sweetalert2.min.css">
	<style>
      .red {
        color: #E01D0B !important;
      }
    </style>

    <!-- Bootstrap core CSS -->
<link href="components/assets/dist/css/bootstrap.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="components/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="components/css/util.css">
	<link rel="stylesheet" type="text/css" href="components/ops.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<!--===============================================================================================-->

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
      <li class="nav-item active">
        <a class="nav-link" href="map.php">Assets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Operatives</a>
      </li>
      <?php if ($_SESSION['role']!='Superadmin'){ echo '<li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>'; } else { echo '<li class="nav-item red">
        <a class="nav-link red" href="#" onclick="oofa()">Purge</a>
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
<div class="clearfix">
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<form method="post" action="full_operatives.php">
					<div class="wrapper">
 						<div class="search_box">
    						  <input type="text" name="search" placeholder="Search">
    						  <button type="submit" value="Submit">
     						  <i class="fas fa-search"></i></button>
  						</div>
					</div>	
				</form>
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">Name</th>
								<th class="column3">Email</th>
								<th class="column4">Birthdate</th>
								<th class="column5">Gender</th>
								<th class="column6">Role</th>
								<th class="column7">Action</th>
							</tr>
						</thead>
						<tbody>
								<?php
									$searched = '';
									if (isset($_POST['search']))
									{
										$searched = $_POST['search'];
									}
									$sql = "SELECT * FROM `daftar user` WHERE `ID` LIKE '%".$searched."%' OR `Name` LIKE '%".$searched."%' OR `Email` LIKE '%".$searched."%' OR `Birthdate` LIKE '%".$searched."%' OR `Gender` LIKE '%".$searched."%' OR `Role` LIKE '%".$searched."%' ORDER BY ID ASC";
									$query = mysqli_query($db_connection, $sql);

									while ($operatives = mysqli_fetch_array($query))
									{
										echo "<tr>";

										echo '<td style="text-align: center;">'.$operatives['ID']."</td>";
										echo '<td style="text-align: center;">'.$operatives['Name']."</td>";
										echo '<td style="text-align: center;">'.$operatives['Email']."</td>";
										echo '<td style="text-align: center;">'.$operatives['Birthdate']."</td>";
										echo '<td style="text-align: center;">'.$operatives['Gender']."</td>";
										echo '<td style="text-align: center;">'.$operatives['Role']."</td>";
										if (($operatives['Role']=='Superadmin' || $operatives['Role']=='Admin') && ($_SESSION['email']!=$operatives['Email'] && $_SESSION['role']!='Superadmin'))
										{
											echo '<td style="text-align: center;"> <div class="btn-group dropup">
											  <button class="btn btn-info dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    Action
											  </button>
											  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											    <a class="dropdown-item" href="#">Edit</a>
											    <a class="dropdown-item" href="#">Remove</a>
											  </div>
											</div> </td>';
										}

										else {
										echo '<td style="text-align: center;"> <div class="btn-group dropup">
											  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    Action
											  </button>
											  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
											    <a class="dropdown-item" href="edit_form.php?ID='.$operatives['ID'].'">Edit</a>
											    <a class="dropdown-item red" onclick="oof(\''.$operatives['ID'].'\')" href="#">Purge</a>
											     
											  </div>
											</div> </td>';
										}

										echo "</tr>";
									}


								?>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="components/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="components/assets/dist/js/bootstrap.bundle.js"></script>
<!--===============================================================================================-->	
	<script src="components/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="components/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="components/js/main.js"></script>

<script type="text/javascript">
function oof(x){
	var my = x;
	Swal.fire({
  title: 'Are you sure?',
  text: "You will be deleting this person's account.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, purge account'
}).then((result) => {
  if (result.value) {
    window.location = "deleting.php?ID="+my;
  }
})
}
</script>
<script type="text/javascript">
function oofa(){
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

