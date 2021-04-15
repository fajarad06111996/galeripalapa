
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(""); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(""); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->

  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
  <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(""); ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(""); ?>assets/demo/demo.css" rel="stylesheet" />
  
</head>

<body class="off-canvas-sidebar">
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header" filter-color="black" style="background-image: url('<?php echo base_url(""); ?>assets/img/OPSI3.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
		  
            <form class="form" method="post" action="<?php echo base_url("/app/cekmasuk_pengguna"); ?>">
              <div class="card card-login card-hidden">
			  <center>
                                  <img width="200" height="100%" src="<?php echo base_url(""); ?>assets/img/logo.png"> 
                                </center>
								 <div class="social-line">
				  <center>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-red">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-red">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-red">
                      <i class="fa fa-google-plus"></i>
                    </a>
					</center>
                  </div>
                <div class="card-body ">
				<h4 class="card-title text-center">Login Pengguna</h4>
                  <p class="card-description text-center">Palapa 44</p>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="First Name...">
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Password...">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-rose btn-link btn-lg">Masuk</button>
                  <a href="<?php echo base_url("app/login_admin") ?>">Login Admin</a>
                </div>
              </div>
            </form>
             <div class="card">
                 <div class="card-body">
			Belum punya Akun ? <a href="<?php echo base_url("app/daftar"); ?>">Daftar Akun</a>| <a href="<?php echo base_url("app"); ?>">Kembali Beranda</a> 
			</div>
			</div>
        </div>
      </div>
     
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(""); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url(""); ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(""); ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url(""); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url(""); ?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(""); ?>assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(""); ?>assets/demo/demo.js"></script>
  
</body>

</html>