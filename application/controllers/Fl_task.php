<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fl_task extends CI_Controller {

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
			$req_from = " and request_date >= '".$_GET['req_from']."' 00:00:00";
		}else{
			$req_from = "";
		}

		if(isset($_GET['req_to'])){
			$req_to = " and request_date <= '".$_GET['req_to']."' 23:59:59";
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
			$where_part = "and part_status in (".$imp_part.")";
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

		$query = "	SELECT
					wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date, booking_status,part_number,part_desc,igso_number,failure_code,part_status,ud_fullname,ifnull(ud_picture,'default.png') ud_picture
					FROM
					work_order
					LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
					LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
					LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status'
					left join user_data on ud_id = freelancer
					";
		$id_user = $this->session->userdata('id');					
		if($this->session->userdata("user_level")=='2'){					
			$get_freelancer_id = "and freelancer='$id_user'";
		}else{
			$get_freelancer_id = "";
		}
		$where = $create_from.$create_to.$req_from.$req_to.$where_book.$where_part.$where_fl;
		$data['waitpart'] = $this->db->query($query."where part_status = 1 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_waitpart'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 1 ".$get_freelancer_id.$where)->result();
		$data['partpickup'] = $this->db->query($query."where part_status = 2 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_partpickup'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 2 ".$get_freelancer_id.$where)->result();
		$data['escalation'] = $this->db->query($query."where part_status = 3 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_escalation'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 3 ".$get_freelancer_id.$where)->result();
		$data['partreturn'] = $this->db->query($query."where part_status = 5 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_partreturn'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 5 ".$get_freelancer_id.$where)->result();
		$data['part_status'] = $this->db->query("select mgp_code_id,mgp_desc parts_status from mr_global_param where mgp_slug = 'part-status'")->result();
		$data['freelancer'] = $this->db->query("select * from user_data")->result();
		$data['booking_status'] = $this->db->query("select * from mr_global_param where mgp_slug='booking-status'")->result();
		$data['failure_code'] = $this->db->query("select * from mr_global_param where mgp_slug='failure-code'")->result();
		$data['delay_code'] = $this->db->query("select * from mr_global_param where mgp_slug='delay-code'")->result();

		if(isset($_POST['id_wo'])){
			$id = $_POST['id_wo'];
			$data['attachment'] = $this->db->query("select * from task_attachment where ta_wo_id = $id")->result();
 			exit;
		}

		$url = $this->uri->segment(1);
		$menu = $this->db->query("select id_menu from tbl_menu where link = '$url'")->row()->id_menu;
		$level = $this->session->userdata('user_level');
		$data['akses_menu'] = $this->db->query("select view_level,edit_level,delete_level from tbl_akses_menu where id_level = $level and id_menu = $menu")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('freelancer_task',$data);
		$this->load->view('include/footer');
	}
	public function update_status(){
		$value = $_POST['value_data'];
		if($value=='1'){
			$booking_status = ',booking_status=1';
		}else if($value=='2'){
			$booking_status = ',booking_status=2';
		}else if($value=='3'){
			$booking_status = ',booking_status=7';
		}else if($value=='5'){
			$booking_status = ',booking_status=3';
		}else{
			$booking_status='';
		}
		$set_book_status = $booking_status;
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set part_status=$value$set_book_status where wo_id=$id");
	}
	public function update_freelancer(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set freelancer=$value where wo_id=$id");
	}
	public function get_data(){
		if($_REQUEST['id_data_card']) {
		$id = $_REQUEST['id_data_card'];
		$data = $this->db->query("SELECT
								wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,part_status,kb_kab_kot,ud_fullname freelancer_name,ifnull(group_concat(ta_filename order by ta_id),'EMPTY') attachment,ifnull(group_concat(ta_id order by ta_id),'EMPTY') attachment_id
								FROM
								work_order
								LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
								LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
								LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
								left join user_data on ud_id = freelancer
								left join kota_kabupaten on kb_id = city
								left join task_attachment on ta_wo_id = wo_id
								where
								wo_id = $id 
								group by
								wo_id
								order by
								wo_id desc
								")->row();
		echo json_encode($data);
		} else {
			echo 0;	
		}
	}
	public function add_atc(){
		if ( 0 < $_FILES['file']['error'] ) {
        	echo 'Error: ' . $_FILES['file']['error'] . '<br>';
	    }
	    else {
	        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
	    }
	    $value = $_FILES['file']['tmp_name'];
		$id = $_POST['id_data'];


		$query = $this->db->query("INSERT INTO task_attachment ('ta_wo_id','ta_filename') values ($id,'$value');");
	}
	public function upload_attachment(){
		$id = $_POST['id_wo'];
		$target_dir = getcwd()."/assets/img/attachment/";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES['attachment']['name'],PATHINFO_EXTENSION));
		$basename = date("YmdHms").'.'.$imageFileType;
		$target_file = $target_dir.$basename;

		if ($uploadOk == 0) {
			echo "<script type='text/javascript'>window.alert('Error.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";	
		}else {
			$upload = move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);
			if ($upload) {
				$this->db->query("INSERT INTO task_attachment (ta_wo_id,ta_filename) values ('$id','$basename')");
				redirect(base_url()."fl_task?alert=success");
			} else {
				redirect(base_url()."fl_task?alert=failed");
			}
		}
	}
	public function delete_attachment(){
		$id = $_GET['id'];
		$get_filename = $this->db->query("SELECT ta_filename FROM task_attachment where ta_id = $id")->result();
		foreach($get_filename as $gf){
    		$filename = base_url()."assets/img/attachment/".$gf->ta_filename;
    		$query = $this->db->query("DELETE FROM task_attachment where ta_id = $id");
    		if ($query) {
    			header("location:".base_url()."fl_task?alert=success");
    		} else {
    			header("location:".base_url()."fl_task?alert=failed");
    		}
		}
		header("location:".base_url()."fl_task");
		
	}
}
