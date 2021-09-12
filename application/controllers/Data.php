<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

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
		if(isset($_GET['create_from'])){
			$create_from = " and created_date > '".$_GET['create_from']." 00:00:00'";
		}else{
			$create_from = "";
		}

		if(isset($_GET['create_to'])){
			$create_to = " and created_date <= '".$_GET['create_to']." 23:59:59'";
		}else{
			$create_to = "";
		}

		if(isset($_GET['req_from'])){
			$req_from = " and requested_date >= '".$_GET['req_from']."'";
		}else{
			$req_from = "";
		}

		if(isset($_GET['req_to'])){
			$req_to = " and requested_date <= '".$_GET['req_to']."'";
		}else{
			$req_to = "";
		}

		if(isset($_GET['book_status'])){
			$book_stat = $_GET['book_status'];
			$imp_book = implode(',', $book_stat);
			$where_book = " and booking_status in (".$imp_book.")";
		}else{
			$where_book = "";
		}

		if(isset($_GET['part_status'])){
			$part_stat = $_GET['part_status'];
			$imp_part = implode(',', $part_stat);
			$where_part = " and part_status in (".$imp_part.")";
		}else{
			$where_part = "";
		}

		if(isset($_GET['freelancer'])){
			$freelancer = $_GET['freelancer'];
			$imp_fl = implode(',', $freelancer);
			$where_fl = " and freelancer in (".$imp_fl.")";
		}else{
			$where_fl = "";
		}
		$id_user = $this->session->userdata('id');					
		if($this->session->userdata("user_level")=='2'){					
			$get_freelancer_id = "and freelancer='$id_user'";
		}else{
			$get_freelancer_id = "";
		}
		$query = "	SELECT
					wo_id,sha1(wo_id) wo_id_sha1,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,date(created_date) created_date,requested_date,finish_date,mgp1.mgp_desc booking_status,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,mgp3.mgp_desc part_status,kb_kab_kot,ud_fullname freelancer_name
					FROM
					work_order
					LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
					LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
					LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
					left join user_data on ud_id = freelancer
					left join kota_kabupaten on kb_id = city
					WHERE
					1=1
					$get_freelancer_id
					";

		$where = $create_from.$create_to.$req_from.$req_to.$where_book.$where_part.$where_fl;
		$data['workorder'] = $this->db->query($query.$where." order by wo_id desc")->result();
		$data['kota'] = $this->db->query("select * from kota_kabupaten left join mr_country on mrc_id = kb_mrc_id")->result();
		$data['freelancer'] = $this->db->query("select * from user_data")->result();
		$data['booking_status'] = $this->db->query("select * from mr_global_param where mgp_slug='booking-status'")->result();
		$data['part_status'] = $this->db->query("select mgp_code_id,mgp_desc parts_status from mr_global_param where mgp_slug = 'part-status'")->result();
		$data['failure_code'] = $this->db->query("select * from mr_global_param where mgp_slug='failure-code'")->result();
		$data['delay_code'] = $this->db->query("select * from mr_global_param where mgp_slug='delay-code'")->result();


		$url = $this->uri->segment(1);
		$menu = $this->db->query("select id_menu from tbl_menu where link = '$url'")->row()->id_menu;
		$level = $this->session->userdata('user_level');
		$data['akses_menu'] = $this->db->query("select view_level,add_level,edit_level,delete_level from tbl_akses_menu where id_level = $level and id_menu = $menu")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('tables',$data);
		$this->load->view('include/footer');
	}
	public function add_wo(){
		$wo_number = $_POST['wo_number'];
		$freelancer = $_POST['freelancer'];
		$case_id = $_POST['case_id'];
		$wo_desc = $_POST['wo_desc'];
		$prod_desc = $_POST['prod_desc'];
		$asset_serial = $_POST['asset_serial'];
		$company_name = $_POST['company_name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$customer_name = $_POST['customer_name'];
		$contact_phone = $_POST['contact_phone'];
		$request_date = $_POST['request_date'];
		$part_number = $_POST['part_number'];
		$part_desc = $_POST['part_desc'];
		$igso_number = $_POST['igso_number'];
		$link = $_POST['link'];

		$query = $this->db->query("INSERT INTO `work_order` (`wo_number`, `freelancer`, `case_id`, `wo_desc`, `product_desc`, `asset_serial`, `company_name`, `address`, `city`, `contact_name`, `contact_phone`, `created_date`, `requested_date`, `booking_status`, `part_number`, `part_desc`, `igso_number`, `part_status`,`link`) VALUES ('$wo_number', '$freelancer', '$case_id', '$wo_desc', '$prod_desc', '$asset_serial', '$company_name', '$address', '$city', '$customer_name', '$contact_phone', NOW(), '$request_date', 1, '$part_number', 'part_desc', '$igso_number', 1,'$link');");

		if($query){
			header("location:".base_url()."data?alert=add_success");
		}else{
			header("location:".base_url()."data?alert=failed");
		}
	}

	public function get_data(){
		if($_REQUEST['id_data']) {
		$id = $_REQUEST['id_data'];
		$data = $this->db->query("SELECT
								wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status, booking_status book_status_id,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,failure_code failure_code_id,mgp3.mgp_desc part_status,part_status part_status_id,kb_kab_kot,ud_fullname freelancer_name,delay_code,visit,link,comment,mgp4.mgp_desc delay_code_name
								FROM
								work_order
								LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
								LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
								LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
								LEFT JOIN mr_global_param mgp4 ON delay_code = mgp4.mgp_code_id and mgp4.mgp_slug = 'delay-code' 
								left join user_data on ud_id = freelancer
								left join kota_kabupaten on kb_id = city
								where
								wo_id = $id 
								order by
								wo_id desc
								")->row();
		echo json_encode($data);
		} else {
			echo 0;	
		}
	}
	public function edit_wo(){
		$id = $_GET['id_wo'];
		$data['det_wo'] = $this->db->query("SELECT
								wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status, booking_status book_status_id,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,failure_code failure_code_id,mgp3.mgp_desc part_status,part_status part_status_id,kb_kab_kot,ud_fullname freelancer_name,delay_code,visit,link,comment,mgp4.mgp_desc delay_code_name,city
								FROM
								work_order
								LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
								LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
								LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
								LEFT JOIN mr_global_param mgp4 ON delay_code = mgp4.mgp_code_id and mgp4.mgp_slug = 'delay-code' 
								left join user_data on ud_id = freelancer
								left join kota_kabupaten on kb_id = city
								where
								sha1(wo_id) = '$id'
								order by
								wo_id desc
								")->result();
		$data['kota'] = $this->db->query("select * from kota_kabupaten")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('edit_wo',$data);
		$this->load->view('include/footer');
	}
	public function edit_wo_act(){
		$id = $_POST['id_data'];
		$wo_number = $_POST['wo_number'];
		$case_id = $_POST['case_id'];
		$wo_desc = $_POST['wo_desc'];
		$prod_desc = $_POST['prod_desc'];
		$asset_serial = $_POST['asset_serial'];
		$company_name = $_POST['company_name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$contact_name = $_POST['customer_name'];
		$contact_phone = $_POST['contact_phone'];
		$request_date = $_POST['request_date'];
		$part_number = $_POST['part_number'];
		$part_desc = $_POST['part_desc'];
		$igso_number = $_POST['igso_number'];
		$visit = $_POST['visit'];
		$link = $_POST['link'];
		$comment = $_POST['comment'];

		$query = $this->db->query("UPDATE `work_order` SET `wo_number` = '$wo_number', `case_id` = '$case_id', `wo_desc` = '$wo_desc', `product_desc` = '$prod_desc', `asset_serial` = '$asset_serial', `company_name` = '$company_name', `address` = '$address', `city` = '$city', `contact_name` = '$contact_name', `contact_phone` = '$contact_phone', `created_date` = NOW(), `requested_date` = '$request_date', `part_number` = '$part_number', `part_desc` = '$part_desc', `igso_number` = '$igso_number', `visit` = '$visit', `link` = '$link', `comment` = '$comment' WHERE sha1(wo_id) = '$id';");
		if($query){
			header("location:".base_url()."data?alert=edit_success");
		}else{
			header("location:".base_url()."data?alert=failed");
		}


	}
	public function delete_data(){
		$id = $_GET['id'];

		$query = $this->db->query("DELETE from work_order where wo_id = $id");
		header("location:".base_url()."data?alert=del_success");
	}
	public function update_book_status(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set booking_status=$value where wo_id=$id");
	}	
	public function update_failure_code(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set failure_code=$value where wo_id=$id");
	}	
	public function update_delay_code(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set delay_code=$value where wo_id=$id");
	}	
}
