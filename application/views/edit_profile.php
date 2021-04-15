
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(""); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(""); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Daftar
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->

 
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(""); ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(""); ?>assets/demo/demo.css" rel="stylesheet" />
  
</head>
<?php foreach($v as $v) {?>
<body class="off-canvas-sidebar">
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header" filter-color="blue" style="background-image: url('<?php echo base_url(""); ?>assets/img/OPSI3.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
              <br> <br> <br> <br> <br><br> <br> <br> <br> <br>
            <div class="card card-signup">
              <h2 class="card-title text-center">Ubah Profile</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 ml-auto">
				  <form role="form" action="<?php echo base_url("/app/simpan_pengguna/$v->id_pengguna"); ?>" enctype="multipart/form-data" method="post">
                    	<div class="form-group">
								  <div class="form-line">
										<label>Username</label>
                                        <input name="username" type="text" class="form-control" value="<?php echo $v->username; ?>" readonly>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Masukan Password" REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Nama Lengkap</label>
                                        <input name="namalengkap" type="text" class="form-control" value="<?php echo $v->namalengkap; ?>"  REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>TGL Lahir</label>
                                        <input name="tanggallahir" type="date" class="form-control" value="<?php echo $v->tanggallahir; ?>"  REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Alamat </label>
                                        <textarea name="alamat" class="form-control" REQUIRED><?php echo $v->alamat; ?> </textarea>
                                    </div>
                                    </div>
									 <div class="row">
                      <label class="col-sm-2 col-form-label">Kota</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="kota" class="selectpicker">
										<option value="Pringsewu">Pringsewu</option>
										<option value="Bandar Lampung">Bandar Lampung</option>
										</select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 mr-auto">
                    
                    
                      
									<div class="form-group">
								  <div class="form-line">
										<label>Nomor HP </label>
                                        <input name="notelp" type="number" class="form-control" value="<?php echo $v->notelp; ?>"  REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Halaman Web</label>
                                        <input name="halamanweb" type="text" class="form-control" value="<?php echo $v->halamanweb; ?>"  REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Bio </label>
                                        <textarea name="bio" class="form-control" REQUIRED><?php echo $v->bio; ?> </textarea>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Email </label>
                                        <input name="email" type="text" class="form-control" value="<?php echo $v->email; ?>"  REQUIRED>
                                    </div>
                                    </div>
									<div class="row">
									<div class="col-md-4 col-sm-4">
									  <h4 class="title">Foto Profile</h4>
									  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
										  <img src="<?php echo base_url(); ?>/assets/img/<?php echo $v->fotoprofile; ?>" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div>
										  <span class="btn btn-rose btn-round btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="fotoprofilebaru" />
											<input type="hidden" name="fotoprofilelama" value="<?php echo $v->fotoprofile; ?>"/>
										  </span>
										  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
										</div>
									  </div>
									</div>
									</div>
                     <div class="modal-footer">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                                </form>
								
                  </div>
                </div>
				<a href="<?php echo base_url("app/profile"); ?>"><button class="btn btn-primary"> Kembali</button></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
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