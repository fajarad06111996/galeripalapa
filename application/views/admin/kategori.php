      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data Kategori</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                 <button data-toggle="modal" data-target="#tambah" class="btn btn-primary ">Tambah Kategori</button>
                  </div>
				  
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                        <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th class="disabled-sorting text-right">Aksi</th>
                        </tr>
                      </thead>
                      
                     
                                    <tbody>
									<?php $no = 1; foreach($v as $v){ ?>
									     <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $v->namakategori; ?></td>
                                            <td><a href="<?php echo base_url("admin/edit_kategori/$v->id_kategori"); ?>"><button class="btn btn-primary">Edit</button></a> <a href="<?php echo base_url("admin/hapus_kategori/$v->id_kategori"); ?>"><button onclick="javascript : return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-danger">Hapus</button></a></td>
                                        </tr>
									<?php $no++; } ?>
                                    </tbody>
									
                    </table>
					<?php echo $this->pagination->create_links(); ?>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
          <!-- end row -->
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
                                <form role="form" action="<?php echo base_url("/admin/tambah_kategori"); ?>" enctype="multipart/form-data" method="post">
									<div class="form-group">
								  <div class="form-line">
										<label>Nama Paket</label>
                                        <input name="namakategori" type="text" class="form-control" placeholder="Masukan Nama Kategori" REQUIRED>
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