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
		if(isset($_GET['year'])){
			$tahun = $_GET['year'];
		}else{
			$tahun = date('Y');
			$curdate = date('Y-m-d');
		}

		if(isset($_GET['create_from'])){
			$create_from = " and created_date > '".$_GET['create_from']." 00:00:00'";
			$date_from = " and date >= '".$_GET['create_from']."' ";
		}else{
			$create_from = "";
			$date_from = "";
		}

		if(isset($_GET['create_to'])){
			$create_to = " and created_date <= '".$_GET['create_to']." 23:59:59'";
			$date_to = " and date <= '".$_GET['create_to']."' ";
		}else{
			$create_to = "";
			$date_to = " and date <= '".$curdate."'";
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
		$where = "where 1=1".$create_from.$create_to.$req_from.$req_to.$where_book.$where_part.$where_fl.$where_city.$where_con;
		$where_date = "where 1=1".$date_from.$date_to;
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
									left join user_data on ud_id = freelancer
									left join kota_kabupaten on kb_id = city
									left join mr_country on mrc_id = kb_mrc_id
									".$where)->result();
		$data['booking_status'] = $this->db->query("	SELECT
									count(case when booking_status=1 then 1 end) acknowledge,
									count(case when booking_status=2 then 1 end) onsite,
									count(case when booking_status=3 then 1 end) completed,
									count(case when booking_status=4 then 1 end) requested_to_cancel,
									count(case when booking_status=5 then 1 end) canceled,
									count(case when booking_status=6 then 1 end) reassign,
									count(case when booking_status=7 then 1 end) reschedule,
									count(*) total_tiket
									FROM
									work_order
									LEFT JOIN mr_global_param mgp1 ON booking_status = mgp1.mgp_code_id and mgp1.mgp_slug = 'booking-status' 
									left join user_data on ud_id = freelancer
									left join kota_kabupaten on kb_id = city
									left join mr_country on mrc_id = kb_mrc_id
									".$where)->result();

		$data['book_status'] = $this->db->query("select * from mr_global_param where mgp_slug='booking-status'")->result();
		$data['part_status'] = $this->db->query("select mgp_code_id,mgp_desc parts_status from mr_global_param where mgp_slug = 'part-status'")->result();
		$data['freelancer'] = $this->db->query("select * from user_data")->result();
		$data['city_filter'] = $this->db->query("select * from kota_kabupaten")->result();
		$data['country'] = $this->db->query("select * from mr_country")->result();

		$data['city'] = $this->db->query("SELECT kb_id,replace(GROUP_CONCAT(kb_kab_kot),',','</th><th style=\'text-align:center\'>') city from kota_kabupaten order by kb_id")->result();
		$data['citypartstatus'] = $this->db->query("SELECT
													status_part,concat('<td style=\'text-align:center;\' class=\'heatmap\' data-id=',max_value,'>',replace(replace(GROUP_CONCAT(jumlah order by kb_id),',','</td><td style=\'text-align:center\' data-id=\'max-value\' class=\'heatmap\'>'),'max-value',max_value),'</td>') value_data
													from(
													select mgp_code_id,mgp_desc status_part, kb_kab_kot city,kb_id, ifnull(jml,0) jumlah from
													(select kb_id,kb_kab_kot from kota_kabupaten) kabkot
													join (select mgp_code_id,mgp_desc from mr_global_param where mgp_slug='part-status') ps
													left join (SELECT
														part_status,city,wo.part_status id_part_status,count(*) jml
													FROM
														work_order wo
														left join kota_kabupaten on kb_id = city
														left join mr_country on mrc_id = kb_mrc_id
													".$where."
													GROUP BY
													1,2
													ORDER BY
													1,2)wo on city = kb_id and part_status = mgp_code_id)datas
													join (	SELECT
															max(jumlah) max_value
															from(
															select mgp_code_id,mgp_desc status_part, kb_kab_kot city, ifnull(jml,0) jumlah from
															(select kb_id,kb_kab_kot from kota_kabupaten) kabkot
															join (select mgp_code_id,mgp_desc from mr_global_param where mgp_slug='part-status') ps
															left join (SELECT
																part_status,city,wo.part_status id_part_status,count(*) jml
															FROM
																work_order wo
																left join kota_kabupaten on kb_id = city
																left join mr_country on mrc_id = kb_mrc_id
															GROUP BY
															1,2
															ORDER BY
															1,2)wo on city = kb_id and part_status = mgp_code_id)datas
															ORDER BY
															mgp_code_id)a
													GROUP BY
													1
													ORDER BY
													mgp_code_id")->result();
		$data['cityachivement'] = $this->db->query("SELECT
														mrc_country country,
														kb_kab_kot city,
														kb_lat,
														kb_long,
														count(*) achivement,
														max_value
													FROM
														work_order
														LEFT JOIN kota_kabupaten ON kb_id = city
														LEFT JOIN mr_country ON mrc_id = kb_mrc_id 
														JOIN (
														select max(achivement) max_value from(
														SELECT
														mrc_country country,
														kb_kab_kot city,
														count(*) achivement 
													FROM
														work_order
														LEFT JOIN kota_kabupaten ON kb_id = city
														LEFT JOIN mr_country ON mrc_id = kb_mrc_id 
														".$where." 
													GROUP BY
														1,2)a)b 
													GROUP BY
														1,2")->result();
		$data['countryachovement'] = $this->db->query("SELECT
														country,group_concat(jml order by orderby) achivement
														from (
														select
														dates.bulan,mrc_country country,ifnull(jml,0) jml,orderby
														from
														(select date_format(date,'%b %y') bulan,date_format(date,'%Y%m') orderby from dates ".$where_date." GROUP BY 1 ORDER BY date_format(date,'%Y%m')) dates
														join (select mrc_id,mrc_country from mr_country where 1=1".$where_con.") ud
														left join (select kb_mrc_id,date_format(created_date,'%b %y') bulan,date_format(created_date,'%Y%m') urutan,count(*) jml,created_date from `work_order` left join kota_kabupaten on kb_id = city left join mr_country on mrc_id = kb_mrc_id ".$where." GROUP BY 1,2 ORDER BY urutan)datas on dates.bulan = datas.bulan and mrc_id = kb_mrc_id
														ORDER BY
														orderby)db
														where
														country is not null
														GROUP BY
														1")->result();
		$data['untilthismonth'] = $this->db->query("select date_format(date,'%b %y') bulan from dates ".$where_date." GROUP BY date_format(date,'%b %y') ORDER BY date_format(date,'%Y%m')")->result();
		$this->load->view('include/header',$data);
		$this->load->view('include/menu');
		$this->load->view('dashboard',$data);
		$this->load->view('include/footer');
	}
}
