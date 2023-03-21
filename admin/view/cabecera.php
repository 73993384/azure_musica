<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="../assets/img/rattan_logo.png" />
	<title>Rattan Admin</title>
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/estilos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- FONTASOME ICONS CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- DATATABLE PLUGIN CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" />
	<!-- SELECT2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!-- SWEETALERT2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
	<!-- LIGHTBOX CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<?php
	if ($_SESSION['usuario'] == null) {
		header("Location: index.php?c=login&a=Cerrar_Sesion");
	}
	?>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar" style="background-color: currentcolor;">
				<a class="sidebar-brand" href="#">
					<span class="align-middle"><img src="assets/img/icons/logo.jpg" class="" alt="..." height="60px"></span>
				</a>
				<?php if ($_SESSION['codigo_usuario'] == 1) { ?>
					<ul class="sidebar-nav">
						<li class="sidebar-header">
							<strong>Generos</strong>
						</li>
						<li class="sidebar-item active">
							<a class="sidebar-link" href="?c=genero&a=Listar_Generos">
								<i class="align-middle" data-feather="sliders"></i><span class="align-middle">Listar Generos</span>
							</a>
						</li>
						<li class="sidebar-header">
							<strong>Artistas</strong>
						</li>
						<li class="sidebar-item active">
							<a class="sidebar-link" href="?c=artista&a=Listar_Artistas">
								<i class="align-middle" data-feather="sliders"></i><span class="align-middle">Listar Artistas</span>
							</a>
						</li>
						<li class="sidebar-header">
							<strong>Albums</strong>
						</li>
						<li class="sidebar-item active">
							<a class="sidebar-link" href="?c=album&a=Listar_Albums">
								<i class="align-middle" data-feather="sliders"></i><span class="align-middle">Listar Albums</span>
							</a>
						</li>
						<li class="sidebar-header">
							<strong>Canciones</strong>
						</li>
						<li class="sidebar-item active">
							<a class="sidebar-link" href="?c=cancion&a=Listar_Canciones">
								<i class="align-middle" data-feather="sliders"></i><span class="align-middle">Listar Canciones</span>
							</a>
						</li>
					<?php } ?>
					<?php if ($_SESSION['codigo_usuario'] == 2) { ?>
						<li class="sidebar-header">
							<strong>Playlist</strong>
						</li>
						<li class="sidebar-item active">
							<a class="sidebar-link" href="?c=playlist&a=Listar_Playlists">
								<i class="align-middle" data-feather="sliders"></i><span class="align-middle">Listar Playlists</span>
							</a>
						</li>
					<?php } ?>
					</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg" style="background-color:#5DB0E6;">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" style="color:none" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<i class="fa-solid fa-user fa-2x"></i> <span class="text-dark"><strong><?php echo $_SESSION['usuario'] ?></strong></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?c=login&a=Cerrar_Sesion"><i class="align-middle me-1" data-feather="log-in"></i>Cerrar Sesión</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content" style="background-color:#eeeeee;padding: 2rem 2rem 1.5rem;">
				<div class="container-fluid">