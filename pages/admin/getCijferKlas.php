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
									$sql = "SELECT Cijfer,Achternaam,Voornaam,Vaknaam,student_id,VakID,Periode,klas_id FROM `cijfers` AS c INNER JOIN studenten AS s on c.student_id=s.stud_ID INNER JOIN vakken as v on c.VakID=v.vak_ID WHERE Periode='$per' AND VakID=$vak AND klas_id=$klas ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<tr>

												<td><?= $row['Achternaam']; ?> <?= $row['Voornaam']; ?></td>
												<td><?= $row['Vaknaam']; ?></td>
												<td><?= $row['Periode']; ?></td>
												<td><?= $row['Cijfer']; ?></td>
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
					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php"
					?>

</body>

</html>