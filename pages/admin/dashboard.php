<?php
session_start();
if(!isset($_SESSION['user_session'])){
	header("Location: ../../index.php");
}

include_once("../../app/php/conn.php");


?>


<!DOCTYPE html>
<html>

<head>


<?php
	include "../../includes/admin/head.php"
	?>
</head>

<body>

	<?php
	include "../../includes/admin/navbar.php"
	?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<?php
		include "../../includes/admin/topbar.php"
		?>
		<!-- Header -->
		<!-- Header -->
		<div class="header pb-8">

		</div>
		<!-- Page content -->
		<div class="container-fluid mt--6">
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Docenten</h5>
									<span class="h2 font-weight-bold mb-0"> 
										<?php
										$sql = "SELECT * FROM docenten";
										$query = $conn->query($sql);

										echo "<h3>".$query->num_rows."</h3>";
										?>
							  		</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Studenten</h5>
									<span class="h2 font-weight-bold mb-0"> 
										<?php
										$sql = "SELECT * FROM studenten";
										$query = $conn->query($sql);

										echo "<h3>".$query->num_rows."</h3>";
										?>
							  		</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
										<i class="fa fa-graduation-cap"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Klassen</h5>
									<span class="h2 font-weight-bold mb-0"> 
										<?php
										$sql = "SELECT * FROM klassen";
										$query = $conn->query($sql);

										echo "<h3>".$query->num_rows."</h3>";
										?>
							  		</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
										<i class="fa fa-home"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Richtingen</h5>
									<span class="h2 font-weight-bold mb-0"> 
										<?php
										$sql = "SELECT * FROM richtingen";
										$query = $conn->query($sql);

										echo "<h3>".$query->num_rows."</h3>";
										?>
							  		</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
										<i class="fa fa-arrows-alt"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header border-0">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Log</h3>
								</div>
								<div class="col text-right">
									<a href="./Log-screen.php" class="btn btn-sm btn-primary">Alles bezichtigen</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
										<th scope="col">Student Achternaam</th>
										<th scope="col">Student Voornaam</th>
										<th scope="col">Student email</th>
										<th scope="col">Logdatum</th>
									
									</tr>
								</thead>
								<tbody id="table">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			<!-- Footer -->
			<?php
			include "../../includes/admin/footer.php"
			?>
					
<script src="../../app/php/admin/script/log.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){  
	load_data();

});

</script>
</body>

</html>