<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  <?php echo $judul; ?></title>
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(""); ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(""); ?>assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  
  <!-- End Google Tag Manager -->
</head>

<body class="off-canvas-sidebar">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
          <div class="card">
                 <div class="">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo"><img width="90" height="50" src="<?php echo base_url(""); ?>assets/img/logo.png"> <b>GALERI PALAPA 44</b></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url(""); ?>" class="nav-link"><font color="black">
              <i class="material-icons">dashboard</i> Dashboard</font>
            </a>
          </li>
         <?php if($this->session->userdata('id_pengguna') != null){ ?>
          <li class="nav-item ">
            <a href="<?php echo base_url("app/profile"); ?>" class="nav-link">
             <font color="black"> <i class="material-icons">person</i> Profile</font>
            </a>
          </li>
		  <li class="nav-item ">
            <a href="<?php echo base_url("app/logout"); ?>" class="nav-link">
              <font color="black"><i class="material-icons">lock_open</i> <?php echo $this->session->userdata('namalengkap'); ?> (Logout)</font>
            </a>
          </li>
		 <?php } ?>
		   <?php if($this->session->userdata('id_pengguna') == null){ ?>
          <li class="nav-item ">
            <a href="<?php echo base_url("app/login_pengguna"); ?>" class="nav-link">
              <font color="black"><i class="material-icons">keyboard_arrow_up</i> Login</font>
            </a>
          </li>
		  <li class="nav-item ">
            <a href="<?php echo base_url("app/daftar"); ?>" class="nav-link">
              <font color="black"><i class="material-icons">person_add</i> Daftar</font>
            </a>
          </li>
		   <?php } ?>
        </ul>
      </div>
    </div>
     </div>
    </div>
  </nav>