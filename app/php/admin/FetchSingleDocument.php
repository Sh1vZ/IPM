<?php
include(dirname(__FILE__) . "/../conn.php");

if (isset($_POST['getDocument'])) {
  $id = $_POST['id'];
  $sql = "SELECT * FROM template WHERE temp_ID=$id";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $naam   = $row['naam'];
      $path   = $row['Path'];
    
?>
      <form method="post" id="documentenUpdate" enctype="multipart/form-data">
      <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Document naam</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" id="naamU" placeholder="Naam"  type="text" value=<?= $naam; ?> required>
													</div>
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label for="">File:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<input class="form-control" id="pathU" placeholder="File"  type="file" value=<?= $path; ?> required>
													</div>
												</div>
											</div>
										</div>


        <div class="modal-footer">
          <button  type="button" onclick=updateDocument(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteDocument(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
