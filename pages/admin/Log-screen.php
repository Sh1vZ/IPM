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
				<div class=" col-md-12">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="row">
								<div class="col-6">
									<h3 class="mb-0">Studenten log</h3>
								</div>
								<div class="col-6 text-right">
									<a href="#" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
										<span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
										<span class="btn-inner--text">Export</span>
									</a>
								</div>
							</div>
						</div>
						<!-- Light table -->
						<div class="table-responsive">
							<table class="table align-items-center table-flush table-striped">
								<thead class="thead-light">
									<tr>
										<th>Student voornaam</th>
										<th>Student achternaam</th>
										<th>email adress</th>
										<th>Inlogdatum</th>
									</tr>
								</thead>
								<tbody id="table1">
									
								</tbody>
							</table>
						</div>
					</div>
					
				
					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php"
					?>
                    <script src="../../app/php/admin/script/log.js"></script>
                    
<script>
$(document).ready(function(){  
	load_data();

});

</script>

</body>

</html>