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
									<h3 class="mb-0">Striped table</h3>
								</div>
								<div class="col-6 text-right">
									<a href="#" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
										<span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
										<span class="btn-inner--text">Export</span>
									</a>
								</div>
							</div>
						</div>
						<!-- Light table -->
						<div class="table-responsive">
							<table class="table align-items-center table-flush table-striped">
								<thead class="thead-light">
									<tr>
										<th>Author</th>
										<th>Created at</th>
										<th>Product</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="table-user">
											<b>John Michael</b>
										</td>
										<td>
											<span class="text-muted">10/09/2018</span>
										</td>
										<td>
											<a href="#!" class="font-weight-bold">DATA</a>
										</td>
										<td class="table-actions">
											<a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
												<i class="fas fa-user-edit"></i>
											</a>
											<a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td class="table-user">
											<b>Alex Smith</b>
										</td>
										<td>
											<span class="text-muted">08/09/2018</span>
										</td>
										<td>
											<a href="#!" class="font-weight-bold">DATA</a>
										</td>
										<td class="table-actions">
											<a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
												<i class="fas fa-user-edit"></i>
											</a>
											<a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td class="table-user">
											<b>Samantha Ivy</b>
										</td>
										<td>
											<span class="text-muted">30/08/2018</span>
										</td>
										<td>
											<a href="#!" class="font-weight-bold">DATA</a>
										</td>
										<td class="table-actions">
											<a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
												<i class="fas fa-user-edit"></i>
											</a>
											<a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td class="table-user">
											<b>John Michael</b>
										</td>
										<td>
											<span class="text-muted">10/09/2018</span>
										</td>
										<td>
											<a href="#!" class="font-weight-bold">DATA</a>
										</td>
										<td class="table-actions">
											<a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
												<i class="fas fa-user-edit"></i>
											</a>
											<a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td class="table-user">
											<b>John Michael</b>
										</td>
										<td>
											<span class="text-muted">10/09/2018</span>
										</td>
										<td>
											<a href="#!" class="font-weight-bold">DATA</a>
										</td>
										<td class="table-actions">
											<a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
												<i class="fas fa-user-edit"></i>
											</a>
											<a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<button type="button" class="fab" data-toggle="modal" data-target="#modal"><i class="ni ni-fat-add ni-2x"></i></button>

					<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Document Registratie</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" id="districten-form">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">INPUT</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" placeholder="Input 1" id="#" type="text">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">INPUT</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
														</div>
														<input class="form-control" placeholder="Input 1" id="#" type="text">
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="">File:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<input class="form-control" name='data' placeholder="Input 1" id="#" type="file" accept=".xls,.xlsx">
													</div>
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-primary">Toevoegen</button>
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

</body>

</html>