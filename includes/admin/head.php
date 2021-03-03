<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[4];
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
<meta name="author" content="Creative Tim">
<title>IPM |
	<?php
	if ($first_part == 'dashboard.php') {
		echo "Dashboard";
	} elseif ($first_part == 'docenten.php') {
		echo "Docenten";
	} elseif ($first_part == 'cijferlijsten.php') {
		echo "Cijferlijsten";
	} elseif ($first_part == 'document.php') {
		echo "Documenten";
	} elseif ($first_part == 'klassen-formatie.php') {
		echo "Klassen Formatie";
	} elseif ($first_part == 'richtingen.php') {
		echo "Richtingen";
	} elseif ($first_part == 'studenten.php') {
		echo "Studenten";
	} elseif ($first_part == 'vakken.php') {
		echo "Vakken";
	} elseif ($first_part == 'klassen.php') {
		echo "Klassen";
	}elseif ($first_part == 'home.php') {
		echo "Home";
	}elseif ($first_part == 'topup.php') {
		echo "Top Up";
	}

	?>
</title>
<!-- Favicon -->
<link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<!-- Icons -->
<link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
<link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
<!-- Page plugins -->
<!-- Argon CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/ipm.css" type="text/css">
<link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">
<link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.min.css">