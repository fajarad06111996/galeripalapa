
<?php foreach($v as $v) {?>
<body class="off-canvas-sidebar">
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header" filter-color="blue" style="background-image: url('<?php echo base_url(""); ?>assets/img/OPSI3.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
              <br> <br> <br> <br> <br>
            <div class="card card-signup">
              <h2 class="card-title text-center">Ubah Karya</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 ml-auto">
				  <form role="form" action="<?php echo base_url("/app/simpan_karya/$v->id_karya"); ?>" enctype="multipart/form-data" method="post">
                    	<div class="row">
                      <label class="col-sm-2 col-form-label">Judul Karya</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="judulkarya" type="text" class="form-control"  value="<?php echo $v->judulkarya; ?>" REQUIRED>
                        </div>
                      </div>
                    </div>
					<div class="row">
									<div class="col-md-12 col-sm-12">
									  <h4 class="title">Foto Karya</h4>
									  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
										  <img src="<?php echo base_url(); ?>/assets/img/<?php echo $v->fotokarya; ?>" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div>
										  <span class="btn btn-rose btn-round btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="fotokaryabaru" />
											<input type="file" name="fotokaryalama" value="<?php echo $v->fotokarya; ?>"/>
										  </span>
										  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
										</div>
									  </div>
									</div>
									</div>
									<div class="form-group">
								  <div class="form-line">
										<label>Deksripsi Karya </label>
                                        <textarea name="deskripsikarya" class="form-control" REQUIRED><?php echo $v->deskripsikarya; ?></textarea>
                                    </div>
                                    </div>
									    <div class="row">
                      <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="id_kategori" class="selectpicker">
						  <?php foreach($kategori as $kategori) { ?>
										<option value="<?php echo $kategori->id_kategori; ?>"><?php echo $kategori->namakategori; ?></option>
						  <?php } ?>
										</select>
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