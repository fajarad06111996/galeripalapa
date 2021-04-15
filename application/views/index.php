<!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header pricing-page "  style="background-image: url('<?php echo base_url(""); ?>/assets/img/OPSI4.jpg')">
		
        <div class="container">
        <div class="row">
          <div class="col-md-2 ml-auto mr-auto text-center">
           
          </div>
        </div>
        <div class="row">
          <div class="card-body ">
                   
                        <br>
                        <div class="row">
						<?php foreach($v as $karya) { ?>
                          <div class="col-md-3">
                            <div class="card card-product"><br/>
                              <center>
                                  <img class="img" src="<?php echo base_url(""); ?>assets/img/<?php echo $karya->fotokarya; ?>" width="240px" height="197px">
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
							  <?php
							  $kquery =$this->db->query("SELECT sum(jumlahrating) as jumlahrating FROM tbl_rating where tbl_rating.id_karya = '$karya->id_karya'");
        $karyax =  $kquery->result();
		//$jumlahx= 1;
		 $kquery2 =$this->db->query("SELECT * FROM tbl_rating where tbl_rating.id_karya = '$karya->id_karya'");
        $jumlahx =  $kquery2->num_rows();
		foreach($karyax as $ky) {
		
		 $totalrating = $ky->jumlahrating;
		 //$totalrating = array_sum($totalratingx);
		// $totalrating = $totalratingx;
		?>
							
							  <div class="card-footer">
                                <div class="price">
								<?php if($jumlahx != null) {?>
                                  <h4>Rating : <?php echo $totalrating/$jumlahx; ?>/10</h4>
								<?php }?>
                                </div>
                                
								
                              </div>
		<?php $totalratingx[] = null; } ?>
							   <?php 
							   $id_penggunadari = $this->session->userdata('id_pengguna');
							$query =$this->db->query("SELECT * FROM `tbl_rating` where id_karya = '$karya->id_karya' and id_penggunadari= '$id_penggunadari' ");
        $cekrating =  $query->num_rows();
		//var_dump($cekrating);
							   if($this->session->userdata('id_pengguna') != null and $this->session->userdata('id_pengguna') != $karya->id_pengguna and $cekrating <= 0){ ?>
							  <div class="card-footer">
							 <form role="form" action="<?php echo base_url("/app/rating/$karya->id_karya/$karya->id_pengguna"); ?>" enctype="multipart/form-data" method="post">
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="jumlahrating" class="selectpicker">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										</select>
                        </div>
                      </div>
                    </div>
					 <div class="modal-footer">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-star"></i> Rate</button>
                                </div>
                                </form>
							   <?php } ?>
                            </div>
                          </div>
                         <?php } ?>
                          </div>
						  <font color="yellow">
						  <?php echo $this->pagination->create_links(); ?>
						  
                       </div>
                          </div>
        </div>
      </div>