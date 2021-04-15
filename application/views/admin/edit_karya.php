      <div class="content">
        <div class="container-fluid">
          <div class="row">
      	<?php foreach($v as $v){ ?>
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit Karya</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <form role="form" action="<?php echo base_url("/admin/simpan_karya/$v->id_karya"); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                     
					<div class="row">
                      <label class="col-sm-2 col-form-label">Pengguna</label>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <select name="id_pengguna" class="selectpicker">
						  <?php foreach($pengguna as $pengguna) { ?>
										<option value="<?php echo $pengguna->id_pengguna; ?>"><?php echo $pengguna->namalengkap; ?></option>
						  <?php } ?>
										</select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Judul Karya</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="judulkarya" type="text" class="form-control"  value="<?php echo $v->judulkarya; ?>" REQUIRED>
                        </div>
                      </div>
                    </div>
					<div class="row">
									<div class="col-md-4 col-sm-4">
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
					   <div class="form-group-inner">
               <div class="login-btn-inner">
                 <div class="row">
                        <div class="col-lg-6"></div>
                          <div class="col-lg-6">
                              <div class="login-horizental cancel-wp pull-right">
                                  <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Simpan</button>
                            </div>
                         </div>
                     </div>
                   </div>
                </div>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
			<a href="<?php echo base_url("admin/karya"); ?>"><button class="btn btn-primary pull-left">Kembali</button></a> &nbsp;
		<?php } ?>
          </div>
        </div>
      </div>