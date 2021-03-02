<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[4];

function randomColors(){
  $colors=array("text-red","text-green","text-yellow","text-teal","text-pink","text-cyan","text-orange","text-purple","text-indigo","text-blue");
return $colors[array_rand($colors)];
}

?>


<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
        <img src="../../assets/img/brand/favicon.png" class="navbar-brand-img" alt="..."> <span>IPM</span>
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo ($first_part == 'dashboard.php') ? "active" : "" ?>" href="./dashboard.php">
              <i class="fas fa-tachometer-alt <?=randomColors()?>"></i>
              <span class="nav-link-text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($first_part == 'document.php') ? "active" : "" ?>" href="./document.php">
              <i class="fas fa-file-upload <?=randomColors()?>"></i>
              <span class="nav-link-text">Documenten</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($first_part == 'klassen-formatie.php') ? "active" : "" ?>" href="./klassen-formatie.php">
            <i class="fas fa-users <?=randomColors()?>"></i>
              <span class="nav-link-text">Klassen Formaties</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($first_part == 'studenten.php' || $first_part == 'docenten.php' || $first_part == 'richtingen.php'|| $first_part == 'vakken.php' ||$first_part == 'klassen.php' || $first_part == 'cijferlijsten.php' ) ? "active" : "" ?>" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="ni ni-ui-04 <?=randomColors()?>"></i>
              <span class="nav-link-text">School</span>
            </a>
            <div class="collapse <?php echo ($first_part == 'studenten.php' || $first_part == 'docenten.php' || $first_part == 'richtingen.php'|| $first_part == 'vakken.php' ||$first_part == 'klassen.php' || $first_part == 'cijferlijsten.php' ) ? "show" : "" ?> " id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'studenten.php') ? "active" : "" ?>" href="./studenten.php">
                    <i class="fas fa-user-friends <?=randomColors()?>"></i>
                    <span class="nav-link-text">Studenten</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'docenten.php') ? "active" : "" ?>" href="./docenten.php">
                  <i class="fas fa-chalkboard-teacher <?=randomColors()?>"></i>
                    <span class="nav-link-text">Docenten</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'richtingen.php') ? "active" : "" ?>" href="./richtingen.php">
                    <i class="fas fa-directions <?=randomColors()?>"></i>
                    <span class="nav-link-text">Richtingen</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'vakken.php') ? "active" : "" ?>" href="./vakken.php">
                    <i class="fas fa-cubes <?=randomColors()?>"></i>
                    <span class="nav-link-text">Vakken</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'klassen.php') ? "active" : "" ?>" href="./klassen.php">
                    <i class="fas fa-users <?=randomColors()?>"></i>
                    <span class="nav-link-text">Klassen</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($first_part == 'cijferlijsten.php') ? "active" : "" ?>" href="./cijferlijsten.php">
                    <i class="fas fa-list <?=randomColors()?>"></i>
                    <span class="nav-link-text">Cijferlijsten</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
      </div>
    </div>
  </div>
</nav>