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

	
		include "../../includes/user/topbar.php";
include("../../../IPM/app/php/conn.php");
		?>
		<!-- Header -->
		<!-- Header -->
		<div class="header pb-8">

		</div>
		<!-- Page content -->
		
		<div class="container-fluid mt--6">
			<div class="row">
				<div class="col-md-12">
					<h3 id='valSaldo' class="text-right">
						</h3>
					<div class="card">
						<h1 class="text-center">Welkom op de download pagina, <?= $_SESSION['Achternaam'] ?></h1>
						<p class="text-center">Download of open Uw brief.</p>

					</div>
				</div>
			</div>
		</div>

				

										
		<div class="col-md-12 text-center">
									
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" id="downlBtn" class="btn btn-primary btn-lg " target="_blank" > Openen</a>
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" target="_blank" class="btn btn-primary btn-lg" download> Downloaden</a>
											
											<a href="home.php"  class="btn btn-danger  ml-auto" >Terug</a>
										
			</div>

		

			<!-- einde dispensatie modal -->











</body>

</html>