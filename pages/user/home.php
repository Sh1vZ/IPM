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
		<div class="header pb-8">

		</div>
		<!-- Page content -->
		<div class="container-fluid mt--6">
			<div class="row">
				<div class="col-md-12">
					<h3 id='valSaldo' class="text-right">
						</h3>
					<div class="card">
						<h1 class="text-center">yo, <?= $_SESSION['Achternaam'] ?></h1>
						<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, beatae.</p>
						<div class="container-fluid cus mt-5 mb-5">
							<div class="row">
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">DOC NAAM</h5>
												<p class="text-justify para mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quo?</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">$13.99</h4>
											<div class="mt-4 text-center">
												<button class=" btn btn-primary " style="width: auto;" type="button">Download</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">DOC NAAM</h5>
												<p class="text-justify para mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quo?</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">$13.99</h4>
											<div class="mt-4 text-center">
												<button class=" btn btn-primary " style="width: auto;" type="button">Download</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">DOC NAAM</h5>
												<p class="text-justify para mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quo?</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">$13.99</h4>
											<div class="mt-4 text-center">
												<button class=" btn btn-primary " style="width: auto;" type="button">Download</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">DOC NAAM</h5>
												<p class="text-justify para mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quo?</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">$13.99</h4>
											<div class="mt-4 text-center">
												<button class=" btn btn-primary " style="width: auto;" type="button">Download</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<button type="button" class="fab" data-toggle="modal" data-target="#modal"><i class="ni ni-fat-add ni-2x"></i></button>

			<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
				<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="modal-title-default">Opwaardeer aanvraag</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div style="margin: auto;width: 60%;">
								<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								</div>
								<p id="message"></p>
								<form action="" id="bedragForm">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="">Bedrag</label>
												<div class="input-group input-group-merge">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-wallet"></i></span>
													</div>
													<input class="form-control" placeholder="Bedrag" id="bedrag" type="number" step='0.01'  max="50.00">
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Toevoegen</button>
										<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


				<!-- Footer -->
				<?php
				include "../../includes/admin/footer.php"

				?>
				 <script src="../../app/js/studenten.js"></script>
				<script>
					$(document).ready(function() {
						Getsaldo();
						const refInterval = window.setInterval('Getsaldo()', 5000);
					});
				</script>
</body>

</html>