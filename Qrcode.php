<?php
session_start();
include "app\php\conn.php"

 ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login with Qrcode</title>
	<style>
		.sidebar{ width: 350px; margin:auto; padding: 10px }
		.camera{ width: 610px; margin:auto; }
	</style>
	<script src="app\js\jquery-3.4.1.min.js"></script>
<!-- scanner -->
<script src="scanner/vendor/modernizr/modernizr.js"></script>
<script src="scanner/vendor/vue/vue.min.js"></script>
</head>
<body>

	  <!-- scan -->
  <div id="app" class="row box">
    <div class="col-md-4 col-md-offset-4 sidebar">
      <ul>
        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
        <li v-for="camera in cameras">
          <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
          <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
            <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
          </span>
        </li>
      </ul>
      <div class="clearfix"></div>
      <!-- form scan -->
      <form action="" method="POST" id="myForm">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> Form Scan </legend>
            <input type="text" name="qrcode" id="code" autofocus>
          </fieldset>
        </form>
				<?php
				if (!empty($_POST['qrcode'])) {
					// |Achternaam|pincode|


					$qrcode = $_POST['qrcode'];
					$arr = explode('|', $qrcode);

					$username = $arr[1];
					$pincode = $arr[2];

					$sql = "SELECT * FROM studenten WHERE Achternaam = '$username' AND Student_pincode = '$pincode' AND IsActive = 1";

					$resultSQL = mysqli_query($conn, $sql);

					$result = mysqli_fetch_array($resultSQL);

					if (mysqli_num_rows($resultSQL) > 0 ) {
						$_SESSION['Achternaam'] = $result['Achternaam'];
						$_SESSION['IsActive'] = TRUE;

						header("location:pages\user\home.php");

					} else {
						echo "<script>alert('Ye boel, niet de juiste QR Code')</script>";
					}

				}


				 ?>


    </div>
    <div class="col-xs-12 preview-container camera">
        <video id="preview" class="thumbnail"></video>
    </div>
   </div>
   <!-- scanner -->
<script src="scanner/js/app.js"></script>
<script src="scanner/vendor/instascan/instascan.min.js"></script>
<script src="scanner/js/scanner.js"></script>
 </body>
 </html>
