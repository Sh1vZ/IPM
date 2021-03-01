<!DOCTYPE html>
<html>

<head>
	<?php
	include "../../includes/admin/head.php"
	?>

<!-- <link rel="stylesheet" href="../../../IPM/assets/js/vendor/sweetalert2/dist/sweetalert2.min.css"> -->
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
									<h3 class="mb-0">Studenten</h3>
								</div>
								<div class="col-6 text-right">
									<a href="#" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
										<span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
										<span class="btn-inner--text">Exporteren</span>
									</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
						<table class="table align-items-center table-flush datatabel table-striped">
								<thead class="thead-light">
									<tr>
										<th>Achternaam</th>
										<th>Voornaam</th>
										<th>Geboortedatum</th>
										<th>Geboorteplaats</th>
										<th>Email</th>
										<th>Acties</th>
									</tr>
								</thead>
								<tbody id="table">
									
								</tbody>
								
							</table>
							
						</div>
					</div>
					<button type="button" class="fab" data-toggle="modal" data-target="#modal"><i class="ni ni-fat-add ni-2x"></i></button>
					<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Studenten Registratie</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id='toevoegen' aria-current="page" href="#">Toevoegen</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id='importeren' href="#">Importeren</a>
									</li>
								</ul>
								<div class="modal-body">
									<form  id="StudentenForm" method= "POST" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Achternaam:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<input name="Anaam" id="Anaami"class="form-control" placeholder="Input 1"  type="text" >
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Voornaam:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<input name="Vnaam" id="Vnaami" class="form-control" placeholder="Input 1"  type="text" >
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Geboorte Datum:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
														<input name="GebDatum" id="GebDatumi" class="form-control" placeholder="Input 1"  type="date" >
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Geboorte Plaats:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
														</div>
														<input name="GebPlaats" id="GebPlaatsi"class="form-control" placeholder="Input 1"  type="text" >
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Email:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<input name="Email" id="Emaili" class="form-control" placeholder="Input 1"  type="email" >
													</div>
												</div>
											</div>
										</div>

										<div class="modal-footer">
										<input type="submit" name="form_action" id="form_action" class="btn btn-primary" value="Toevoegen" />
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>

									<!-- edit modal -->


									<!-- importeer modal -->

									<form action="" id="import-form" style="display:none;">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="">File:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<input class="form-control" name='data' placeholder="Input 1" id="#" type="file" accept=".xls,.xlsx">
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
										<div class="import">
											<button type="submit" id="importBtn" class="btn btn-success ">Importeren</button>
										</div>
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
			</div>

			<div class="modal fade " id="modalEditStudent" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Student Bewerken</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div  id="modal-edit-student" class="modal-body">
			
								</div>
							</div>
						</div>
					</div>
					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php"
			
					?>


<script src="../../app/php/admin/script/crudStudent.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){  
	load_data();

});

</script>



</body>

</html>