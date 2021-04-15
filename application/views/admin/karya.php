<div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">image</i>
                    </div>
                    <h4 class="card-title">Karya</h4>
					
                  </div>
				   
                  <div class="card-body ">
				   <div class="toolbar">
                  <button data-toggle="modal" data-target="#tambah" class="btn btn-primary ">Tambah Karya</button>
                  </div>
                    <h3>Data Karya</h3>
                        <br>
						
                        <div class="row">
						<?php foreach($v as $karya) { ?>
                          <div class="col-md-4">
                            <div class="card card-product"><br/>
                             <center>
                                  <img class="img" src="<?php echo base_url(""); ?>assets/img/<?php echo $karya->fotokarya; ?>" width="300px" height="197px">
                                </center>
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
                                  <h4>@<?php echo $karya->username; ?></h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">place</i> <?php echo $karya->kota; ?></p><br>
								  <p class="card-category"><i class="material-icons">image</i> <?php echo $karya->namakategori; ?></p>
                                </div>
								
                              </div>
							  <div class="card-footer">
                                <div class="price">
                                 <a href="<?php echo base_url("admin/edit_karya/$karya->id_karya"); ?>"><button class="btn btn-primary">Edit</button></a>
											<a href="<?php echo base_url("admin/hapus_karya/$karya->id_karya"); ?>"><button onclick="javascript : return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-danger">Hapus</button></a>
                                </div>
                                
								
                              </div>
                            </div>
                          </div>
                         <?php } ?>
                        </div>
						<?php echo $this->pagination->create_links(); ?>
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
                                <form role="form" action="<?php echo base_url("/admin/tambah_karya"); ?>" enctype="multipart/form-data" method="post">
									
									
									 <div class="row">
                      <label class="col-sm-2 col-form-label">Pengguna</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="id_pengguna" class="selectpicker">
						  <?php foreach($pengguna as $pengguna) { ?>
										<option value="<?php echo $pengguna->id_pengguna; ?>"><?php echo $pengguna->namalengkap; ?></option>
						  <?php } ?>
										</select>
                        </div>
                      </div>
                    </div>
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
										<label>Deksripsi Karya (Max 140 Karakter)</label>
                                        <textarea name="deskripsikarya" class="form-control" maxlength="140" REQUIRED></textarea>
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