<?php
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
				<div class=" col-md-12">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="row">
								<div class="col-6">
									<h3 class="mb-0">Klassen-Formatie</h3>
								</div>
							</div>
						</div>
						<!-- Light table -->
						<div class="table-responsive">
							<table class="table align-items-center table-flush table-striped">
								<thead class="thead-light">
									<tr>
										<th>Student achternaam</th>
										<th>Student voornaam</th>
										<th>email adress</th>
										<th>Klasnaam</th>
										<th>Richtingnaam</th>
										<th>Klasdocent</th>
										<th>Schooljaar</th>
										<th>Actie</th>
									</tr>
								</thead>
								<tbody id="table">

								</tbody>
							</table>
						</div>					
					</div>
					<button type="button" class="fab" data-toggle="modal" data-target="#modal"><i class="ni ni-fat-add ni-2x"></i></button>

					<div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Docent Registratie</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div  id="modal-body" class="modal-body">
								<form method="post" id="KlassefForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Naam:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<select class="form-control" name="Naam" id="Naam" required> 
															<option>Selecteer Een Student</option>
															<?php
															$query = "SELECT * FROM studenten";
															$result = mysqli_query($conn, $query);
															while ($row = mysqli_fetch_assoc($result)) {
																echo "<option value='" . $row['stud_ID'] . "'>" . $row['Achternaam'] . " " . $row['Voornaam'] . "</option>";
															}
															?>
														</select>													
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Klas:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<select class="form-control" name="Klas" id="Klas">
															<option>Selecteer Een Klas</option>
															<?php
															$query = "SELECT * FROM klassen";
															$result = mysqli_query($conn, $query);
															while ($row = mysqli_fetch_assoc($result)) {
																echo "<option value='" . $row['ID'] . "'>" . $row['Klas'] . "</option>";
															}
															?>
														</select>
													</div>
												</div>
											</div>
										<div class="modal-footer">
										<input type="submit" name="form_action" id="form_action" class="btn btn-primary" value="Toevoegen" />
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php"
					?>
					<script src="../../app/php/admin/script/crudKlasform.js"></script>
					<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
					<script>
						$(document).ready(function() {
							load_data();

						});
					</script>


</body>

</html>