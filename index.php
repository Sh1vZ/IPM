<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>IPM | Login</title>
	<!-- Favicon -->
	<link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<link rel="stylesheet" href="./assets/vendor/sweetalert2/dist/sweetalert2.min.css">
	<!-- IPM CSS -->
	<link rel="stylesheet" href="./assets/css/ipm.css" type="text/css">
</head>

<body class="bg-default">
	<!-- Navbar -->
	<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<h3 class="text-white "><img src="./assets/img/brand/favicon.png" class="navbar-brand-img nav-img" alt="..."> IPM</h3>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
				<div class="navbar-collapse-header">
					<div class="row">

						<div class="col-6 collapse-brand">
							<h4><img src="./assets/img/brand/favicon.png" class="navbar-brand-img nav-img" alt="..."> IPM</h4>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item btn-icon">
						<a href="./pages/admin/login.php">
							<button class="btn btn-secondary btn-lg btn-block" type="button">
								<span class="btn-inner--icon"><i class="fa fa-lock fa-lg"></i></span>
								<span class="btn-inner--text">Admin Login</span>
							</button>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content">
		<!-- Header -->
		<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
			<div class="container">
				<div class="header-body text-center mb-7">
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-6 col-md-8 px-5">
							<h1 class="text-white">Welcome!</h1>
							<p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary border-0 mb-0">
						<div class="card-header bg-transparent pb-4">
							<div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
							<div class="btn-wrapper text-center">
								<button class="btn btn-neutral btn-icon" data-toggle="modal" data-target="#exampleModalCenter" onclick="camera()">
									<span class="btn-inner--icon"><i class="fas fa-qrcode"></i></span>
									<span class="btn-inner--text">QRcode</span>
								</button>
							</div>
						</div>
						<div class="card-body px-lg-5 py-lg-3">
							<div class="text-center text-muted mb-4">
								<small>Or sign in with credentials</small>
							</div>
							<form role="form" id="studentenForm">
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input id="code" class="form-control" name="qrcode" placeholder="Pin" type="text">
									</div>
								</div>
								<div class="text-center">
									<button type="submit" id="loginQR" class="btn btn-primary my-4">Sign in</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Scan de QRcode</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="app" class="row box">
							<div class="col-md-12 sidebar">
								<ul>
									<li v-if="cameras.length === 0" class="empty">No cameras found</li>
									<li v-for="camera in cameras">
										<span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
										<span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
											<a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
										</span>
									</li>
								</ul>
							</div>
							<div class="col-md-12">
								<video id="preview" class="" style="width:95%;"></video>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="py-5" id="footer-main">
			<div class="container">
				<div class="row align-items-center justify-content-xl-between">
					<div class="col-xl-6">
						<div class="copyright text-center text-xl-left text-muted">
							&copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">IPM</a>
						</div>
					</div>
					<div class="col-xl-6">
					</div>
				</div>
			</div>
		</footer>
		<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
		<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
		<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
		<script src="./assets/js/ipm.js"></script>
		<script src="./app/js/studenten.js"></script>
		<script src="scanner/vendor/instascan/instascan.min.js"></script>
		<script src="scanner/vendor/vue/vue.min.js"></script>
		<script src="scanner/vendor/modernizr/modernizr.js"></script>
		<script src="scanner/js/app.js"></script>
		<script src="scanner/js/scanner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.9.0/dist/sweetalert2.all.min.js"></script>
</body>
</html>