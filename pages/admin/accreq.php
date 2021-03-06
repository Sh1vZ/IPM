<?php
session_start();
include_once("../../app/php/conn.php");
 ?>

<!DOCTYPE html>
<html>

<head>
	<?php
	include "../../includes/admin/head.php"
	?>
</head>

<body>
	<?php
	include "../../includes/admin/navbar.php"
	?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<?php
		include "../../includes/admin/topbar.php"
		?>
		<!-- Header -->
		<!-- Header -->
		<div class="header pb-8">

		</div>
		<!-- Page content -->
		<div class="container-fluid mt--6">
			<div class="row">
				<div class=" col-md-12">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="row">
								<div class="col-6">
									<h3 class="mb-0">Top-up</h3>
							</div>
							</div>
						</div>
            <table class="table align-items-center table-flush table-striped">
              <thead class="thead-light">
                <tr>
                <th>Student Naam</th>
                <th>Bedrag</th>
                <th>Datum Geaccepteerd</th>
                </tr>
              </thead>


                <tbody id="data"></tbody>
            </table>


            <script>
                var ajax = new XMLHttpRequest();
                ajax.open("GET", "../../app/php/admin/accdata.php", true);
                ajax.send();

                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        console.log(data);

                        var html = "";
                        for(var a = 0; a < data.length; a++) {
                            var Achternaam = data[a].Achternaam;
                            var Voornaam = data[a].Voornaam;
                            var Bedrag = data[a].Bedrag;
                            var AccDatum = data[a].AccDatum;

                            html += "<tr><td>" + Achternaam +  " " + Voornaam + "</td><td>" + "SRD " + Bedrag + "</td><td>" + AccDatum + "</td></tr>";

                        }

                        document.getElementById("data").innerHTML += html;

                    }

                };

            </script>

						</div>
					</div>

					<!-- Footer -->
					<?php
					include "../../includes/admin/footer.php";
          include "../../app/php/admin/accbedrag.php";

					?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>

</body>

</html>
