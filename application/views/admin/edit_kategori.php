      <div class="content">
        <div class="container-fluid">
          <div class="row">
      	<?php foreach($v as $v){ ?>
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Edit Kategori</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <form role="form" action="<?php echo base_url("/admin/simpan_kategori/$v->id_kategori"); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Nama Kategori</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input name="namakategori" type="text" class="form-control" value="<?php echo $v->namakategori; ?>" REQUIRED>
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
			<a href="<?php echo base_url("admin/kategori"); ?>"><button class="btn btn-primary pull-left">Kembali</button></a> &nbsp;
		<?php } ?>
          </div>
        </div>
      </div>