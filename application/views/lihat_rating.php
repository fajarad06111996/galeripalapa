<?php foreach($profile as $p) {?>
<!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('<?php echo base_url(""); ?>/assets/img/OPSI3.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
              <br> <br> <br> <br> <br>
            <div class="card ">
              <h2 class="card-title text-center">Lihat Rating</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 ml-auto">
                 <div class="card-body ">
                    <h3>Postingan Karya</h3>
					
                        <br>
						 
                        <div class="row">
                          <?php foreach($karya as $karya) { ?>
						
                          <div class="col-md-12">
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
							 
							 
                            </div>
                          </div>
						  
                         <?php } ?>
						  
                        </div>
						
                          </div>
                  </div>
				 
                 <div class="col-md-4">
              <div class="card">
                <?php foreach($rating as $r) { ?>
                <div class="card-body">
                  <h6 class="card-category text-gray">@<?php echo $r->username; ?></h6>
                  <h4 class="card-title"><?php echo $r->namalengkap; ?> (<?php echo $r->kota; ?>)</h4>
                  <p class="card-description">
                    <?php echo $r->jumlahrating; ?>/10
                  </p>
                 
                </div>
				 <?php } ?>
              </div>
            </div>
				
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	<?php } ?>
