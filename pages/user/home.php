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
						<h1 class="text-center">Welkom, <?= $_SESSION['Achternaam'] ?></h1>
						<p class="text-center">Dit is een overzicht van de documenten die je kunt downloaden.</p>

						<?php 
// 		$sql = "SELECT * FROM template order by temp_ID desc";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {


//   while ($row = $result->fetch_assoc()) {
  
?>

						<div class="container-fluid cus mt-5 mb-5">
							<div class="row">
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">Dispensatie brief</h5>
												<p class="text-justify para mb-0">Deze brief is een aanvraag voor dispensatie. Klik op download om te downloaden</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">SRD 5,00</h4>
											<div class="mt-4 text-center">
											<form  method="post" action="../../app/php/student/generatePDF.php ">
											<button type="submit" name="insert" id="DespenBtn" class="btn btn-primary" >Genereren</button>
											</form>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 p-4">
									<div class="row p-2 bg-white border rounded">
										<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"></div>
										<div class="col-md-6 mt-1">
											<h3 class="text-center pb-2">Laatbrief</h5>
												<p class="text-justify para mb-0">Vul jou laatbrief in en download het.</p>
										</div>
										<div class="align-items-center align-content-center col-md-3 border-left mt-1">
											<h4 class="text-center mt-6">SRD 5,00</h4>
											<div class="mt-4 text-center">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLaatBrief">Invullen</button>
											</div>
										</div>
									</div>
								</div>

								<?php
							//  }} 
							 ?>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- begin invul modal -->

			<div class="modal fade" id="modalBrief" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Dispensatiebrief invullen</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id='documenten' aria-current="page" href="#">Dispensatiebrief</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" id='laatbrieven' href="#">Laatbrieven</a>
									</li> -->
								</ul>
								<!-- action="../../app/php/admin/upload.php" -->
								<div class="modal-body">
									<form method="POST"  action="../../app/php/student/generatePDF.php" enctype="multipart/form-data">
									
										<!-- accept=".doc,.docx" -->
										<div class="modal-footer">
										<input type="submit" name="form_action" class="btn btn-primary" value="PDF Genereren" id="submitbutton" onclick="return changeText('submitbutton');" />
											
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>
								</div>
							</div>
						</div>
			</div>
		</div>

		<div class="modal fade" id="modalDownlDispen" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Dispensatie brief downloaden</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									
									
										<!-- accept=".doc,.docx" -->
										<div class="modal-footer">
										
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" id="pathOpen" target="_blank" class="btn btn-primary"> Openen</a>
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" target="_blank" class="btn btn-primary" download> Downloaden</a>
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									
								</div>
							</div>
						</div>
			</div>
		</div>

		<div class="modal fade" id="modalDownlLaatB" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Laatbrief downloaden</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
		
								<div class="modal-body">
									
									
										<!-- accept=".doc,.docx" -->
										<div class="modal-footer">
										
											
									
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" id="downlBtn" class="btn btn-primary" target="_blank" > Openen</a>
											<a href= "../../../IPM/classes/completed/<?php echo $_GET['link']; ?>" target="_blank" class="btn btn-primary" download> Downloaden</a>
											
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>

								</div>
							</div>
						</div>
			</div>
		</div>
			

		

			<!-- einde dispensatie modal -->

			<div class="modal fade" id="modalLaatBrief" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Laatbrief invullen</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								
								<div class="modal-body">
									<form method="POST" action="../../app/php/student/generateLaatbrief.php" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Datum</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" id="datum" name="datum" placeholder="Datum" type="Date">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Aanmeldtijd</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" id="tijd" name="tijd" placeholder="Aanmeldtijd"  type="time">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Lesuur</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" id="lesuur" name="lesuur" placeholder="Lesuur"  type="number">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Docent Lesuur</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" id="docent" name="docent" placeholder="Docent Lesuur"  type="text">
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="">Reden</label>
													<div class="input-group input-group-lg">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control input-lg" id="reden" name="reden" placeholder="Reden"  type="text">
													</div>
												</div>
											</div>
										<!-- accept=".doc,.docx" -->
										<div class="modal-footer">
										<input type="submit" name="insertLaatbrief" id="form_action" class="btn btn-primary" value="PDF Genereren" />
										
											
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>
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
													<input class="form-control" placeholder="Bedrag" id="bedrag" type="number" min="1.0" max="50.0">
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
						$("#bedragForm").submit(function(e) {
							e.preventDefault();
							var bedrag = $('#bedrag').val();
							$.ajax({
								url: "../../app/php/student/bedrag.php",
								method: "post",
								data: {
									bedrag: bedrag
								},
								dataType: "text",
								success: function(strMessage) {
									$("#message").text(strMessage);
									$("#bedragForm")[0].reset();
								}
							});
						});

						Getsaldo();
					});
				</script>





<script>
$(document).ready(function(){  
	load_data();

});

</script>

<script src="../../app/js/animation2.js"></script>





</body>

</html>