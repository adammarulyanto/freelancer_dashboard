<!-- Sidebar-->
            <div class="sidemenu" id="sidebar-wrapper">
                <div class="sidebar-heading text-white">Dashboard</div>
                <hr style="background: rgba(255,255,255,0.3); margin-top: -3px;">
                <ul class="heading-profile">
                    <li class="img"><img class="img-thumbnail" src="https://cberry.net/assets/website/img/img-user.png"></li>
                    <li class="profil">
                        <span>Adam Marulyanto</span><br>
                        <span>Admin</span>
                    </li>
                </ul>
                <hr style="background: rgba(255,255,255,0.3); margin: 0 0 0 0;">
                <div class="list-group sidemenu-list">
                    <ul class="menu">
                        <?php
                        $url = $this->uri->segment(1);
                        // $idlevel  = $this->session->userdata['level'];
                        $idlevel = 1;
                        $menu = $this->db->query("select * from tbl_menu where id_menu in (select id_menu from tbl_akses_menu where view_level = 'Y' and id_level =$idlevel) order by urutan")->result();
                        foreach ($menu as $menu){
                        ?>
                        <li class="<?php if($url=="<?=$menu->link?>"){echo 'active-menu';}?>" onclick="document.location.href='<?=base_url()?><?=$menu->link?>'"><i class="<?=$menu->icon?> icon-menu"></i> <?=$menu->nama_menu?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom cont-navbar">
                    <div class="container-fluid">
                        <div class="hamburger" id="hamburger-1">
                            <button class="btn-toggle-menu" id="sidebarToggle">
                              <span class="line"></span>
                              <span class="line"></span>
                              <span class="line"></span>
                        </button>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>