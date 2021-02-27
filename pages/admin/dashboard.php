<?php
session_start();
if(!isset($_SESSION['user_session'])){
	header("Location: ../../index.php");
}

include_once("../../app/php/conn.php");


$sql = "SELECT admin_ID, admin_naam, admin_password FROM admin  WHERE admin_ID='".$_SESSION['user_session']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);

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
									<h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
									<span class="h2 font-weight-bold mb-0">350,897</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
										<i class="ni ni-active-40"></i>
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
									<h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
									<span class="h2 font-weight-bold mb-0">2,356</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
										<i class="ni ni-chart-pie-35"></i>
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
									<h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
									<span class="h2 font-weight-bold mb-0">924</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
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
									<h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
									<span class="h2 font-weight-bold mb-0">49,65%</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
										<i class="ni ni-chart-bar-32"></i>
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
									<a href="#!" class="btn btn-sm btn-primary">See all</a>
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
			<div class="card-deck flex-column flex-xl-row">
				<div class="card">
					<div class="card-header bg-transparent">
						<h6 class="text-muted text-uppercase ls-1 mb-1">DATA</h6>
						<h2 class="h3 mb-0">DATA</h2>
					</div>
					<div class="card-body">
						<div class="chart">

						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header bg-transparent">
						<div class="row align-items-center">
							<div class="col">
								<h6 class="text-uppercase text-muted ls-1 mb-1">DATA</h6>
								<h2 class="h3 mb-0">DATA</h2>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">

						</div>
					</div>
				</div>
				<div class="card">
					<!-- Card header -->
					<div class="card-header">
						<div class="row align-items-center">
							<div class="col-8">
								<!-- Surtitle -->
								<h6 class="surtitle">DATA</h6>
								<!-- Title -->
								<h5 class="h3 mb-0">DATA</h5>
							</div>
							<div class="col-4 text-right">
								<a href="#!" class="btn btn-sm btn-neutral">Action</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">

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