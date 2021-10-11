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
		if(isset($_GET['wo_number'])){
			$wo_number = " and wo_number = '".$_GET['wo_number']."'";
		}else{
			$wo_number = "";
		}
		if(isset($_GET['case_id'])){
			$case_id = " and case_id = '".$_GET['case_id']."'";
		}else{
			$case_id = "";
		}
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

		if(isset($_GET['city_filter'])){
			$city = $_GET['city_filter'];
			$imp_city = implode(',', $city);
			$where_city = " and city in (".$imp_city.")";
		}else{
			$where_city = "";
		}

		if(isset($_GET['country'])){
			$country = $_GET['country'];
			$imp_con = implode(',', $country);
			$where_con = " and mrc_id in (".$imp_con.")";
		}else{
			$where_con = "";
		}

		$query = "	SELECT
					wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date, booking_status,part_number,part_desc,igso_number,failure_code,part_status,ud_fullname,ifnull(ud_picture,'default.png') ud_picture,city,mrc_id
					FROM
					work_order
					LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
					LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
					LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status'
					left join kota_kabupaten on kb_id = city
					left join mr_country on mrc_id = kb_mrc_id
					left join user_data on ud_id = freelancer
					";
		$id_user = $this->session->userdata('id');					
		if($this->session->userdata("user_level")=='2'){					
			$get_freelancer_id = "and freelancer='$id_user'";
		}else{
			$get_freelancer_id = "";
		}
		$where = $wo_number.$case_id.$create_from.$create_to.$req_from.$req_to.$where_book.$where_part.$where_fl.$where_city.$where_con;;
		
		$data['waitpart'] = $this->db->query($query."where part_status = 1 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_waitpart'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 1 ".$get_freelancer_id.$where)->result();
		
		// $data['partpickup'] = $this->db->query($query."where part_status = 2 ".$get_freelancer_id.$where." order by created_date")->result();
		// $data['cnt_partpickup'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 2 ".$get_freelancer_id.$where)->result();
		
		$data['escalation'] = $this->db->query($query."where part_status = 3 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_escalation'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 3 ".$get_freelancer_id.$where)->result();
		
		$data['partreturn'] = $this->db->query($query."where part_status = 5 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_partreturn'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 5 ".$get_freelancer_id.$where)->result();

		$data['in_progress'] = $this->db->query($query."where part_status = 8 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_inprogress'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 8 ".$get_freelancer_id.$where)->result();

		$data['wo_completed'] = $this->db->query($query."where part_status = 6 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_wocompleted'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 6 ".$get_freelancer_id.$where)->result();

		$data['wo_waitingfse'] = $this->db->query($query."where part_status = 10 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_wowaitingfse'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 10 ".$get_freelancer_id.$where)->result();

		$data['wop_waitingfse'] = $this->db->query($query."where part_status = 11 ".$get_freelancer_id.$where." order by created_date")->result();
		$data['cnt_wopwaitingfse'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 11 ".$get_freelancer_id.$where)->result();

		$data['part_status'] = $this->db->query("select mgp_code_id,mgp_desc parts_status from mr_global_param where mgp_slug = 'part-status'")->result();
		$data['freelancer'] = $this->db->query("select * from user_data left join tbl_userlevel on id_level = ud_id_level where id_level=2 or lower(nama_level) like '%freelancer%' group by ud_id")->result();
		$data['booking_status'] = $this->db->query("select * from mr_global_param where mgp_slug='booking-status'")->result();
		$data['failure_code'] = $this->db->query("select * from mr_global_param where mgp_slug='failure-code'")->result();
		$data['delay_code'] = $this->db->query("select * from mr_global_param where mgp_slug='delay-code'")->result();


		$data['city_filter'] = $this->db->query("select * from kota_kabupaten where kb_active = 'Y'")->result();
		$data['country'] = $this->db->query("select * from mr_country")->result();

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
		if($value=='11'){
			$booking_status = ',booking_status=1';
		}else if($value=='10'){
			$booking_status = ',booking_status=1';
		}else if($value=='1'){
			$booking_status = ',booking_status=1';
		}else if($value=='8'){
			$booking_status = ',booking_status=2';
		}else if($value=='3'){
			$booking_status = ',booking_status=7';
		}else if($value=='6'){
			$booking_status = ',booking_status=3, finish_date=NOW()';
		}else if($value=='5'){
			$booking_status = ',booking_status=3';
		}else if($value=='12'){
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
	public function update_finish_date(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set finish_date='$value' where wo_id=$id");
	}
	public function update_visit(){
		$value = $_POST['value_data'];
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set visit='$value' where wo_id=$id");
	}
	public function get_data(){
		if($_REQUEST['id_data_card']) {
		$id = $_REQUEST['id_data_card'];
		$data = $this->db->query("SELECT
								wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,part_status,kb_kab_kot,ud_fullname freelancer_name,ifnull(group_concat(ta_filename order by ta_id),'EMPTY') attachment,ifnull(group_concat(ta_id order by ta_id),'EMPTY') attachment_id,link_freelancer,visit
								FROM
								work_order
								LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
								LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
								LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
								left join user_data on ud_id = freelancer
								left join kota_kabupaten on kb_id = city and kb_active = 'Y'
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
		$file = $_FILES['attachment']['name'];
		$max_size = 1024*2000;
		$file_amount = count($file)-1;
		$target_dir = getcwd()."/assets/img/attachment/";
		for ($i = 0; $i <= $file_amount; $i++) {
			if($_FILES['attachment']['size'][$i]>=$max_size+1){
			redirect(base_url()."fl_task?alert=size_limit");
			}
		}
		for ($i = 0; $i <= $file_amount; $i++) {
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($file[$i],PATHINFO_EXTENSION));
			$basename = $i.date("YmdHms").'.'.$imageFileType;
			$target_file = $target_dir.$basename;

			$upload = move_uploaded_file($_FILES["attachment"]["tmp_name"][$i], $target_file);
			$this->db->query("INSERT INTO task_attachment (ta_wo_id,ta_filename) values ('$id','$basename')");
		}
		if ($upload) {
			redirect(base_url()."fl_task?alert=success");
		} else {
			redirect(base_url()."fl_task?alert=failed");
		}
	}
	public function delete_attachment(){
		$id = $_GET['id'];
		$get_filename = $this->db->query("SELECT ta_filename FROM task_attachment where ta_id = $id")->result();
		foreach($get_filename as $gf){
    		$filename = getcwd()."/assets/img/attachment/".$gf->ta_filename;
    		$unlink = unlink($filename);
    		if ($unlink) {
    			$query = $this->db->query("DELETE FROM task_attachment where ta_id = $id");
    			header("location:".base_url()."fl_task?alert=success");
    		} else {
    			header("location:".base_url()."fl_task?alert=failed");
    		}
		}
		// header("location:".base_url()."fl_task");
		
	}
}
