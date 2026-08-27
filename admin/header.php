<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin | Beranda</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>
		<style>
			body {
                background-image: url('assets/images/hi.jpg'); 
                background-size: cover; 
                background-repeat: no-repeat; 
                background-attachment: fixed; 
                background-position: center center; 
                margin: 0;
            }

            .carousel-inner img {
                width: 100%;
                height: auto;
            }

            .wide-image {
                width: 100%;
            }
        </style>
	</head>

    <body class="container-fluid">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar clearfix btn-purple btn-sm" id="navbar-clearfix">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<img src="../icons/8.png" alt=" " style="width: 45px; height: auto; margin-right: 5px;">
							<span class="menu-text">PETPAL</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</small>
					</a>
				</div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-pink dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/avatar1.png" alt="Jason's Photo" />
								<span class="bigger-110 grey user-info">
									Admin </span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-purple dropdown-caret dropdown-close">
								<li>
									<a href="logout.php">
										<i class="purple ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>