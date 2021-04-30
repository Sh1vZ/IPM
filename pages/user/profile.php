<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php
  include "../../includes/admin/head.php"
  ?>
</head>

<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <?php
    include "../../includes/user/topbar.php"
    ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-2 d-flex align-items-center" style="min-height: 500px;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hallo <?= $_SESSION['Voornaam'].' '.$_SESSION['Achternaam'] ?></h1>
            <p class="text-white mt-0 mb-5">Dit is jouw profiel pagina. Hier kan je jouw informatie zien en jouw studentenkaart bekijken en downloaden</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <div class="row">
        <?php
        include '../../app/php/conn.php';
        $id = $_SESSION['stud_ID'];
        $sql = "SELECT * FROM studenten WHERE stud_ID=$id";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $anaam = $row['Achternaam'];
            $vnaam = $row['Voornaam'];
            $geb = $row['Geboortedatum'];
            $gebp = $row['Geboorteplaats'];
            $mail = $row['Student_email'];
            $pin = $row['Student_pincode'];
            $saldo = $row['Saldo'];
            $img = $row['img'];
        ?>
            <div class="col-xl-6 order-xl-2">
              <div class="card card-profile">
                <!-- <img src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top"> -->
                <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">

                  </div>
                </div>
                <div class="card-body pt-10">
                  <div class="row">
                  <div class="text-center col-md-12">
                    <img src="../../app/uploads/studentenkaarten/<?= $img ?>.png" alt="">
                    <hr>
                    <a href="../../app/uploads/studentenkaarten/<?= $img ?>.png" download="<?= $img ?>"><button class="btn btn-primary">Download</button></a>
                  </div>
                  </div>
                  
                </div>
              </div>
              <!-- Progress track -->

            </div>
            <div class="col-xl-6 order-xl-1">
              <div class="row">
              </div>
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Profile</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">

                  <form>
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Achternaam</label>
                            <input type="text" id="input-username" class="form-control" placeholder="Username" value="<?= $anaam ?>" disabled>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Voornaam</label>
                            <input type="email" id="input-email" class="form-control" value="<?= $vnaam ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Geboortedatum</label>
                            <input type="text" id="input-first-name" class="form-control" value="<?= $geb ?>" disabled>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Email adres</label>
                            <input type="text" id="input-last-name" class="form-control" value="<?= $mail ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Pincode</label>
                            <input type="text" id="input-first-name" class="form-control" value="<?= $pin ?>" disabled>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Saldo</label>
                            <input type="text" id="input-last-name" class="form-control" value="<?= $saldo ?>" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
              <?php
            }
          }
              ?>
                </div>
              </div>
            </div>
      </div>
  <!-- Page content -->

  <!-- Footer -->
  <?php
  include "../../includes/admin/footer.php"
  ?>
</body>

</html>