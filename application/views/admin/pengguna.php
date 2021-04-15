      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data Customer</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                 <button data-toggle="modal" data-target="#tambah" class="btn btn-primary ">Tambah Pengguna</button>
                  </div>
				  
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                        <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama Lengkap</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>No HP</th>
                                            <th>Halaman Web</th>
                                            <th>Bio</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting text-right">Aksi</th>
                        </tr>
                      </thead>
                      
                     
                                    <tbody>
									<?php $no = 1; foreach($v as $v){ ?>
									     <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $v->username; ?></td>
                                            <td>******</td>
                                            <td><?php echo $v->namalengkap; ?></td>
                                            <td><?php echo tgl_indo($v->tanggallahir); ?></td>
                                            <td><?php echo $v->alamat; ?></td>
                                            <td><?php echo $v->kota; ?></td>
                                            <td><?php echo $v->notelp; ?></td>
                                            <td><?php echo $v->halamanweb; ?></td>
                                            <td><?php echo $v->bio; ?></td>
                                            <td><?php echo $v->email; ?></td>
                                            <td><?php echo $v->fotoprofile; ?></td>
											<?php if($v->statuspengguna == "Terverifikasi"){?>
                                            <td><div class="alert alert-success"> <b> Terverifikasi</b> </div></td>
											<?php } ?>
											<?php if($v->statuspengguna == "Belum Terverifikasi"){?>
                                            <td><div class="alert alert-danger"> <b> Belum Terverifikasi</b> </div></td>
											<?php } ?>
                                            <td>
											<?php if($v->statuspengguna == "Belum Terverifikasi"){?>
											<a href="<?php echo base_url("admin/verifikasi_pengguna/$v->id_pengguna"); ?>"><button class="btn btn-success">Verifikasi</button></a>
											<?php } ?>
											<a href="<?php echo base_url("admin/edit_pengguna/$v->id_pengguna"); ?>"><button class="btn btn-primary">Edit</button></a>
											<a href="<?php echo base_url("admin/hapus_pengguna/$v->id_pengguna"); ?>"><button onclick="javascript : return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-danger">Hapus</button></a></td>
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
                                <form role="form" action="<?php echo base_url("/admin/tambah_pengguna"); ?>" enctype="multipart/form-data" method="post">
									
									<div class="form-group">
								  <div class="form-line">
										<label>Username</label>
                                        <input name="username" type="text" class="form-control" placeholder="Masukan Username" REQUIRED>
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
                                        <input name="namalengkap" type="text" class="form-control" placeholder="Masukan Nama Lengkap" REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>TGL Lahir</label>
                                        <input name="tanggallahir" type="date" class="form-control" placeholder="Masukan Tanggal Lahir" REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Alamat </label>
                                        <textarea name="alamat" class="form-control" REQUIRED></textarea>
                                    </div>
                                    </div>
									 <div class="row">
                      <label class="col-sm-2 col-form-label">Kota</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="kota" class="selectpicker">
										<option value="Pringsewu">Pringsewu</option>
										<option value="Bandar Lampung">Bandar Lampung</option>
										<option value="Kalianda">Kalianda</option>
										<option value="Liwa">Liwa</option>
										<option value="Gunung Sugih">Gunung Sugih</option>
										<option value="Sukadana">Sukadana</option>
										<option value="Kotabumi">Kotabumi</option>
										<option value="Mesuji">Mesuji</option>
										<option value="Gedong Tataan">Gedong Tataan</option>
										<option value="Krui">Krui</option>
										<option value="Kota Agung">Kota Agung</option>
										<option value="Menggala">Menggala</option>
										<option value="Tulang Bawang Tengah">Tulang Bawang Tengah</option>
										<option value="Blambangan Umpu">Blambangan Umpu</option>
										<option value="Metro">Metro</option>
										</select>
                        </div>
                      </div>
                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Nomor HP </label>
                                        <input name="notelp" type="number" class="form-control" placeholder="Nomor HP" REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Halaman Web</label>
                                        <input name="halamanweb" type="text" class="form-control" placeholder="Halaman Web. Misal Instagram Anda" REQUIRED>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Bio </label>
                                        <textarea name="bio" class="form-control" REQUIRED></textarea>
                                    </div>
                                    </div>
									<div class="form-group">
								  <div class="form-line">
										<label>Email </label>
                                        <input name="email" type="text" class="form-control" placeholder="Email" REQUIRED>
                                    </div>
                                    </div>
									<div class="row">
									<div class="col-md-4 col-sm-4">
									  <h4 class="title">Foto Profile</h4>
									  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
										  <img src="<?php echo base_url(); ?>/assets/img/image_placeholder.jpg" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div>
										  <span class="btn btn-rose btn-round btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="fotoprofile" />
										  </span>
										  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
										</div>
									  </div>
									</div>
									</div>
									    <div class="row">
                      <label class="col-sm-2 col-form-label">Status User</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="statupengguna" class="selectpicker">
										<option value="Terverifikasi">Terverifikasi</option>
										<option value="Belum Terverifikasi">Belum Terverifikasi</option>
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