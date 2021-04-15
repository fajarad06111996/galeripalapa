<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('master'); //meload master model	
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah
		
		
	}
	public function index()
	{
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$data['judul'] = "Home ";
		$this->load->view('/header', $data);
		$jumlahdata = $this->master->page_karya();
		$this->load->library('pagination');
		$config['base_url'] = base_url("app/index/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 4;
		$from = $this->uri->segment(3);
		$config['page_query_string'] = FALSE;
		$config['use_page_numbers'] = FALSE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<div ><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination1-->';
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
		$data['jumlahx'] =  0;
		//$data['totalrating'] = 0;
		$this->load->view('/index', $data);
		$this->load->view('/footer');
	}
	public function profile()
	{
		if($this->session->userdata('id_pengguna') == null){
			redirect(base_url("app/login_pengguna"));
		}
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$data['judul'] = "Profile ";
		$this->load->view('/header', $data);
		$data['profile'] = $this->master->profile();
		$jumlahdata = $this->master->page_karyapengguna();
		$this->load->library('pagination');
		$config['base_url'] = base_url("app/profile/");
		$config['total_rows'] = $jumlahdata;
		$config['per_page'] = 3;
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
		$data['v'] = $this->master->data_karyapengguna($config['per_page'],$from);
		$data['pengguna'] = $this->master->masterpengguna();
		$data['kategori'] = $this->master->masterkategori();
		$data['jd'] = $jumlahdata;
		$this->load->view('/profile', $data);
	
	}
	public function edit_profile($id_pengguna)
	{
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/app/profile')."' </script>";
		}
		
		$data['judul'] = "Edit Profile ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/header', $data);
		$data['v'] = $this->master->lihat_data('tbl_pengguna','id_pengguna', $id_pengguna);
		
		$this->load->view('/edit_profile', $data);
	}
	public function lihat_rating($id_karya)
	{
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/app/profile')."' </script>";
		}
		$data['profile'] = $this->master->profile();
		$data['judul'] = "Lihat Rating ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/header', $data);
		$data['karya'] = $this->master->karyarating($id_karya);
		$data['rating'] = $this->master->lihatrating($id_karya);
		$this->load->view('/lihat_rating', $data);
	
	}
	public function simpan_pengguna($id_pengguna){
		if($id_pengguna == ""){
			echo "<script>window.location.href='".base_url('/app/profile')."' </script>";
		}
		
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
		$data = array('password' => $password,
					  'namalengkap' => $namalengkap,
					  'tanggallahir' => $tanggallahir,
					  'alamat' => $alamat,
					  'kota' => $kota,
					  'notelp' => $notelp,
					  'halamanweb' => $halamanweb,
					  'bio' => $bio,
					  'email' => $email,
					  'fotoprofile' => $fotoyangdisimpan1);
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
				text: 'Data ".$namalengkap." Berhasil Dirubah',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/app/profile')."';	
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
				text: 'Data ".$namalengkap." Tidak Berhasil Dirubah',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('/app/profile')."';	
			  } ,2100); 
			 </script>"; 
		}
	}
	public function daftar()
	{
		
		$data['judul'] = "Daftar";
		$this->load->view('/header', $data);
		$this->load->view('daftar', $data);
		
	}
	public function daftar_pengguna(){;
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
		$statupengguna = "Belum Terverifikasi";
		
		
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
			  window.location.href='".base_url('/app/')."';	
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
			  window.location.href='".base_url('/app/')."';	
			  } ,2100); 
			 </script>"; 
			}
	}
	public function login_admin()
	{
		
		$data['judul'] = "Login Admin";
		$this->load->view('login_admin', $data);
	}
	public function login_pengguna()
	{
		
		$data['judul'] = "Login pengguna";
		$this->load->view('login_pengguna', $data);
	}
	public function cekmasuk(){
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$md5 = md5($password);
		$data = array('username' => $username, 
					  'password' => $md5);
		$hasil = $this->master->cekmasuk($data);
		if ($hasil->num_rows() > 0){
			$data['akun'] = $this->master->dataakunadmin($username);
			foreach ($data['akun'] as $akun) {
				$sesi['nama'] = $akun->nama;
				$sesi['username'] = $username;
				$sesi['id_admin'] = $akun->id_admin;
				$this->session->set_userdata($sesi);
				redirect(base_url('/admin'));
			}
		}
		else{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Gagal !',
				text: 'Periksa Username dan Password Anda Kembali',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('')."';	
			  } ,2100); 
			 </script>"; 
			//echo "<script>alert('Username / Password Anda Salah !');window.location.href='".base_url('/app')."' </script>";
		}
	}
	public function cekmasuk_pengguna(){
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$md5 = md5($password);
		$datax = array('username' => $username, 
					  'password' => $md5);
		$hasil = $this->master->cekmasukpengguna($datax);
		if ($hasil->num_rows() > 0){
			$data['akun'] = $this->master->dataakunpengguna($username);
			foreach ($data['akun'] as $akun) {
				if ($akun->statuspengguna == "Belum Terverifikasi"){
				echo "
				<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
				<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
				<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
				 <script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
					title: 'Akun Anda belum terverifikasi oleh Admin.',
					text: 'Mohon Tunggu Hingga Admin Mengkonfirmasi Akun Anda',
					type: 'error',
					timer: 4000,
					showConfirmButton: false
				   });  
				  },10); 
				  window.setTimeout(function(){ 
				  window.location.href='".base_url('app')."';	
				  } ,2100); 
				 </script>"; 
				
			}
			else {
				$sesi['namalengkap'] = $akun->namalengkap;
				$sesi['username'] = $username;
				$sesi['id_pengguna'] = $akun->id_pengguna;
				$this->session->set_userdata($sesi);
				//var_dump($hasil->num_rows());
				
				redirect(base_url('/app'));
			}
			}
		}
		// var_dump($hasil->num_rows());
		if ($hasil->num_rows() >= 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Gagal !',
				text: 'Periksa Username dan Password Anda Kembali',
				type: 'error',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/login_pengguna')."';	
			  } ,2100); 
			 </script>"; 
			
		}
	}
	public function edit_karya($id_karya)
	{
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/app')."' </script>";
		}
		
		$data['judul'] = "Edit Karya ";
		$data['nama'] = $this->session->userdata('nama'); 
		$data['username'] = $this->session->userdata('username'); 
		$this->load->view('/header', $data);
		$data['v'] = $this->master->lihat_data('tbl_karya','id_karya', $id_karya);
		$data['pengguna'] = $this->master->masterpengguna();
		$data['kategori'] = $this->master->masterkategori();
		$this->load->view('/edit_karya', $data);
	}
	public function tambah_karya(){;
		$id_pengguna = $this->session->userdata('id_pengguna');
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
			  window.location.href='".base_url('/app')."';	
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
			  window.location.href='".base_url('/app')."';	
			  } ,2100); 
			 </script>"; 
			}
	}
	public function simpan_karya($id_karya){
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('app')."' </script>";
		}
		$id_pengguna = $this->session->userdata('id_pengguna');
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
			  window.location.href='".base_url('/app/profile')."';	
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
			  window.location.href='".base_url('/app/profile')."';	
			  } ,2100); 
			 </script>"; 
		}
	}
	public function hapus_karya($id_karya){
		if($id_karya == ""){
			echo "<script>window.location.href='".base_url('/app/profile')."' </script>";
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
			  window.location.href='".base_url('/app/profile/')."';	
			  } ,2100); 
			 </script>"; 
		
	
	}
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
	public function rating($id_karya, $id_pengguna){;
		$jumlahrating = $this->input->post('jumlahrating');
		$tglrating = date('20y-m-d');
		$id_penggunadari = $this->session->userdata('id_pengguna');
		
		//
		$data = array('id_karya' => $id_karya,
					  'id_pengguna' => $id_pengguna,
					  'jumlahrating' => $jumlahrating,
					  'tglrating' => $tglrating,
					  'id_penggunadari' => $id_penggunadari);
		$ekz = $this->master->tambah_data('tbl_rating', $data);
		redirect(base_url('app'));
	}
}
