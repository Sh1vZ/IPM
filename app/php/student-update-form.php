<?php
include("conn.php");

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
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<input name="Anaam" id="Anaam"class="form-control" placeholder="Input 1" value=<?= $Anaam; ?> type="text" >
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
														<input name="Vnaam" id="Vnaam" class="form-control" placeholder="Input 1" value=<?= $Vnaam; ?> type="text" >
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
														<input name="GebDatum" id="GebDatum" class="form-control" placeholder="Input 1"  value=<?= $GebDatum; ?> type="date" >
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
														<input name="GebPlaats" id="GebPlaats"class="form-control" placeholder="Input 1" value=<?= $GebPlaats; ?>  type="text" >
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
														<input name="Email" id="Email" class="form-control" placeholder="Input 1" value=<?= $Email; ?> type="email" >
													</div>
												</div>
											</div>
										</div>
        <div class="modal-footer">
          <button  type="button" onclick=updateStudent(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteStudent(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
