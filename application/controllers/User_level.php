<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_level extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
 		parent::__construct();

 		if($this->session->userdata('status')!="login"){
 			redirect(base_url().'login');
 		}else if($this->session->userdata('active')!="Y"){
 			redirect(base_url().'login?alert=inactive');
 		}
 	}
	public function index()
	{
		$data['userlevel'] = $this->db->query("select * from tbl_userlevel")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('user_level',$data);
		$this->load->view('include/footer');
	}
	public function update_akses(){
		$chk = $_POST['value_data'];
		if($chk=='true'){ 
			$val = 'Y';
		}else{
			$val = 'N';
		}
		$id = $_POST['id_data'];
		$nm_akses = $_POST['type_data'];
		$sql=$this->db->query("UPDATE tbl_akses_menu set $nm_akses = '$val' where id=$id;");
	}
	public function add_level()
	{
		$namalevel = $_POST['nama_level'];

		$cek = $this->db->query("select id_level from tbl_userlevel where nama_level='$namalevel'")->row();

		$insert_userlevel = $this->db->query("INSERT INTO `tbl_userlevel` (`nama_level`) VALUES ('$namalevel');");
		$get_last_id = $this->db->query("select id_level from tbl_userlevel where nama_level='$namalevel'")->row();
		$id_level = $get_last_id->id_level;
		$insert_akses = $this->db->query("INSERT INTO `tbl_akses_menu` select NULL id,'$id_level' id_level,id_menu,'N' view_level,'N' add_level,'N' edit_level,'N' delete_level from tbl_menu join tbl_userlevel where nama_level = '$namalevel'");

		if($cek){
			header("location:".base_url()."user_level?alert=already");
		}else if($insert_akses){
			header("location:".base_url()."user_level?alert=success");
		}else{
			header("location:".base_url()."user_level?alert=failed");
		}
	}
}
