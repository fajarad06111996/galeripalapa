<?php foreach($profile as $p) {?>
<!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('<?php echo base_url(""); ?>/assets/img/OPSI3.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
              <br> <br> <br> <br> <br><br> <br> 
            <div class="card ">
              <h2 class="card-title text-center">Profile</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 ml-auto">
				  <button data-toggle="modal" data-target="#tambah" class="btn btn-primary ">Tambah Karya</button>
                 <div class="card-body ">
                    <h3>Postingan Karya</h3>
					
                        <br>
						 
                        <div class="row">
                          <?php foreach($v as $karya) { ?>
						
                          <div class="col-md-4">
                              <div class="card">
                              <div class="card-header card-header-image" data-header-animation="false">
                                <a href="#pablo">
                                  <img class="img" src="<?php echo base_url(""); ?>assets/img/<?php echo $karya->fotokarya; ?>">
                                </a>
                              </div>
                              <div class="card-body">
                               
                                <h4 class="card-title">
                                  <a href="#pablo"><?php echo $karya->judulkarya; ?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $karya->deskripsikarya; ?>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4></h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">place</i> <?php echo $karya->kota; ?></p><br>
								  <p class="card-category"><i class="material-icons">image</i> <?php echo $karya->namakategori; ?></p>
                                </div>
								
                              </div>
							  <div class="card-footer">
                                <div class="price">
								<a href="<?php echo base_url("app/lihat_rating/$karya->id_karya"); ?>"><button class="btn btn-success">Rating</button></a>
                                 <a href="<?php echo base_url("app/edit_karya/$karya->id_karya"); ?>"><button class="btn btn-primary">Edit</button></a>
											<a href="<?php echo base_url("app/hapus_karya/$karya->id_karya"); ?>"><button onclick="javascript : return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-danger">Hapus</button></a>
                                </div>
                                
								
                              </div>
							 
                            </div>
                          </div>
						  
                         <?php } ?>
						  
                        </div>
						<?php echo $this->pagination->create_links(); ?>
                          </div>
                  </div>
                 <div class="col-md-4">
              <div class="card">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img img-responsive" height="100%" width="100%" src="<?php echo base_url(""); ?>/assets/img/<?php echo $p->fotoprofile; ?>">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">@<?php echo $p->username; ?></h6>
                  <h4 class="card-title"><?php echo $p->namalengkap; ?> (<?php echo $p->kota; ?>)</h4>
                  <p class="card-description">
                    <?php echo $p->bio; ?>
                  </p>
                  <a href="<?php echo base_url("app/edit_profile/$p->id_pengguna"); ?>" class="btn btn-rose btn-round">Ubah</a>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="modal fade" id="tambah">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                               
								  <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                   
                                </div>
                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url("/app/tambah_karya"); ?>" enctype="multipart/form-data" method="post">
									
								
									<div class="form-group">
								  <div class="form-line">
										<label>Judul Karya</label>
                                        <input name="judulkarya" type="text" class="form-control" placeholder="Masukan Judul Karya" REQUIRED>
                                    </div>
                                    </div>
									<div class="row">
									<div class="col-md-4 col-sm-4">
									  <h4 class="title">Foto Karya</h4>
									  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
										  <img src="<?php echo base_url(); ?>/assets/img/image_placeholder.jpg" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div>
										  <span class="btn btn-rose btn-round btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="fotokarya" />
										  </span>
										  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
										</div>
									  </div>
									</div>
									</div>
									<div class="form-group">
								  <div class="form-line">
										<label>Deksripsi Karya </label>
                                        <textarea name="deskripsikarya" class="form-control" REQUIRED></textarea>
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
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                                </form>
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
              <!-- Plugin for the momentJs  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/moment.min.js"></script>
              <!--  Plugin for Sweet Alert -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
              <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/arrive.min.js"></script>
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
			   <script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

</body>

</html>