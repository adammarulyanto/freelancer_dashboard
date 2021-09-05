<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['parts_status'] = $this->db->query("SELECT
									count(case when part_status=1 then 1 end) waitpart,
									count(case when part_status=2 then 1 end) pickup,
									count(case when part_status=3 then 1 end) escalation,
									count(case when part_status=4 then 1 end) additionalpart,
									count(case when part_status=5 then 1 end) return_part,
									count(case when part_status=6 then 1 end) completed
									FROM
									work_order
									LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'part-status' 
									left join user_data on ud_id = freelancer")->result();
		$data['booking_status'] = $this->db->query("	SELECT
									count(case when booking_status=1 then 1 end) acknowledge,
									count(case when booking_status=2 then 1 end) onsite,
									count(case when booking_status=3 then 1 end) completed,
									count(case when booking_status=4 then 1 end) requested_to_cancel,
									count(case when booking_status=5 then 1 end) canceled,
									count(case when booking_status=6 then 1 end) reassign,
									count(case when booking_status=7 then 1 end) reschedule
									FROM
									work_order
									LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
									left join user_data on ud_id = freelancer")->result();
		$data['coverage_area'] = $this->db->query("SELECT kb_kab_kot,count(*) jml FROM `work_order` left join kota_kabupaten on kb_id = city GROUP BY 1")->result();
		$data['untilthismonth'] = $this->db->query("select date_format(date,'%b') bulan from dates where date BETWEEN '2021-01-01' and curdate() GROUP BY 1 ORDER BY date_format(date,'%m')")->result();
		$data['monthly_achive'] = $this->db->query("SELECT
													mgp_desc,group_concat(jml order by orderby) jml, case booking_status when 3 then '#27ae60' when 5 then '#2980b9' when 6 then '#c0392b' end border_color
													from (
													select
													dates.bulan,mgp.mgp_desc,ifnull(jml,0) jml,orderby,mgp_code_id booking_status
													from
													(select date_format(date,'%b') bulan,date_format(date,'%m') orderby from dates where date BETWEEN '2021-01-01' and curdate() GROUP BY 1 ORDER BY date_format(date,'%m')) dates
													join (select mgp_code_id,mgp_desc from mr_global_param where mgp_slug = 'booking-status' and mgp_code_id in (3,5,6)  ORDER BY mgp_code_id) mgp
													left join (select mgp_desc,date_format(created_date,'%b') bulan,date_format(created_date,'%m') urutan,count(*) jml,created_date from `work_order` left join mr_global_param on mgp_slug = 'booking-status' and booking_status = mgp_code_id where booking_status in (3,5,6) GROUP BY 1,2 ORDER BY urutan)datas on dates.bulan = datas.bulan and datas.mgp_desc = mgp.mgp_desc
													ORDER BY
													mgp_desc,orderby)db
													where
													mgp_desc is not null
													GROUP BY
													1")->result();
		$data['ce_achivement'] = $this->db->query("	SELECT
													freelancer,group_concat(jml order by orderby) jml
													from (
													select
													dates.bulan,freelancer,ifnull(jml,0) jml,orderby
													from
													(select date_format(date,'%b') bulan,date_format(date,'%m') orderby from dates where date BETWEEN '2021-01-01' and curdate() GROUP BY 1 ORDER BY date_format(date,'%m')) dates
													join (select ud_fullname freelancer from user_data) ud
													left join (select ud_fullname,date_format(created_date,'%b') bulan,date_format(created_date,'%m') urutan,count(*) jml,created_date from `work_order` left join user_data on ud_id = freelancer GROUP BY 1,2 ORDER BY urutan)datas on dates.bulan = datas.bulan and ud_fullname = freelancer
													ORDER BY
													orderby)db
													where
													freelancer is not null
													GROUP BY
													1")->result();
		$data['delay_code'] = $this->db->query("	SELECT
													mgp_desc,group_concat(jml order by orderby) jml
													from (
													select
													dates.bulan,mgp_desc,ifnull(jml,0) jml,orderby,mgp_code_id
													from
													(select date_format(date,'%b') bulan,date_format(date,'%m') orderby from dates where date BETWEEN '2021-01-01' and curdate() GROUP BY 1 ORDER BY date_format(date,'%m')) dates
													join (select mgp_code_id,mgp_desc from mr_global_param where mgp_slug = 'delay-code' ORDER BY mgp_code_id) mgp
													left join (select delay_code,date_format(created_date,'%b') bulan,date_format(created_date,'%m') urutan,count(*) jml,created_date from `work_order` GROUP BY 1,2 ORDER BY urutan)datas on dates.bulan = datas.bulan and delay_code = mgp_code_id
													ORDER BY
													orderby,mgp_code_id)db
													where
													mgp_desc is not null
													GROUP BY
													1
													ORDER BY
													mgp_code_id")->result();
		$this->load->view('include/header');
		$this->load->view('include/menu');
		$this->load->view('dashboard',$data);
		$this->load->view('include/footer');
	}
}
