<?php
include(dirname(__FILE__) . "/../conn.php");
$docentq = "select * from docenten ";
$rs = mysqli_query($conn, $docentq);
$richtingq = "select * from richtingen";
$res = mysqli_query($conn, $richtingq);
if (isset($_POST['getKlas'])) {
  $id = $_POST['id'];
  $sql = "select ID, Klas, Richtingnaam as RichtingID, docent_naam as Klas_docent 
  from docenten, klassen , richtingen 
  where klassen.Klas_docent=docenten.docent_ID and klassen.RichtingID=richtingen.richting_ID and klassen.ID=$id";
  $result = mysqli_query($conn, $sql) or die("Error");
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $klas = $row['Klas'];
      $richting = $row['RichtingID'];
      $docent = $row['Klas_docent'];
?>
      <form method="post" id="klasUpdate">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Klas:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input class="form-control" placeholder="Klas" id="klasU" name="klas" type="text" value=<?= $klas; ?> required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Richting:</label>
              <div class="input-group">
                <div class="input-group-prepend">
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
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Klassedocent:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input list="docentlist" class="form-control" placeholder="klassedocent" id="docentU" name="docent" type="number" value=<?= $docent; ?> required>
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
          <button type="button" onclick=updateKlas(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteKlas(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
