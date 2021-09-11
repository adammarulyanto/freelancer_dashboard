<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');
	}
	public function login_act()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$cek = $this->db->query("SELECT *,ifnull(ud_picture,'default.png') ava from user_data left join tbl_userlevel on id_level = ud_id_level where ud_username = '$username' and ud_password=sha1('$password')")->row();

		if($cek){
			$getmenu = $this->db->query("SELECT link from tbl_menu tm left join tbl_akses_menu tam on tam.id_menu = tm.id_menu where id_level = $cek->id_level and view_level='Y' limit 1")->row();
			$intial = preg_split("/\s+/", $cek->ud_fullname);
			$session = array(
				'id' 		=> $cek->ud_id,
				'nama'		=> $cek->ud_fullname,
				'user_level'		=> $cek->ud_id_level,
				'nama_level'		=> $cek->nama_level,
				'active'		=> $cek->ud_is_active,
				'avatar'		=> $cek->ava,
				'status'	=> 'login'
			);
			$this->session->set_userdata($session);
			header("location:".base_url()."/".$getmenu->link);
		}else{
			header("location:".base_url()."login?alert=failed");
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}

