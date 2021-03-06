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
									<br>
									<h4 class="mb-0">Opwaardeer log</h4>
								</div>
								<div class="col-6 text-right">
									<button  type="button" onclick="login()" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Student Login">
										<span class="btn-inner--icon"><i class="fas fa-forward"></i></span>
										<span class="btn-inner--text">Student login</span>
                                    </button>
								</div>
							</div>
						</div>
						<!-- Light table -->
						<div class="table-responsive">
							<table class="table align-items-center table-flush table-striped">
								<thead class="thead-light">
									<tr>
										<th>Student</th>
										<th>Bedrag</th>
										<th>Datum aangevraagd</th>
										<th>Datum geaccepteerd</th>
									</tr>
								</thead>
								<tbody id="table2">
									
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
function login() {
    location.replace("./Log-screen.php")
  }
</script>

</body>

</html>