<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('id_admin') == ""){
			redirect(base_url('app/login_admin'));
		}
		$this->load->model('master'); //meload master model	
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah
		// if($this->session->userdata('id_siswa')==null){
			// redirect(base_url());
		// }
		$this->load->helper('tglid'); //tanggalindonesia
		
		
	}
	public function index()
	{
		

		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$data['judul'] = "Home ";
		$this->load->view('/admin/header', $data);
		$this->load->view('/admin/index');
		$this->load->view('/admin/footer');
	}
	//karya
	public function karya()
	{
		
		$data['judul'] = "Karya ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$jumlahdata = $this->master->page_karya();
		$this->load->library('pagination');
		$config['base_url'] = base_url("admin/karya/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// $config['page_query_string'] = TRUE;
		//$config['use_page_numbers'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<div ><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);	
		$data['v'] = $this->master->data_karya($config['per_page'],$from);
		$data['pengguna'] = $this->master->masterpengguna();
		$data['kategori'] = $this->master->masterkategori();
		$data['jd'] = $jumlahdata;
		$this->load->view('/admin/karya', $data);
		$this->load->view('/admin/footer');
	}
	public function edit_karya($id_karya)
	{
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/admin/karya')."' </script>";
		}
		
		$data['judul'] = "Edit Karya ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$data['v'] = $this->master->lihat_data('tbl_karya','id_karya', $id_karya);
		$data['pengguna'] = $this->master->masterpengguna();
		$data['kategori'] = $this->master->masterkategori();
		$this->load->view('/admin/edit_karya', $data);
		$this->load->view('/admin/footer');
	}
	public function tambah_karya(){;
		$id_pengguna = $this->input->post('id_pengguna');
		$fotokarya = $this->input->post('fotokarya');
		$deskripsikarya = $this->input->post('deskripsikarya');
		$id_kategori = $this->input->post('id_kategori');
		$judulkarya = $this->input->post('judulkarya');
		$tglkarya = date('20y-m-d');
		
		
		//uploader foto
		$this->load->library('upload');
		$fotokaryax = "";
		error_reporting(0);
		$nmfile = "fotokarya_".time();
		$configfoto['upload_path'] = 'assets/img/';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|rar';
		$configfoto['max_size'] = '1000048';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['fotokarya']['name']){
			
			if($this->upload->do_upload('fotokarya')){
				$lpr = $this->upload->data();
				$fotokaryax = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		//
		$data = array('id_pengguna' => $id_pengguna,
					  'deskripsikarya' => $deskripsikarya,
					  'id_kategori' => $id_kategori,
					  'judulkarya' => $judulkarya,
					  'tglkarya' => $tglkarya,
					  'fotokarya' => $fotokaryax);
		$ekz = $this->master->tambah_data('tbl_karya', $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data  Karya Berhasil Ditambah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/karya/')."';	
			  } ,2100); 
			 </script>"; 
	}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data  Karya Tidak Berhasil Ditambahkan',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/karya/')."';	
			  } ,2100); 
			 </script>"; 
			}
	}
	public function simpan_karya($id_karya){
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/admin/karya')."' </script>";
		}
		$id_pengguna = $this->input->post('id_pengguna');
		$fotokaryabaru = $this->input->post('fotokaryabaru');
		$fotokaryalama = $this->input->post('fotokaryalama');
		$deskripsikarya = $this->input->post('deskripsikarya');
		$judulkarya = $this->input->post('judulkarya');
		$id_kategori = $this->input->post('id_kategori');
		$tglkarya = date('20y-m-d');
		$fotoyangdisimpan1 = "";
		//cek2 foto 1
		if($fotokaryabaru == null){
			$fotoyangdisimpan1 = $fotokaryalama;
		}
		else{
			$fotoyangdisimpan1 = $fotokaryabaru;
		}
		//
		
		//uploader foto
		$this->load->library('upload');
		error_reporting(0);
		$nmfile = "fotokarya_".time();
		$configfoto['upload_path'] = 'assets/img/';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|rar';
		$configfoto['max_size'] = '1000048';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['fotokaryabaru']['name']){
			
			if($this->upload->do_upload('fotokaryabaru')){
				$lpr = $this->upload->data();
				$fotoyangdisimpan1 = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		//
		$data = array('id_pengguna' => $id_pengguna,
					  'deskripsikarya' => $deskripsikarya,
					  'id_kategori' => $id_kategori,
					  'judulkarya' => $judulkarya,
					  'tglkarya' => $tglkarya,
					  'fotokarya' => $fotoyangdisimpan1);
		//
		
		
		$ekz = $this->master->simpan_data('tbl_karya', 'id_karya', $id_karya, $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data Karya Berhasil Dirubah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/karya/')."';	
			  } ,2100); 
			 </script>";
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data Karya Tidak Berhasil Dirubah',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/karya/')."';	
			  } ,2100); 
			 </script>"; 
		}
	}
	public function hapus_karya($id_karya){
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/admin/karya')."' </script>";
		}
		$this->master->hapus_data('tbl_karya', 'id_karya', $id_karya);
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menghapus',
				text: 'Data Karya Berhasil Dihapus',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/karya/')."';	
			  } ,2100); 
			 </script>"; 
		
	
	}
	///////////////////////////////////////////////////////
	//pengguna
	public function pengguna()
	{
		
		$data['judul'] = "Pengguna";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$jumlahdata = $this->master->page_pengguna();
		$this->load->library('pagination');
		$config['base_url'] = base_url("admin/pengguna/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// $config['page_query_string'] = TRUE;
		//$config['use_page_numbers'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<div ><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);	
		$data['v'] = $this->master->data_pengguna($config['per_page'],$from);
		$data['jd'] = $jumlahdata;
		$this->load->view('/admin/pengguna', $data);
		$this->load->view('/admin/footer');
	}
	public function edit_pengguna($id_pengguna)
	{
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/admin/pengguna')."' </script>";
		}
		
		$data['judul'] = "Edit Pengguna ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$data['v'] = $this->master->lihat_data('tbl_pengguna','id_pengguna', $id_pengguna);
		$this->load->view('/admin/edit_pengguna', $data);
		$this->load->view('/admin/footer');
	}
	public function tambah_pengguna(){;
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$namalengkap = $this->input->post('namalengkap');
		$tanggallahir = $this->input->post('tanggallahir');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$notelp = $this->input->post('notelp');
		$halamanweb = $this->input->post('halamanweb');
		$bio = $this->input->post('bio');
		$email = $this->input->post('email');
		$fotoprofile = $this->input->post('fotoprofile');
		$statupengguna = $this->input->post('statupengguna');
		
		
		//uploader foto
		$this->load->library('upload');
		$fotoprofilex = "";
		error_reporting(0);
		$nmfile = "pp_".time();
		$configfoto['upload_path'] = 'assets/img/';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|rar';
		$configfoto['max_size'] = '1000048';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['fotoprofile']['name']){
			
			if($this->upload->do_upload('fotoprofile')){
				$lpr = $this->upload->data();
				$fotoprofilex = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		//
		$data = array('username' => $username,
					  'password' => $password,
					  'namalengkap' => $namalengkap,
					  'tanggallahir' => $tanggallahir,
					  'alamat' => $alamat,
					  'kota' => $kota,
					  'notelp' => $notelp,
					  'halamanweb' => $halamanweb,
					  'bio' => $bio,
					  'email' => $email,
					  'fotoprofile' => $fotoprofilex,
					  'statuspengguna' => $statupengguna);
		$ekz = $this->master->tambah_data('tbl_pengguna', $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data  ".$username." Berhasil Ditambah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>"; 
	}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data ".$username." Tidak Berhasil Ditambahkan',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>"; 
			}
	}
	public function simpan_pengguna($id_pengguna){
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/admin/pengguna')."' </script>";
		}
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$namalengkap = $this->input->post('namalengkap');
		$tanggallahir = $this->input->post('tanggallahir');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$notelp = $this->input->post('notelp');
		$halamanweb = $this->input->post('halamanweb');
		$bio = $this->input->post('bio');
		$email = $this->input->post('email');
		$fotoprofilebaru = $this->input->post('fotoprofilebaru');
		$fotoprofilelama = $this->input->post('fotoprofilelama');
		$statuspengguna =  $this->input->post('statuspengguna');
		//
		$fotoyangdisimpan1 = "";
		//cek2 foto 1
		if($fotoprofilebaru == null){
			$fotoyangdisimpan1 = $fotoprofilelama;
		}
		else{
			$fotoyangdisimpan1 = $fotoprofilebaru;
		}
		//
		
		//uploader foto
		$this->load->library('upload');
		$fotoprofilex = "";
		error_reporting(0);
		$nmfile = "pp_".time();
		$configfoto['upload_path'] = 'assets/img/';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|rar';
		$configfoto['max_size'] = '1000048';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['fotoprofilebaru']['name']){
			
			if($this->upload->do_upload('fotoprofilebaru')){
				$lpr = $this->upload->data();
				$fotoyangdisimpan1 = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		//
		$data = array('username' => $username,
					  'password' => $password,
					  'namalengkap' => $namalengkap,
					  'tanggallahir' => $tanggallahir,
					  'alamat' => $alamat,
					  'kota' => $kota,
					  'notelp' => $notelp,
					  'halamanweb' => $halamanweb,
					  'bio' => $bio,
					  'email' => $email,
					  'fotoprofile' => $fotoyangdisimpan1,
					  'statuspengguna' => $statuspengguna);
		$ekz = $this->master->simpan_data('tbl_pengguna', 'id_pengguna', $id_pengguna, $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data ".$username." Berhasil Dirubah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>";
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data ".$username." Tidak Berhasil Dirubah',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>"; 
		}
	}
	public function hapus_pengguna($id_pengguna){
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/admin/pengguna')."' </script>";
		}
		$this->master->hapus_data('tbl_pengguna', 'id_pengguna', $id_pengguna);
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menghapus',
				text: 'Data Pengguna Berhasil Dihapus',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>"; 
		
	
	}
	///////////////////////////////////////////////////////
	//kategori
	public function kategori()
	{
		
		$data['judul'] = "Kategori";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$jumlahdata = $this->master->page_kategori();
		$this->load->library('pagination');
		$config['base_url'] = base_url("admin/kategori/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// $config['page_query_string'] = TRUE;
		//$config['use_page_numbers'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<div ><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);	
		$data['v'] = $this->master->data_kategori($config['per_page'],$from);
		$data['jd'] = $jumlahdata;
		$this->load->view('/admin/kategori', $data);
		$this->load->view('/admin/footer');
	}
	public function edit_kategori($id_kategori)
	{
		if($id_kategori == ""){
			echo "<script>window.location.href='".base_url('/admin/kategori')."' </script>";
		}
		
		$data['judul'] = "Edit Paket ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$data['v'] = $this->master->lihat_data('tbl_kategori','id_kategori', $id_kategori);
		$this->load->view('/admin/edit_kategori', $data);
		$this->load->view('/admin/footer');
	}
	public function tambah_kategori(){;
		$namakategori = $this->input->post('namakategori');
		
		$data = array('namakategori' => $namakategori);
		$ekz = $this->master->tambah_data('tbl_kategori', $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data  ".$namakategori." Berhasil Ditambah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/kategori/')."';	
			  } ,2100); 
			 </script>"; 
	}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data ".$namakategori." Tidak Berhasil Ditambahkan',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/kategori/')."';	
			  } ,2100); 
			 </script>"; 
			}
	}
	public function simpan_kategori($id_kategori){
		if($id_kategori == ""){
			echo "<script>window.location.href='".base_url('/admin/kategori')."' </script>";
		}
		$namakategori = $this->input->post('namakategori');
		
		$data = array('namakategori' => $namakategori);
		$ekz = $this->master->simpan_data('tbl_kategori', 'id_kategori', $id_kategori, $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data ".$namakategori." Berhasil Dirubah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/kategori/')."';	
			  } ,2100); 
			 </script>";
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data ".$namakategori." Tidak Berhasil Dirubah',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/kategori/')."';	
			  } ,2100); 
			 </script>"; 
		}
	}
	public function hapus_kategori($id_kategori){
		if($id_kategori == ""){
			echo "<script>window.location.href='".base_url('/admin/kategori')."' </script>";
		}
		$this->master->hapus_data('tbl_kategori', 'id_kategori', $id_kategori);
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menghapus',
				text: 'Data Kategori Berhasil Dihapus',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/kategori/')."';	
			  } ,2100); 
			 </script>"; 
		
	
	}
	///////////////////////////////////////////////////////
	public function user()
	{
		
		$data['judul'] = "User";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$jumlahdata = $this->master->page_user();
		$this->load->library('pagination');
		$config['base_url'] = base_url("admin/user/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// $config['page_query_string'] = TRUE;
		$config['use_page_numbers'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<div ><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);	
		$data['user'] = $this->master->data_user($config['per_page'],$from);
		$data['jd'] = $jumlahdata;
		$this->load->view('/admin/profile', $data);
		$this->load->view('/admin/footer');
	}
	public function edit_user($id_user)
	{
		if($id_user == ""){
			echo "<script>window.location.href='".base_url('/admin/user')."' </script>";
		}
		
		$data['judul'] = "Edit User ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$data['user'] = $this->master->edit_user($id_user);
		$this->load->view('/admin/edit_user', $data);
		$this->load->view('/admin/footer');
	}
	public function tambah_user(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = array('username' => $username,
					  'password' => $password,
					  'nama' => $nama,
					  'alamat' => $alamat,
					  'nohp' => $nohp);
		$ekz = $this->master->tambah_user($data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data User ".$nama." Berhasil Ditambahkan',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/user/')."';	
			  } ,2100); 
			 </script>"; 
			//echo "<script>alert('Berhasil Menambah Data User.');window.location.href='".base_url('/admin/user')."' </script>";
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data User ".$nama." Tidak Berhasil Ditambahkan',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/user/')."';	
			  } ,2100); 
			 </script>"; 
			//echo "<script>alert('Gagal Menambah Data User.');window.location.href='".base_url('/admin/user')."' </script>";
		}
	}
	public function simpan_user($id_user){
		if($id_user == ""){
			echo "<script>window.location.href='".base_url('/admin/user')."' </script>";
		}
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = array('username' => $username,
					  'password' => $password,
					  'nama' => $nama,
					  'alamat' => $alamat,
					  'nohp' => $nohp);
		$ekz = $this->master->simpan_user($data, $id_user);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menyimpan',
				text: 'Data User ".$nama." Berhasil Dirubah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/user/')."';	
			  } ,2100); 
			 </script>"; 
			//echo "<script>alert('Berhasil Menyimpan Data User.');window.location.href='".base_url('/admin/user')."' </script>";
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Menyimpan',
				text: 'Data User ".$nama." Tidak Berhasil Dirubah',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/user/')."';	
			  } ,2100); 
			 </script>"; 
			//echo "<script>alert('Gagal Menyimpan Data User.');window.location.href='".base_url('/admin/user')."' </script>";
		}
	}
	public function hapus_user($id_user){
		if($id_user == ""){
			echo "<script>window.location.href='".base_url('/admin/user')."' </script>";
		}
		$this->master->hapus_user($id_user);
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Menghapus',
				text: 'User Berhasil Dihapus',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/user/')."';	
			  } ,2100); 
			 </script>"; 
		
		//redirect(base_url("/admin/user"));
	}
	///////////////////////////////////////////
	public function logout(){
		$this->session->sess_destroy();
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Logout Berhasil',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('')."';	
			  } ,2100); 
			 </script>"; 
		//redirect(base_url());
	}
	public function verifikasi_pengguna($id_pengguna){
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/admin/pengguna')."' </script>";
		}
		
		$statuspengguna = "Terverifikasi";
		$data = array('statuspengguna' => $statuspengguna);
		$ekz = $this->master->simpan_data('tbl_pengguna', 'id_pengguna', $id_pengguna, $data);
		if($ekz){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil verifikasi Pengguna',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/admin/pengguna/')."';	
			  } ,2100); 
			 </script>";
		}
		
	}
	public function laporan()
	{
		$data['judul'] = "LAPORAN ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/admin/header', $data);
		$this->load->view('/admin/laporan', $data);
		$this->load->view('/admin/footer');
	}
	public function cetak_laporan()
	{
		$dari_tanggal = $this->input->post('dari_tanggal');
		$sampai_tanggal = $this->input->post('sampai_tanggal');
		$data['dari_tanggal'] = $this->input->post('dari_tanggal');
		$data['sampai_tanggal'] = $this->input->post('sampai_tanggal');
		$data['cetak_laporan'] = $this->master->cetak_laporan($dari_tanggal, $sampai_tanggal);
		$this->load->view('/admin/cetak_laporan', $data);
	}
}
