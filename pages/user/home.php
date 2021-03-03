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
		include "../../includes/admin/topbar.php"
		?>
		<!-- Header -->
		<!-- Header -->
		<div class="header pb-8">

		</div>
		<!-- Page content -->
		<div class="container-fluid mt--6">

			<!-- <div class="row">
				<div class="col-md-12">
					<div class="card">
						<h1 class="text-center">yo</h1>
					<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, beatae.</p>
						<div class="row pt-4 pl-4 pr-4">
						<div class="col-md-4">
								<div class="card">
									<img  style="height: 300px; width:300px; margin:0 auto;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Circle-icons-document.svg/1024px-Circle-icons-document.svg.png" class="card-img-top" alt="..." />
									<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text">
											Some quick example text to build on the card title and make up the bulk of the
											card's content.
										</p>
										<a href="#!" class="btn  btn-primary" style="width: 100%;">Download $14</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<img  style="height: 300px; width:300px; margin:0 auto;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Circle-icons-document.svg/1024px-Circle-icons-document.svg.png" class="card-img-top" alt="..." />
									<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text">
											Some quick example text to build on the card title and make up the bulk of the
											card's content.
										</p>
										<a href="#!" class="btn  btn-primary" style="width: 100%;">Download $14</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<img  style="height: 300px; width:300px; margin:0 auto;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Circle-icons-document.svg/1024px-Circle-icons-document.svg.png" class="card-img-top" alt="..." />
									<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text">
											Some quick example text to build on the card title and make up the bulk of the
											card's content.
										</p>
										<a href="#!" class="btn  btn-primary" style="width: 100%;">Download $14</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-12">
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
							<h6 class="modal-title" id="modal-title-default">Opwardeer aanvraag</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" id="bedragForm">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="">Bedrag</label>
											<div class="input-group input-group-merge">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-wallet"></i></span>
												</div>
												<input class="form-control" placeholder="Bedrag" id="bedrag" name="bedrag" type="number">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" id="butsave" class="btn btn-primary">Toevoegen</button>
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
			<script>
			$(document).ready(function() {
				$('#butsave').on('click', function() {
					$("#butsave").attr("disabled", "disabled");
					var bedrag = $('#bedrag').val();
					if(bedrag!=""){
						$.ajax({
							url: "../../app/php/student/bedrag.php",
							type: "POST",
							data: {
								bedrag: bedrag
							},
							cache: false,
							success: function(dataResult){
								var dataResult = JSON.parse(dataResult);
								if(dataResult.statusCode==200){
									$("#butsave").removeAttr("disabled");
									$('#bedragForm').find('input:text').val('');
									$("#success").show();
									$('#success').html('Data added successfully !');
								}
								else if(dataResult.statusCode==201){
								   alert("Error occured !");
								}

							}
						});
					}
					else{
						alert('Please fill in the field !');
					}
				});
			});
			</script>
</body>

</html>
