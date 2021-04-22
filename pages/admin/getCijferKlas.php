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
									<h3 class="mb-0">Cijfers</h3>
								</div>
								<div class="col-6 text-right">
								</div>
							</div>
						</div>
						<!-- Light table -->
						<div class="table-responsive">
							<table class="table align-items-center table-flush table-striped">
								<thead class="thead-light">
									<tr>
										<th>Naam</th>
										<th>Vak</th>
										<th>Periode</th>
										<th>Cijfer</th>
									</tr>
								</thead>
								<tbody id='data'>
									<?php

									include "../../app/php/conn.php";
									$per=$_GET['per'];
									$vak=$_GET['vak'];
									$klas=$_GET['klas'];
									$sql = "SELECT Achternaam,Voornaam,Vaknaam,student_id,VakID,Periode,klas_id FROM `cijfers` AS c INNER JOIN studenten AS s on c.student_id=s.stud_ID INNER JOIN vakken as v on c.VakID=v.vak_ID WHERE Periode='$per' AND VakID=$vak AND klas_id=$klas ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<tr>

												<td><?= $row['Achternaam']; ?> <?= $row['Voornaam']; ?></td>
												<td><?= $row['Vaknaam']; ?></td>
												<td><?= $row['Periode']; ?></td>
												<td><?= $row['Periode']; ?></td>
											</tr>
									<?php
										}
									} else {
										echo "0 results";
									}

									?>
								</tbody>
							</table>
						</div>
					</div>
					<button type="button" class="fab" data-toggle="modal" data-target="#modal"><i class="ni ni-fat-add ni-2x"></i></button>
					<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Cijfers Importeren</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- importeer modal -->
									<form action="" id="cijfer-import-form">
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
					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php"
					?>

</body>

</html>