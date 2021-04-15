      <div class="content">
        <div class="container-fluid">
          <div class="row">
      	<?php foreach($user as $v){ ?>
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit User</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <form role="form" action="<?php echo base_url("/admin/simpan_user/$v->id_admin"); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
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
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input name="nama" type="text" class="form-control"  value="<?php echo $v->nama; ?>" REQUIRED>
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
                      <label class="col-sm-2 col-form-label">Nomor HP</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="nohp" type="text" class="form-control" value="<?php echo $v->nohp; ?>" REQUIRED>
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
			<a href="<?php echo base_url("admin/user"); ?>"><button class="btn btn-primary pull-left">Kembali</button></a> &nbsp;
		<?php } ?>
          </div>
        </div>
      </div>