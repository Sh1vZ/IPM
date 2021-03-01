<?php
include(dirname(__FILE__) . "/../conn.php");
$docentq="select * from docenten ";
	$rs = mysqli_query($conn,$docentq);
	$richtingq="select * from richtingen";
	$res = mysqli_query($conn,$richtingq);
if (isset($_POST['getVak'])) {
  $id = $_POST['id'];
  $sql = "select vak_ID, Vaknaam, Richtingnaam as Vak_richting, docent_naam as Vak_docent
   from vakken, docenten , richtingen 
   where vakken.Vak_docent=docenten.docent_ID and vakken.Vak_richting=richtingen.richting_ID and vakken.vak_ID=$id";
  $result = mysqli_query($conn, $sql) or die("Error");
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $vak = $row['Vaknaam'];
		$richting = $row['Vak_richting'];
		$docent = $row['Vak_docent'];
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
                <input class="form-control" placeholder="Vak" id="vakU" name="vak" type="text" value=<?= $vak; ?> required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Richting</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input list="richtinglist"class="form-control" placeholder="Richting" id="richtingU" name="richting" type="number" value=<?= $richting; ?> required>
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
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Vakdocent</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input list="docentlist" class="form-control" placeholder="Vakdocent" id="docentU" name="docent" type="number" value=<?= $docent; ?> required>
                <datalist id="docentlist">
													<?php
											
													if (mysqli_num_rows($rs) > 0) {
														while ($row = mysqli_fetch_assoc($rs)) {
															echo "<option value=" . $row['docent_ID'] . ">" . $row['docent_naam'] . "</option>";
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
