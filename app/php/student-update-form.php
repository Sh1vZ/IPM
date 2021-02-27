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
														<input name="Anaam" id="Anaamu" class="form-control" placeholder="Achternaam" value=<?= $Anaam; ?> type="text" >
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
														<input name="Vnaam" id="Vnaamu" class="form-control" placeholder="Voornaam" value=<?= $Vnaam; ?> type="text" >
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
														<input name="GebDatum" id="GebDatumu" class="form-control" placeholder="Geboortedatum"  value=<?= $GebDatum; ?> type="date" >
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
														<input name="GebPlaats" id="GebPlaatsu" class="form-control" placeholder="Geboorteplaats" value=<?= $GebPlaats; ?>  type="text" >
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
														<input name="Email" id="Emailu" class="form-control" placeholder="Email" value=<?= $Email; ?> type="email" >
													</div>
												</div>
											</div>
										</div>
        <div class="modal-footer">
          <button  type="button" onclick=updateStudent(<?= $id; ?>);window.location.reload()  data-dismiss="modal" class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteStudent(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
?>

<!-- <script src="../../app/js/ajax-script.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){  
	load_data();

}); -->

