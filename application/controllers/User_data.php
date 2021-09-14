<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_data extends CI_Controller {

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
		$data['users'] = $this->db->query("select *,ifnull(if(ud_picture='0',NULL,ud_picture),'default.png') ava from user_data left join tbl_userlevel on id_level = ud_id_level")->result();
		$data['level'] = $this->db->query("select * from tbl_userlevel")->result();

		
		$url = $this->uri->segment(1);
		$menu = $this->db->query("select id_menu from tbl_menu where link = '$url'")->row()->id_menu;
		$level = $this->session->userdata('user_level');
		$data['akses_menu'] = $this->db->query("select view_level,add_level,edit_level,delete_level from tbl_akses_menu where id_level = $level and id_menu = $menu")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('user_data',$data);
		$this->load->view('include/footer');
	}
	public function update_aktif_user(){
		$chk = $_POST['value_data'];
		if($chk=='true'){ 
			$val = 'Y';
		}else{
			$val = 'N';
		}
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE user_data set ud_is_active = '$val' where ud_id=$id;");
	}
	public function add_user()
	{
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['level'];
		$is_active = $_POST['is_active'];
		if($_FILES['avatar']['size'] == 0 && $_FILES['avatar']['error'] == 0){
			$target_dir = getcwd()."/assets/img/avatar_user/";
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
			$basename = "'".date("YmdHms").'.'.$imageFileType."'";
			$target_file = $target_dir.$basename;
			$upload = move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
		}else{
			$basename == 0;			
		}

		$sql = $this->db->query("INSERT INTO `user_data` (`ud_fullname`,`ud_email_address`, `ud_username`, `ud_password`, `ud_is_active`, `ud_id_level`,`ud_picture`) VALUES ('$fullname','$email','$username', sha1('$password'), '$is_active', $level,if($basename=0,$basename,NULL);");
		if($sql){
			header("location:".base_url()."user_data?alert=add_success");
		}else{
			header("location:".base_url()."user_data?alert=failed");
		}
	}
	public function update_data(){
		$id = $_POST['id_user'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$level = $_POST['level'];
		if(isset($_POST['password'])){
			$password = $_POST['password'];
			$pwd=",`ud_password` = sha1('$password')";
		}else{
			$pwd="";
		}
		$level = $_POST['level'];

		if(isset($_POST['is_active'])){
			$is_active=",ud_is_active='Y'";
		}else{
			$is_active=",ud_is_active='N'";
		}

		if(isset($_FILES['avatar']['name'])){
			$target_dir = getcwd()."/assets/img/avatar_user/";
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
			$basename = date("YmdHms").'.'.$imageFileType;
			$target_file = $target_dir.$basename;
			$upload = move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
			$update_ava = ",`ud_picture`='".$basename."'";
		}else{
			$update_ava = "";
		}

		$sql = $this->db->query("UPDATE `user_data` SET `ud_fullname` = '$fullname', `ud_email_address` = '$email', `ud_username` = '$username' $pwd$is_active, `ud_id_level` = $level $update_ava WHERE `ud_id` = $id;");
		if($sql){
			header("location:".base_url()."user_data?alert=update_success");
		}else{
			header("location:".base_url()."user_data?alert=failed");
		}
	}
}
