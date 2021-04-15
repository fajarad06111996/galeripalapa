

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(""); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(""); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $judul; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
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

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="black" data-image="<?php echo base_url(""); ?>assets/img/sidebar-2.jpg">
  
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          EO
        </a>
        <a href="<?php echo base_url("admin"); ?>" class="simple-text logo-normal">
         APP V.0.0.1
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url(""); ?>assets/img/faces/avatar.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $this->session->userdata('username'); ?>
               
              </span>
            </a>
            
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="<?php echo base_url("admin"); ?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">image</i>
              <p> Karya
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url("admin/karya"); ?>">
                    <span class="sidebar-mini"> DK </span>
                    <span class="sidebar-normal"> Data Karya </span>
                  </a>
                </li>
                
                
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
              <i class="material-icons">apps</i>
              <p> Master Data
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="componentsExamples">
              <ul class="nav">
               
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url("admin/kategori"); ?>">
                    <span class="sidebar-mini"> K </span>
                    <span class="sidebar-normal"> Kategori </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url("admin/pengguna"); ?>">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Pengguna </span>
                  </a>
                </li>
                
              </ul>
            </div>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url("admin/laporan"); ?>">
              <i class="material-icons">apps</i>
              <p> Laporan </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url("admin/user"); ?>">
              <i class="material-icons">person</i>
              <p> Data Admin </p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Galeri Palapa 44</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                 
                  <a class="dropdown-item" href="<?php echo base_url("admin/logout"); ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->