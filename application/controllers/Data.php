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
		$data['workorder'] = $this->db->query("	SELECT
												wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,mgp3.mgp_desc part_status,zip,kb_kab_kot,ud_fullname freelancer_name
												FROM
												work_order
												LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
												LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
												LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
												left join user_data on ud_id = freelancer
												left join kota_kabupaten on kb_id = city
												order by
												wo_id desc
												")->result();
		$data['kota'] = $this->db->query("select * from kota_kabupaten")->result();
		$data['freelancer'] = $this->db->query("select * from user_data")->result();


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
		$zip = $_POST['zip'];
		$customer_name = $_POST['customer_name'];
		$contact_phone = $_POST['contact_phone'];
		$request_date = $_POST['request_date'];
		$part_number = $_POST['part_number'];
		$part_desc = $_POST['part_desc'];
		$igso_number = $_POST['igso_number'];

		$query = $this->db->query("INSERT INTO `work_order` (`wo_number`, `freelancer`, `case_id`, `wo_desc`, `product_desc`, `asset_serial`, `company_name`, `address`, `city`, `contact_name`, `contact_phone`, `created_date`, `requested_date`, `booking_status`, `part_number`, `part_desc`, `igso_number`, `part_status`) VALUES ('$wo_number', '$freelancer', '$case_id', '$wo_desc', '$prod_desc', '$asset_serial', '$company_name', '$address', '$city', '$customer_name', '$contact_phone', NOW(), '$request_date', 1, '$part_number', 'part_desc', '$igso_number', 1);");

		header(base_url()."data?alert=success");
	}

	public function get_data(){
		if($_REQUEST['id_data']) {
		$id = $_REQUEST['id_data'];
		$data = $this->db->query("SELECT
								wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date,mgp1.mgp_desc booking_status,part_number,part_desc,igso_number,mgp2.mgp_desc failure_code,mgp3.mgp_desc part_status,zip,kb_kab_kot,ud_fullname freelancer_name
								FROM
								work_order
								LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
								LEFT JOIN mr_global_param mgp2 ON failure_code = mgp2.mgp_code_id and mgp2.mgp_slug = 'failure-code' 
								LEFT JOIN mr_global_param mgp3 ON part_status = mgp3.mgp_code_id and mgp3.mgp_slug = 'part-status' 
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
	public function delete_data(){
		$id = $_GET['id'];

		$query = $this->db->query("DELETE from work_order where wo_id = $id");
		header("location:".base_url()."data");
	}	
}
