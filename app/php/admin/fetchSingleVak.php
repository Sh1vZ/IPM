<?php
include(dirname(__FILE__) . "/../conn.php");
 $docentq="select * from docenten ";
	$rs = mysqli_query($conn,$docentq);
	$richtingq="select * from richtingen";
	$res = mysqli_query($conn,$richtingq);
	

if (isset($_POST['getVak'])) {
  $id = $_POST['id'];
  $sql = "select vak_ID, Vaknaam, docent_naam as Vak_docent, Richtingnaam as Vak_richting
  from docenten, richtingen, vakken 
  where docenten.docent_ID=vakken.Vak_docent and richtingen.richting_ID=vakken.Vak_richting and vak_ID=$id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $vak   = $row['Vaknaam'];
      $docent   = $row['Vak_docent'];
      $richting   = $row['Vak_richting'];
?>
      <form method="post" id="vakUpdate">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Vak</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control" placeholder="Naam" id="vakU" name="vak" type="text" value=<?= $vak; ?> required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Docent</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input list="docentlist" class="form-control" placeholder="Docent" id="docentU" name="docent" type="number" value=<?= $docent; ?> required>
                <datalist id="docentlist">
													<?php
											
													if (mysqli_num_rows($rs) > 0) {
														while ($row = mysqli_fetch_assoc($rs)) {

															echo "<option value=" . $row['docent_ID'] . ">" . $row['docent_naam'] . "</option>";
														}
													}
								
													?>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Richting</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input list="richtinglist" class="form-control" placeholder="Richting" id="richtingU" name="richting" type="number" value=<?= $richting; ?> required>
                <datalist id="richtinglist">
													<?php
											
													if (mysqli_num_rows($res) > 0) {
														while ($row = mysqli_fetch_assoc($res)) {
															echo "<option value=" . $row['richting_ID'] . ">" . $row['Richtingnaam'] . "</option>";
														}
													}
								
													?>
													</datalist>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button  type="button" onclick=updateVak(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteVak(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
