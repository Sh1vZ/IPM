<?php
include(dirname(__FILE__) . "/../conn.php");

if (isset($_POST['getRichting'])) {
  $id = $_POST['id'];
  $sql = "SELECT * FROM richtingen WHERE richting_ID=$id";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $richting   = $row['Richtingnaam'];
?>
      <form method="post" id="richtingUpdate">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Richting</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control" placeholder="Richting" id="richtingU" name="richting" type="text" value=<?= $richting; ?> required>
              </div>
            </div>
          </div>
         
         
        </div>

        <div class="modal-footer">
          <button  type="button" onclick=updateRichting(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
          <button type="button" onclick=deleteRichting(<?= $id; ?>) class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
        </div>
      </form>

<?php
    }
  }
}
