<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model{
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah	
	}
	//GLOBAL FUNCTIONS
	public function lihat_data($tabel, $kolom, $id_nya){
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($kolom, $id_nya);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function simpan_data($tabel,$kolom, $id_nya, $data)
	{
		$this->db->where($kolom, $id_nya);
		$this->db->update($tabel, $data);
		return true;
	}
	public function hapus_data($tabel, $kolom, $id_nya){
		$this->db->where($kolom, $id_nya);
		$this->db->delete($tabel);
	}
	public function tambah_data($namatabel, $data)
	{
		$jalan = $this->db->insert($namatabel, $data);
		return $jalan;
	}
	//
	//kategori
	public function page_kategori(){
        $query =$this->db->query("SELECT * FROM `tbl_kategori`");
        return $query->num_rows();
	}
	public function data_kategori($dari, $sampai){
		//return $query = $this->db->get('pembayaran',$dari,$sampai)->result();
		if($this->uri->segment(3)==null){
			$sampai = 0;
		}
		else{
			$sampai = $from = $this->uri->segment(3);
		}
        $query =$this->db->query("SELECT * FROM `tbl_kategori` order by id_kategori DESC LIMIT $sampai, $dari ");
        return $query->result();	
	}
	////
	//karya
	public function page_karya(){
        $query =$this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = tbl_pengguna.id_pengguna");
        return $query->num_rows();
	}
	public function data_karya($dari, $sampai){
		//return $query = $this->db->get('pembayaran',$dari,$sampai)->result();
		if($this->uri->segment(3)==null){
			$sampai = 0;
		}
		else{
			$sampai = $from = $this->uri->segment(3);
		}
        $query =$this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = tbl_pengguna.id_pengguna order by id_karya DESC LIMIT $sampai, $dari ");
        return $query->result();	
	}
	////
	public function masterpengguna(){
        $query =$this->db->query("SELECT * FROM `tbl_pengguna`");
        return $query->result();
	}
	public function masterkategori(){
        $query =$this->db->query("SELECT * FROM `tbl_kategori`");
        return $query->result();
	}
	//pengguna
	public function page_pengguna(){
        $query =$this->db->query("SELECT * FROM `tbl_pengguna`");
        return $query->num_rows();
	}
	public function data_pengguna($dari, $sampai){
		//return $query = $this->db->get('pembayaran',$dari,$sampai)->result();
		if($this->uri->segment(3)==null){
			$sampai = 0;
		}
		else{
			$sampai = $from = $this->uri->segment(3);
		}
        $query =$this->db->query("SELECT * FROM `tbl_pengguna` order by id_pengguna DESC LIMIT $sampai, $dari ");
        return $query->result();	
	}
	////
	public function cekmasuk($data) {
		$perintahmasuk = $this->db->get_where('tbl_admin', $data);
		return $perintahmasuk;
	}
	public function dataakunadmin($username) {
		$query =$this->db->query("SELECT * FROM `tbl_admin` where username = '$username'");
        return $query->result();
	}
	//pengguna
	public function profile() {
		$id_pengguna = $this->session->userdata('id_pengguna');
		$query = $this->db->query("SELECT * FROM `tbl_pengguna` where id_pengguna = '$id_pengguna'");
		return $query->result();
	}
	//karya
	public function page_karyapengguna(){
		$id_pengguna = $this->session->userdata('id_pengguna');
        $query =$this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = '$id_pengguna' and tbl_pengguna.id_pengguna = '$id_pengguna'");
        return $query->num_rows();
	}
	public function data_karyapengguna($dari, $sampai){
		$id_pengguna = $this->session->userdata('id_pengguna');
		//return $query = $this->db->get('pembayaran',$dari,$sampai)->result();
		if($this->uri->segment(3)==null){
			$sampai = 0;
		}
		else{
			$sampai = $from = $this->uri->segment(3);
		}
        $query =$this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = '$id_pengguna' and tbl_pengguna.id_pengguna = '$id_pengguna' order by id_karya DESC LIMIT $sampai, $dari ");
        return $query->result();	
	}
	////
	public function cekmasukpengguna($data) {
		$perintahmasuk = $this->db->get_where('tbl_pengguna', $data);
		return $perintahmasuk;
	}
	public function dataakunpengguna($username) {
		$query =$this->db->query("SELECT * FROM `tbl_pengguna` where username = '$username'");
        return $query->result();
	}
	
	//USER
	public function page_user(){
        $query =$this->db->query("SELECT * FROM `tbl_admin`");
        return $query->num_rows();
	}
	public function data_user($dari, $sampai){
		//return $query = $this->db->get('pembayaran',$dari,$sampai)->result();
		if($this->uri->segment(3)==null){
			$sampai = 0;
		}
		else{
			$sampai = $from = $this->uri->segment(3);
		}
        $query =$this->db->query("SELECT * FROM `tbl_admin` order by id_admin DESC LIMIT $sampai, $dari ");
        return $query->result();	
	}
	public function edit_user($id_user) {
		$query =$this->db->query("SELECT * FROM `tbl_admin` where id_admin ='$id_user'");
        return $query->result();
	}
	public function tambah_user($data){
		$eksekusi = $this->db->insert('tbl_admin', $data);
		return $eksekusi;
	}
	public function simpan_user($data, $id_user){
		$this->db->where('id_admin', $id_user);
		$this->db->update('tbl_admin', $data);
		return true;
			
	}
	public function hapus_user($id_user){
        $query =$this->db->query("DELETE FROM `tbl_admin` where id_admin = ".$this->db->escape($id_user));
        return $query;
	}
	public function cekrating($id_karya) {
		$id_penggunadari = $this->session->userdata('id_pengguna');
		$query =$this->db->query("SELECT * FROM `tbl_rating` where id_karya = '$id_karya' and id_penggunadari= '$id_penggunadari' ");
        return $query->num_rows();
	}
	public function karyarating($id_karya){
		$id_pengguna = $this->session->userdata('id_pengguna');
        $query =$this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = '$id_pengguna' and tbl_pengguna.id_pengguna = '$id_pengguna' and id_karya ='$id_karya'");
        return $query->result();
	}
	public function lihatrating($id_karya){
		
        $query =$this->db->query("SELECT * FROM tbl_rating,  tbl_pengguna where tbl_rating.id_karya = '$id_karya'  and id_penggunadari = tbl_pengguna.id_pengguna");
        return $query->result();
	}
	public function cetak_laporan($dari_tanggal, $sampai_tanggal)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_karya`, tbl_kategori, tbl_pengguna where tbl_karya.id_kategori = tbl_kategori.id_kategori and tbl_karya.id_pengguna = tbl_pengguna.id_pengguna and tbl_karya.tglkarya >= '$dari_tanggal' and tbl_karya.tglkarya <= '$sampai_tanggal' ");
		return $jalan->result();
	}
}