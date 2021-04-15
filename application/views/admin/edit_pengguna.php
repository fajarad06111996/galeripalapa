      <div class="content">
        <div class="container-fluid">
          <div class="row">
      	<?php foreach($v as $v){ ?>
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit Pengguna</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <form role="form" action="<?php echo base_url("/admin/simpan_pengguna/$v->id_pengguna"); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                     
					<div class="row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="username" type="text" class="form-control" value="<?php echo $v->username; ?>" REQUIRED>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="password" type="password" class="form-control" placeholder="Paswword" REQUIRED>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="namalengkap" type="text" class="form-control"  value="<?php echo $v->namalengkap; ?>" REQUIRED>
                        </div>
                      </div>
                    </div>
					 <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="tanggallahir" type="date" class="form-control"  value="<?php echo $v->tanggallahir; ?>" REQUIRED>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <textarea name="alamat" class="form-control" REQUIRED><?php echo $v->alamat; ?></textarea>
                        </div>
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
                     <div class="row">
                      <label class="col-sm-2 col-form-label">Nomor HP</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="notelp" type="number" class="form-control" value="<?php echo $v->notelp; ?>" REQUIRED>
                        </div>
                      </div>
                      </div>
					  <div class="row">
                      <label class="col-sm-2 col-form-label">Halaman Web</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="halamanweb" type="text" class="form-control" value="<?php echo $v->halamanweb; ?>" REQUIRED>
                        </div>
                      </div>
                      </div>
					<div class="row">
                      <label class="col-sm-2 col-form-label">Bio</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <textarea name="bio" class="form-control" REQUIRED><?php echo $v->bio; ?></textarea>
                        </div>
                      </div>
                    </div>
					  <div class="row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="email" type="text" class="form-control" value="<?php echo $v->email; ?>" REQUIRED>
                        </div>
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
					    <div class="row">
                      <label class="col-sm-2 col-form-label">Status Pengguna</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="statuspengguna" class="selectpicker">
										<option value="Terverifikasi">Terverifikasi</option>
										<option value="Belum Terverifikasi">Belum Terverifikasi</option>
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
			<a href="<?php echo base_url("admin/pengguna"); ?>"><button class="btn btn-primary pull-left">Kembali</button></a> &nbsp;
		<?php } ?>
          </div>
        </div>
      </div>