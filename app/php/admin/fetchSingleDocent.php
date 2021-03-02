<?php
include(dirname(__FILE__) . "/../conn.php");

if (isset($_POST['getDocent'])) {
  $id = $_POST['id'];
  $sql = "SELECT * FROM docenten WHERE docent_ID=$id";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $naam   = $row['docent_naam'];
      $mail   = $row['docent_email'];
      $nummer   = $row['nummer'];
?>
      <form method="post" id="docentenUpdate">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Naam</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control" placeholder="Naam" id="naamU" name="naam" type="text" value=<?= $naam; ?>>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Email adress</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control" placeholder="Email" id="emailU" name="email" type="email" value=<?= $mail; ?> >
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Telefoon nummer</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control" placeholder="Telefoonnummer" id="nummerU" name="nummer" type="number" value=<?= $nummer; ?> required>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button  type="button" onclick=updateDocent(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteDocent(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
