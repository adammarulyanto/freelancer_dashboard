
<meta charset="UTF-8">
<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
<link rel="stylesheet" href="style.css">
<!-- Boxicons CDN Link -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <div class="menu-samping">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Dashboard</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
    <?php
    $url = $this->uri->segment(1);
    $idlevel  = $this->session->userdata['user_level'];
    $url = $this->uri->segment(1);
    $menu = $this->db->query("select * from tbl_menu where id_menu in (select id_menu from tbl_akses_menu where view_level = 'Y' and id_level =$idlevel) order by urutan asc,id_menu desc")->result();
    foreach ($menu as $menu){
    ?>
      <li>
        <a href="<?=base_url().$menu->link?>" class="<?php if($url=="<?=$menu->link?>"){echo 'active-menu';}?>">
          <i class='<?=$menu->icon?>'></i>
          <span class="links_name"><?=$menu->nama_menu?></span>
          <span class="tooltip"><?=$menu->nama_menu?></span>
        </a>
      </li>
    <?php
    }
    ?>
    <li>
      &nbsp;
    </li>
     <li class="profile">
         <div class="profile-details">
           <img src="https://cberry.net/assets/website/img/img-user.png" alt="profileImg">
           <div class="name_job">
             <div class="name"><?=$this->session->userdata("nama")?></div>
             <div class="job"><?=$this->session->userdata("nama_level")?></div>
           </div>
         </div>
         <a href="<?=base_url()?>login/logout" style="text-decoration: none;"><i class='bx bx-log-out' id="log_out"></i></a>
     </li>
    </ul>
  </div>
