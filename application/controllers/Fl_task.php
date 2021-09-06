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
		$query = "	SELECT
					wo_id,wo_number,freelancer,case_id,wo_desc,product_desc,asset_serial,company_name,address,contact_name,contact_phone,created_date,requested_date,finish_date, booking_status,part_number,part_desc,igso_number,failure_code,part_status,ud_fullname
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
		$data['waitpart'] = $this->db->query($query."where part_status = 1 ".$get_freelancer_id." order by created_date")->result();
		$data['cnt_waitpart'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 1 ".$get_freelancer_id)->result();
		$data['partpickup'] = $this->db->query($query."where part_status = 2 ".$get_freelancer_id." order by created_date")->result();
		$data['cnt_partpickup'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 2 ".$get_freelancer_id)->result();
		$data['escalation'] = $this->db->query($query."where part_status = 3 ".$get_freelancer_id." order by created_date")->result();
		$data['cnt_escalation'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 3 ".$get_freelancer_id)->result();
		$data['partreturn'] = $this->db->query($query."where part_status = 5 ".$get_freelancer_id." order by created_date")->result();
		$data['cnt_partreturn'] = $this->db->query("select count(*) cnt from (".$query.") db where part_status = 5 ".$get_freelancer_id)->result();
		$data['part_status'] = $this->db->query("select mgp_code_id,mgp_desc parts_status from mr_global_param where mgp_slug = 'part-status' and mgp_code_id in (1,2,3,5)")->result();
		$data['freelancer'] = $this->db->query("select * from user_data")->result();

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
		$id = $_POST['id_data'];
		$sql=$this->db->query("UPDATE work_order set part_status=$value where wo_id=$id");
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
}
