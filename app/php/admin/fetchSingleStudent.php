<?php

include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST['getStudent'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM studenten WHERE stud_ID=$id";
	$res = mysqli_query($conn, $sql);
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$Anaam   = $row['Achternaam'];
			$Vnaam   = $row['Voornaam'];
			$GebDatum   = $row['Geboortedatum'];
			$GebPlaats = $row['Geboorteplaats'];
			$Email = $row['Student_email'];
?>
			<form method="post" id="studentenUpdate">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Achternaam:</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input name="Anaam" id="Anaamu" class="form-control" placeholder="Achternaam" value=<?= $Anaam; ?> type="text">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Voornaam:</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input name="Vnaam" id="Vnaamu" class="form-control" placeholder="Voornaam" value=<?= $Vnaam; ?> type="text">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Geboorte Datum:</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input name="GebDatum" id="GebDatumu" class="form-control" placeholder="Geboortedatum" value=<?= $GebDatum; ?> type="date">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Geboorte Plaats:</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input name="GebPlaats" id="GebPlaatsu" class="form-control" placeholder="Geboorteplaats" value=<?= $GebPlaats; ?> type="text">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Email:</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input name="Email" id="Emailu" class="form-control" placeholder="Email" value=<?= $Email; ?> type="email">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick=updateStudent(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
					<button type="button" onclick=deleteStudent(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
				</div>
			</form>

<?php
		}
	}
}
?>